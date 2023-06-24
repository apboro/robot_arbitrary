@extends('admin.layouts.app')
@section('title', 'Редактирование')

@section('content')
    <form action="{{ route('admin.item.update', $item->id) }}" method="POST" class="form-horizontal w-25">
        @csrf
        @method('patch')
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" value="{{ $item->title }}" id="inputName">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-danger"><b>Обновить</b></button>
                <a href="{{ route('admin.item.index') }}" class="btn btn-secondary"><b>Закрыть</b></a>
            </div>
        </div>
    </form>
@endsection