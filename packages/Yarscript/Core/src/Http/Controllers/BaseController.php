<?php


namespace Yarscript\Core\Http\Controllers;


use Illuminate\Foundation\{
    Bus\DispatchesJobs,
    Validation\ValidatesRequests,
    Auth\Access\AuthorizesRequests
};
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

/**
 * Class Controller
 * @package Sp\Support\Http
 */
class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Give response with json data format
     *
     * @param string $message
     * @param array|mixed $data
     * @param int $status
     * @return JsonResponse
     */
    protected function jsonResponse(string $message, $data = [], int $status = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status);
    }

    /**
     * @param Exception $exception
     * @return JsonResponse
     */
    protected function jsonException(Exception $exception): JsonResponse
    {
        return $this->jsonResponse($exception->getMessage(), (array)$exception, 500);
    }
}
