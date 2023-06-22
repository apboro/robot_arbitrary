@extends('admin.layouts.app')
@section('title', 'Пользователи')

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <span class="fw-bolder">Управление пользователями</span>
        <div class="d-flex">
            <a href="{{ route('admin.user.create') }}" class="btn btn-outline-primary btn-sm">Создать</a>
            <a href="" class="btn btn-outline-danger ml-2 btn-sm">Удаленные</a>
        </div>
    </div>
    @foreach($users as $user)
        <div class="d-flex align-items-center justify-content-between">
            <div class="user-panel d-flex align-items-center">
                <div class="image">
                    <img src="{{ asset('image102-10.jpg') }}" class="img-circle object-fit-contain" alt="User Image">
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
                        <i class="fas fa-eye"></i>
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
    @endforeach
@endsection
