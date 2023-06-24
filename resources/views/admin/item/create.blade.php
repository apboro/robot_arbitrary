@extends('admin.layouts.app')
@section('title', 'Создание предмета')

@section('content')

    <form action="{{ route('admin.item.store') }}" method="POST">
        @csrf
        <div class="card-body w-25">
            <div class="form-group">
                <label for="">Название</label>
                <input type="text" name="title" class="form-control" id="">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><b>Создать</b></button>
                <a href="{{ route('admin.item.index') }}" class="btn btn-secondary"><b>Закрыть</b></a>
            </div>
        </div>
    </form>
@endsection
