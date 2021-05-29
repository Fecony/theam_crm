<?php

namespace App\Http\Controllers\Api\Auth;

use App\Services\SocialAccountService;
use Illuminate\Http\JsonResponse;

interface SocialAccountController
{
    public function redirect(): JsonResponse;

    public function callback(SocialAccountService $socialAccountService): JsonResponse;
}
