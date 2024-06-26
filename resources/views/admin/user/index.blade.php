@extends('admin.layouts.app')
@section('title', 'Пользователи')

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <span class="fw-bolder">Управление пользователями</span>
        <div class="d-flex align-items-center">
            <a href="{{ route('admin.user.create') }}" class="btn btn-dark btn-sm" title="Добавить нового пользователя"><i
                    class="fas fa-user-plus mr-1"></i> Создать</a>
            <a href="" class="btn btn-dark ml-2 btn-sm" title="Импортировать данные из .xlsx файла"><i
                    class="fas fa-file-import mr-1"></i> Импорт</a>
            <a href="{{ route('admin.user.trash.index') }}" class="btn btn-danger ml-2 btn-sm"
               title="Работа с пользователями которые были удалены"><i
                    class="fas fa-user-times mr-1"></i> Удаленные</a>
            <form action="{{ route('admin.user.search') }}" method="GET" class="form-horizontal ml-2">
                <div class="d-flex">
                    <input type="search" name="search" value="" class="form-control"
                           placeholder="Поиск...">
                    <input type="submit" class="btn btn-light border border-1 ml-1" value="Найти">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-light border border-1 ml-1">Сбросить</a>
                </div>
            </form>
        </div>
    </div>
    @forelse($users as $user)
        <div class="d-flex align-items-center justify-content-between border-bottom">
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
                    <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Просмотреть информацию о пользователе">
                        <i class="fas fa-id-badge"></i>
                    </a>
                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Редактировать">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('admin.user.role.edit', $user->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Изменить роль">
                        <i class="fas fa-user-tag"></i>
                    </a>
                    <a href="{{ route('admin.user.password.edit', $user->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Обновить пароль">
                        <i class="fas fa-fingerprint"></i>
                    </a>
                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-light ml-1" data-bs-toggle="tooltip"
                                data-bs-html="true" data-bs-placement="top" title="Удалить"><i
                                class="fas fa-trash-alt text-danger"></i></button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        @include('includes.no-data')
    @endforelse
@endsection
