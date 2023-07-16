@extends('admin.layouts.app')
@section('title', 'Редактирование')

@section('content')
    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="form-horizontal">
        @csrf
        @method('patch')
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Фамилия</label>
            <div class="col-sm-10">
                <input type="text" name="surname" class="form-control" value="{{ $user->surname }}" id="inputName">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="inputName">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Отчество</label>
            <div class="col-sm-10">
                <input type="text" name="middleName" class="form-control" value="{{ $user->middleName }}"
                       id="inputName">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <a href="{{ route('admin.user.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Закрыть</a>
                <button type="submit" class="btn btn-danger"><i class="fas fa-sync-alt"></i> Обновить</button>
                <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-dark"><i class="fas fa-user"></i>
                    Профиль</a>
            </div>
        </div>
    </form>
@endsection
