<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\User;

class AccessVerificationPolicy
{
    /**
     * Create a new policy instance.
     */

    public function __construct()
    {

    }

    public function viewAdminPanel(User $user): bool
    {
        return $user->role->id == 1;
    }

    public function viewCuratorPanel(User $user): bool
    {
        return $user->role->id == 4;
    }

    public function viewCreateReportPanel(User $user): bool
    {
        return $user->role->id != 3;
    }
}
