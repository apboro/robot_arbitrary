<span
    @class([
        'badge text-bg-danger' => $user->role->id === \App\Enums\Role::ROLE_ADMIN->value,
        'badge text-bg-primary' =>$user->role->id === \App\Enums\Role::ROLE_TEACHER->value,
        'badge text-bg-info' => $user->role->id === \App\Enums\Role::ROLE_STUDENT->value,
        'badge text-bg-warning' => $user->role->id === \App\Enums\Role::ROLE_CURATOR->value,
        'badge text-bg-success' => $user->role->id === \App\Enums\Role::ROLE_ROBOT->value,
        'badge text-bg-secondary' => $user->role->id === \App\Enums\Role::ROLE_EDUCATIONAL_PART->value,
    ])>{{ $user->role->title }}
</span>
