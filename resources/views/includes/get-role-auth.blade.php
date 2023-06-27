<span
    @class([
      'badge text-bg-danger' => auth()->user()->role->id === \App\Models\User::ROLE_ADMIN,
      'badge text-bg-primary' =>auth()->user()->role->id === \App\Models\User::ROLE_TEACHER,
      'badge text-bg-info' => auth()->user()->role->id === \App\Models\User::ROLE_STUDENT,
      'badge text-bg-warning' => auth()->user()->role->id === \App\Models\User::ROLE_CURATOR,
      'badge text-bg-success' => auth()->user()->role->id === \App\Models\User::ROLE_ROBOT,
    ])>{{ auth()->user()->role->title }}
</span>
