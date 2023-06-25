@extends('admin.layouts.app')
@section('title', 'Создание специальности')

@section('content')

    <form action="{{ route('admin.specialization.store') }}" method="POST">
        @csrf
        <div class="card-body w-25">
            <div class="form-group">
                <label for="">Код</label>
                <input type="text" name="code" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Название</label>
                <input type="text" name="title" class="form-control" id="">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-danger"><b>Создать</b></button>
                <a href="{{ route('admin.specialization.index') }}" class="btn btn-secondary"><b>Закрыть</b></a>
            </div>
        </div>
    </form>
@endsection
