<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group User endpoint
 */
class ToggleAdminController extends Controller
{
    /**
     * Toggle admin state
     *
     * @urlParam user int required User id to toggle admin role.
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
    public function __invoke(Request $request, User $user): UserResource
    {
        $user->forceFill([
            'is_admin' => !$user->is_admin
        ])->save();

        return new UserResource($user);
    }
}
