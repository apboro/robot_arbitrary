@extends('admin.layouts.app')
@section('title', 'Создание пользователя')

@section('content')

    <form action="{{ route('admin.user.store') }}" method="POST" class="form-horizontal w-10">
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
                <label for="">Логин</label>
                <input type="text" name="login" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Пароль</label>
                <input type="password" name="password" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="role_input" class="col-form-label">Роль</label>
                <select class="form-select" id="role_input" name="role_id">
                    @foreach($roles as $role)
                        <option
                            value="{{ $role->id }}">{{ $role->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-danger"><b>Создать</b></button>
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary"><b>Закрыть</b></a>
        </div>
    </form>
@endsection
