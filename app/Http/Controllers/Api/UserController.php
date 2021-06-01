<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group User endpoint
 *
 * Endpoint used to manage CRM users.
 *
 * <aside class="warning">Only admin users can access this endpoint</aside>
 */
class UserController extends Controller
{
    /**
     * Get list of users
     *
     * @responseFile storage/responses/users.get.json
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection(User::apiPaginate());
    }

    /**
     * Create user
     *
     * @apiResource App\Http\Resources\UserResource
     * @apiResourceModel App\Models\User
     *
     * @response status=422 scenario=error {
     *  "message": "The given data was invalid.",
     *   "errors": {
     *    "email": [
     *     "The email field is required."
     *    ],
     *    "username": [
     *     "The username field is required."
     *   ]
     *  }
     * }
     *
     * @param  StoreUserRequest  $request
     * @return UserResource
     */
    public function store(StoreUserRequest $request): UserResource
    {
        $user = User::create($request->all());
        return new UserResource($user);
    }

    /**
     * Get user by id
     *
     * @urlParam user int required User id to show.
     *
     * @apiResource App\Http\Resources\UserResource
     * @apiResourceModel App\Models\User
     *
     * @response status=404 scenario="not found" {
     *  "error": "Resource not found"
     * }
     *
     * @param  User  $user
     * @return UserResource
     */
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Update user
     *
     * @urlParam user int required User id to update.
     *
     * @apiResource App\Http\Resources\UserResource
     * @apiResourceModel App\Models\User
     *
     * @response status=404 scenario="not found" {
     *  "error": "Resource not found"
     * }
     *
     * @param  Request  $request
     * @param  User  $user
     * @return UserResource
     */
    public function update(Request $request, User $user): UserResource
    {
        $user->update($request->all());
        return new UserResource($user);
    }

    /**
     * Delete user
     * 
     * @urlParam user int required User id to remove.
     *
     * @response status=204 scenario=success {}
     *
     * @response status=404 scenario="not found" {
     *  "error": "Resource not found"
     * }
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
