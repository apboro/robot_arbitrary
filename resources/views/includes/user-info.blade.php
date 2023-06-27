<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
    <div class="image">
        <img src="{{ asset('preview.png') }}" class="img-circle object-fit-contain" alt="User Image">
    </div>
    <div class="info">
        <div class="col-1">
            <div class="row-1 text-white">{{ auth()->user()->surname }} {{ auth()->user()->name }}</div>
            <div class="row-1">
                <span
                    @class([
                        'badge text-bg-danger' => auth()->user()->role->id === \App\Models\User::ROLE_ADMIN,
                        'badge text-bg-primary' =>auth()->user()->role->id === \App\Models\User::ROLE_TEACHER,
                        'badge text-bg-info' => auth()->user()->role->id === \App\Models\User::ROLE_STUDENT,
                        'badge text-bg-warning' => auth()->user()->role->id === \App\Models\User::ROLE_CURATOR,
                        'badge text-bg-success' => auth()->user()->role->id === \App\Models\User::ROLE_ROBOT,
                    ])>{{ auth()->user()->role->title }}
                </span>
            </div>
        </div>
    </div>
</div>
