<span
    @class([
        'badge text-bg-danger' => $user->role->id === \App\Models\User::ROLE_ADMIN,
        'badge text-bg-primary' =>$user->role->id === \App\Models\User::ROLE_TEACHER,
        'badge text-bg-info' => $user->role->id === \App\Models\User::ROLE_STUDENT,
        'badge text-bg-warning' => $user->role->id === \App\Models\User::ROLE_CURATOR,
        'badge text-bg-success' => $user->role->id === \App\Models\User::ROLE_ROBOT,
    ])>{{ $user->role->title }}
</span>
