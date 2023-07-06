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
        return $user->role->id == Role::ROLE_ADMIN->value;
    }

    public function viewCuratorPanel(User $user): bool
    {
        return $user->role->id == Role::ROLE_CURATOR->value;
    }

    public function viewClaimPanel(User $user): bool
    {
        return $user->role->id != Role::ROLE_STUDENT->value;
    }

    public function viewCreateReportPanel(User $user): bool
    {
        return $user->role->id != Role::ROLE_STUDENT->value && $user->role->id != Role::ROLE_EDUCATIONAL_PART->value;
    }

    public function viewEducationalPanel(User $user): bool
    {
        return $user->role->id != Role::ROLE_EDUCATIONAL_PART->value && $user->role->id != Role::ROLE_ADMIN->value;
    }

    public function viewManagementEducationalPanel(User $user): bool
    {
        return $user->role->id == Role::ROLE_EDUCATIONAL_PART->value;
    }
}
