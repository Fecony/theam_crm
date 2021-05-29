<?php

namespace App\Http\Controllers\Api\Auth;

use App\Services\SocialAccountService;
use Illuminate\Http\JsonResponse;

interface SocialAccount
{
    public function redirect(): JsonResponse;

    public function callback(SocialAccountService $socialAccountService): JsonResponse;
}
