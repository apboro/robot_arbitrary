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
                <a href="{{ route('admin.item.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Закрыть</a>
                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Создать</button>
            </div>
        </div>
    </form>
@endsection
