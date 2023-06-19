@extends('admin.layouts.app')
@section('title', 'Пользователи')

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 h-50 mb-3">
        <span class="fw-bolder">Управление пользователями</span>
        <div><a href="{{ route('admin.user.create') }}" class="btn btn-block btn-outline-primary btn-sm">Создать</a>
        </div>
    </div>
    @foreach($users as $user)
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>{{ $user->name }}</div>
            <div class="d-flex justify-content-end">
                <a href=""
                   class="btn btn-primary me-3">Просмотреть</a>
                <a href=""
                   class="btn btn-primary me-3">Редактировать</a>
                <a href=""
                   class="btn btn-primary me-3">Роль</a>
                <form action="" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Удалить">
                </form>
            </div>
        </div>
    @endforeach
@endsection
