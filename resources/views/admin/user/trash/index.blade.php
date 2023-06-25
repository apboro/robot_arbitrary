@extends('admin.layouts.app')
@section('title', 'Пользователи')

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <span class="fw-bolder">Управление пользователями</span>
        <div class="d-flex align-items-center">
            <a href="{{ route('admin.user.create') }}" class="btn btn-outline-primary btn-sm" data-bs-toggle="tooltip"
               data-bs-html="true" data-bs-placement="top" title="Добавить нового пользователя"><i
                    class="fas fa-user-plus mr-1"></i> Создать</a>
            <a href="" class="btn btn-outline-primary ml-2 btn-sm" data-bs-toggle="tooltip"
               data-bs-html="true" data-bs-placement="top" title="Импортировать данные из .xlsx файла"><i
                    class="fas fa-file-import mr-1"></i> Импорт</a>
            <a href="{{ route('admin.user.index') }}" class="btn btn-outline-primary ml-2 btn-sm"
               data-bs-toggle="tooltip"
               data-bs-html="true" data-bs-placement="top" title="Пользователи"><i class="fas fa-users"></i>
                Пользователи</a>
            <form action="" class="form-horizontal ml-2">
                <div class="d-flex">
                    <input type="search" name="" id="" class="form-control" placeholder="Поиск...">
                    <input type="submit" class="btn btn-light border border-1 ml-1" value="Найти">
                </div>
            </form>
        </div>
    </div>
    @forelse($users as $user)
        <div class="d-flex align-items-center justify-content-between">
            <div class="user-panel d-flex align-items-center">
                <div class="image">
                    <img src="{{ asset('preview.png') }}" class="img-circle border border-1 object-fit-contain p-1"
                         alt="User Image">
                </div>
                <div class="info">
                    <div class="col-1">
                        <div
                            class="row-1 text-dark">{{ $user->surname }} {{ $user->name }} {{ $user->middleName }}</div>
                        <div class="row-1">
                            @include('includes.get-role')
                        </div>
                    </div>
                </div>
            </div>
            <div class="info p-2">
                <div class="d-flex gx-5">
                    <form action="{{ route('admin.user.trash.restore', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light ml-1" data-bs-toggle="tooltip"
                                data-bs-html="true" data-bs-placement="top" title="Восстановить"><i
                                class="fas fa-trash-restore"></i></button>
                    </form>
                    <form action="{{ route('admin.user.trash.force', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light ml-1" data-bs-toggle="tooltip"
                                data-bs-html="true" data-bs-placement="top" title="Удалить навсегда"><i
                                class="fas fa-trash-alt text-danger"></i></button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        @include('includes.no-data')
    @endforelse
@endsection
