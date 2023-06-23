@extends('admin.layouts.app')
@section('title', 'Роль')

@section('content')
    <form action="{{ route('admin.user.role.update', $user->id) }}" method="POST" class="form-horizontal w-50">
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
            <label for="inputName" class="col-sm-2 col-form-label">Текущая роль</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $user->role->title ?? 'Отсутствует' }}" id="inputName"
                       readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="role_input" class="col-sm-2 col-form-label">Роль</label>
            <div class="col-sm-10">
                <select class="form-select" id="role_input" name="role_id">
                    @foreach($roles as $role)
                        <option
                            value="{{ $role->id }}">{{ $role->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-danger"><b>Обновить</b></button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary"><b>Закрыть</b></a>
            </div>
        </div>
    </form>
@endsection
