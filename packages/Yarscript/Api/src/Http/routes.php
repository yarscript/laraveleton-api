<?php

use Illuminate\Support\Facades\Route;

use Yarscript\Api\Http\Controllers\{
    ResourceController,
    User\AuthController,
    User\InfoController,
    User\BillingController,
    User\IndexController as UserController,
    Project\IndexController as ProjectIndexController,
    Project\InviteController as ProjectInviteController,
    ServicePlan\IndexController as ServicePlanController,
    Organisation\IndexController as OrganisationController,
    Organisation\InviteController as OrganisationInviteController,
};
use Yarscript\Project\{
    Repositories\ProjectRepository, Http\Resources\Project as ProjectResource
};
use Yarscript\User\{
    Repositories\UserRepository,
    Repositories\UserBillingRepository,
    Http\Resources\User as UserResource,
    Http\Resources\UserBilling as UserBillingResource,
};


Route::group(
    ['prefix' => 'api', 'name' => 'api.', 'middleware' => 'api'],
    function () {

        Route::group(['prefix' => 'v1'], function () {
            Route::group(['namespace' => 'Yarscript\Api\Http\Controllers\User'], function () {

                //Login routes
                Route::post('/login', [AuthController::class, 'login'])
                     ->name('session.create');

                // Registration Routes
                Route::post('/register', [AuthController::class, 'register'])
                     ->name('registration.create');

                Route::get('/email/verify/{hash}', [AuthController::class, 'verifyEmail'])
                     ->name('registration.verify');
            });

//            Route::group(['prefix' => 'profile', 'middleware' => 'verify'], function () {
//
//                Route::get('/index', function () {
//                    return true;
//                });
//
//            });

            /**
             * Service Plan non-auth routes
             */
            Route::group(['prefix' => 'service-plan'], function () {

                Route::get('/', [ServicePlanController::class, 'index']);
            });


            /**
             * Authenticated Routes
             */
            Route::group(['middleware' => 'api-user'], function () {

                Route::get('/me', [AuthController::class, 'me']);

                /**
                 * Organisation Routes
                 */
                Route::group(['prefix' => 'organisation'], function () {
                    Route::get('/', [OrganisationController::class, 'index']);

                    Route::get('/{uuid?}', [OrganisationController::class, 'get']);

                    Route::post('/create', [OrganisationController::class, 'store']);

                    Route::put('/update/{uuid}', [OrganisationController::class, 'update']);

                    Route::delete('/delete/{uuid}', [OrganisationController::class, 'delete']);

                    Route::post('/invite/user', [OrganisationInviteController::class, 'inviteUser']);

                    Route::post('/invite/accept/{hash}', [OrganisationInviteController::class, 'acceptInvited']);
                });

                /**
                 * Project Api Routes
                 */
                Route::group(['prefix' => 'project'], function () {

                    Route::get('/', [ResourceController::class, 'index'])
                         ->defaults('_config', [
                             'repository' => ProjectRepository::class, 'resource' => ProjectResource::class
                         ]);

                    Route::get('/{uuid}', [ResourceController::class, 'get'])
                         ->defaults('_config', [
                             'repository' => ProjectRepository::class, 'resource' => ProjectResource::class
                         ]);

                    Route::post('/create', [ProjectIndexController::class, 'store']);

                    Route::put('/update/{uuid}', [ProjectIndexController::class, 'update']);

                    Route::delete('/delete/{uuid}', [ProjectIndexController::class, 'delete']);

                    //Invite Routes
                    Route::post('/invite/user', [ProjectInviteController::class, 'inviteUser']);

                    Route::post('/invite/accept/{hash}', [ProjectInviteController::class, 'acceptInvited'])
                         ->name('project.invite.accept');
                });

                /**
                 * User Api Routes
                 */
                Route::group(['prefix' => 'user'], function () {

                    /**
                     * User Info Routes
                     */
                    Route::group(['prefix' => 'info'], function () {
                        Route::get('/{uuid}', [ResourceController::class, 'index'])
                             ->defaults('_config', [
                                 'repository' => UserRepository::class, 'resource' => UserResource::class
                             ]);

                        Route::post('/create/{user_uuid?}', [InfoController::class, 'store']);

                        Route::post('/update/{uuid?}', [InfoController::class, 'update']);

                        Route::post('/delete/{uuid?}', [InfoController::class, 'update']);

                        Route::group(['prefix' => 'billing'], function () {
//                            Route::get();
                        });
                    });

                    /**
                     * User Service Plan routes
                     */
                    Route::group(['prefix' => 'service-plan'], function () {
                        Route::patch('/apply/{service_plan_uuid}', [UserController::class, 'applyServicePlan']);

                        Route::patch('/discard/{uuid}', [UserController::class, 'applyServicePlan']);
                    });

                    /**
                     * User Billing Routes
                     */
                    Route::group(['prefix' => 'billing'], function () {
                        Route::get('/{uuid}', [ResourceController::class, 'get'])
                             ->defaults('_config', [
                                 'repository' => UserBillingRepository::class, 'resource' => UserBillingResource::class
                             ]);


                        Route::post('/create/{uuid}', [BillingController::class, 'store']);

                        Route::post('/update/{uuid}', [BillingController::class, 'update']);
                    });
                });
            });
        });


//Email verification routes

        Route::get('/email/verify', function () {
            return view('dashboard::emails.user.verification-email');
        })->middleware('auth')->name('verification.notice');

//Route::get('/email/verify/{hash}', [AuthController::class, ])->name('verification.verify');

//Route::post('/email/verification-notification', function (Request $request) {
//    $request->user()->sendEmailVerificationNotification();
//
//    return response()->json(['message' => 'Successful resent']);
//})->middleware(['throttle:6,1'])->name('verification.send');

//
//Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('verify.verify');
//
//Route::get('электроннаяпочта/повторнаяотправка','Auth\VerificationController@Resend')
//    ->name('verify.resend');
    });
