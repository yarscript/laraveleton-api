<?php


namespace Yarscript\Api\Http\Controllers\User;


use Illuminate\Http\JsonResponse;
use Yarscript\Core\Http\Controllers\BaseController;

use Illuminate\Support\Facades\{
    Auth, Crypt, Event
};
use Yarscript\User\{
    Http\Requests\Login,
    Http\Requests\Register,
    Http\Resources\User as UserResource,
    Contracts\Services\User as UserServiceContract,
};

/**
 * Class AuthController
 * @package Yarscript\Api\Http\Controllers\User
 */
class AuthController extends BaseController
{
    /**
     * @var array|null
     */
    public ?array $_config;

    /**
     * @var UserServiceContract
     */
    protected UserServiceContract $userService;

    /**
     * AuthController constructor.
     * @param UserServiceContract $user
     */
    public function __construct(
        UserServiceContract $user
    )
    {
        $this->_config = request('_config');

        $this->userService = $user;
    }

    /**
     * @param Login $request
     * @return JsonResponse
     */
    public function login(Login $request): JsonResponse
    {
        if (!$token = Auth::guard('api')->attempt($request->input())) {
            return $this->jsonResponse('User data is wrong', [], 401);
        }

        if (empty(Auth::user()->email_verified_at)) {
            Auth::logout();

            return $this->jsonResponse('Email is not verified', [], 403);
        }

        //Event passed to prepare cart after login
        Event::dispatch('user.after.login', request('email'));

        return $this->respondWithToken($token);
    }

    /**
     * @param Register $request
     * @return JsonResponse
     */
    public function register(Register $request): JsonResponse
    {
        $data = $request->input();

        $user = $this->userService->createUser($data);

        return $this->jsonResponse('Success!', ['id' => $user->getAttribute('id')]);
    }

    /**
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return response()->json(
            $this->userService->getResource($this->userService->getUser(Auth::id()))
        );
    }

    /**
     * Method to verify account
     *
     * @param string $hash
     * @return JsonResponse
     */
    public function verifyEmail(string $hash): JsonResponse
    {
        try {
            $uuid = Crypt::decryptString($hash);

            $user = $this->userService->getUserUuid($uuid);

            $verified = $this->userService->verifyUser($user);
        } catch (\Exception $e) {
            return $this->jsonResponse($e->getMessage(), ['code' => $e->getCode()], 500);
        }

        return $this->jsonResponse('Successfully Verified', ['verified' => $verified]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        Auth::logout();

        return $this->jsonResponse('Successfully logged out', []);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'token'      => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
