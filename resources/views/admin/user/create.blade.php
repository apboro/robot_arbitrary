@extends('admin.layouts.app')
@section('title', 'Создание пользователя')

@section('content')

    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf
        <div class="card-body w-25">
            <div class="form-group">
                <label for="">Фамилия</label>
                <input type="text" name="surname" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Имя</label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Отчество</label>
                <input type="text" name="middleName" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Логин</label>
                <input type="text" name="login" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Пароль</label>
                <input type="password" name="password" class="form-control" id="">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Создать</button>
        </div>
    </form>
@endsection
