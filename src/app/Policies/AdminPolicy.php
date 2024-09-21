<?php

namespace App\Policies;

use App\Enum\RoleEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminPolicy
{
    public function isAdmin($user): bool
    {
        if (!empty($user)) {
            return $user->role === RoleEnum::ADMIN->value;
        }
        return false;
    }

    public function checkPermission(Request $request): void
    {
        if (!$this->isAdmin(auth()->user())) {
            abort(403, 'User is not admin');
        }
    }

}
