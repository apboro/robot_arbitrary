<span
    @class([
      'badge text-bg-danger' => auth()->user()->role->id === \App\Enums\Role::ROLE_ADMIN->value,
      'badge text-bg-primary' =>auth()->user()->role->id === \App\Enums\Role::ROLE_TEACHER->value,
      'badge text-bg-info' => auth()->user()->role->id === \App\Enums\Role::ROLE_STUDENT->value,
      'badge text-bg-warning' => auth()->user()->role->id === \App\Enums\Role::ROLE_CURATOR->value,
      'badge text-bg-success' => auth()->user()->role->id === \App\Enums\Role::ROLE_ROBOT->value,
    ])>{{ auth()->user()->role->title }}
</span>
