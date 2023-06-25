@extends('admin.layouts.app')
@section('title', 'Редактирование')

@section('content')
    <form action="{{ route('admin.specialization.update', $specialization->id) }}" method="POST"
          class="form-horizontal w-25">
        @csrf
        @method('patch')
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Код</label>
            <div class="col-sm-10">
                <input type="text" name="code" class="form-control" value="{{ $specialization->code }}" id="inputName">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" value="{{ $specialization->title }}"
                       id="inputName">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-danger"><b>Обновить</b></button>
                <a href="{{ route('admin.specialization.index') }}" class="btn btn-secondary"><b>Закрыть</b></a>
            </div>
        </div>
    </form>
@endsection
