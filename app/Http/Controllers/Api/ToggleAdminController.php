<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class ToggleAdminController extends Controller
{
    /**
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
