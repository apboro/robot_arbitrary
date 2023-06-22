@extends('admin.layouts.app')
@section('title', 'Пользователи')

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <span class="fw-bolder">Управление пользователями</span>
        <div><a href="{{ route('admin.user.create') }}" class="btn btn-block btn-outline-primary btn-sm">Создать</a>
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
                        <div class="row-1 text-dark">{{ $user->surname }} {{ $user->name }}</div>
                        <div class="row-1"><span class="badge bg-danger">Администратор</span></div>
                    </div>
                </div>
            </div>
            <div class="info p-2 d-flex align-items-end">
                <div class="col">
                    <a href="{{ route('main.index') }}" class="btn btn-light" data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Просмотреть информацию о пользователе">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('main.index') }}" class="btn btn-light" data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Редактировать">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('main.index') }}" class="btn btn-light" data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Изменить роль">
                        <i class="fas fa-user-tag"></i>
                    </a>
                    <a href="{{ route('main.index') }}" class="btn btn-light" data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Удалить">
                        <i class="fas fa-trash-alt text-danger"></i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
