@extends('admin.layouts.app')
@section('title', 'Редактирование')

@section('content')
    <form action="{{ route('admin.role.update', $role->id) }}" method="POST" class="form-horizontal w-25">
        @csrf
        @method('patch')
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" value="{{ $role->title }}" id="inputName">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <a href="{{ route('admin.role.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Закрыть</a>
                <button type="submit" class="btn btn-danger"><i class="fas fa-sync-alt"></i> Обновить</button>
            </div>
        </div>
    </form>
@endsection
