@extends('admin.layouts.app')
@section('title', 'Редактирование')

@section('content')
    <form action="{{ route('admin.group.update', $group->id) }}" method="POST" class="form-horizontal w-25">
        @csrf
        @method('patch')
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" value="{{ $group->title }}" id="inputName">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Обновить</button>
                <a href="{{ route('admin.group.index') }}" class="btn btn-secondary"><b>Закрыть</b></a>
            </div>
        </div>
    </form>
@endsection
