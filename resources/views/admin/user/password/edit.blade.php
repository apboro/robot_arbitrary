@extends('admin.layouts.app')
@section('title', 'Пароль')

@section('content')
    <form action="{{ route('admin.user.password.update', $user->id) }}" method="POST" class="form-horizontal w-50">
        @csrf
        @method('patch')
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Пользователь</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $user->surname }} {{ $user->name }}" id="inputName"
                       readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" value="" id="inputName">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <a href="{{ route('admin.user.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Закрыть</a>
                <button type="submit" class="btn btn-danger"><i class="fas fa-sync-alt"></i> Обновить</button>
            </div>
        </div>
    </form>
@endsection
