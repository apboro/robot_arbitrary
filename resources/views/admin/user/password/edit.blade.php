@extends('admin.layouts.app')
@section('title')
    Новый пароль: {{ $user->surname }} {{ $user->name }}
@endsection

@section('content')
    <form action="{{ route('admin.user.password.update', $user->id) }}" method="POST" class="form-horizontal w-25">
        @csrf
        @method('patch')
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" value="" id="inputName">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Обновить</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary"><b>Отмена</b></a>
            </div>
        </div>
    </form>
@endsection
