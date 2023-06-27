<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
    <div class="image">
        <img src="{{ asset('preview.png') }}" class="img-circle object-fit-contain" alt="User Image">
    </div>
    <div class="info">
        <div class="col-1">
            <div class="row-1 text-white">{{ auth()->user()->surname }} {{ auth()->user()->name }}</div>
            <div class="row-1">
                @include('includes.get-role-auth')
            </div>
        </div>
    </div>
</div>
