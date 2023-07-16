@extends('admin.layouts.app')
@section('title', 'Создание группы')

@section('content')

    <form action="{{ route('admin.group.store') }}" method="POST">
        @csrf
        <div class="card-body w-25">
            <div class="form-group">
                <label for="">Название</label>
                <input type="text" name="title" class="form-control" id="">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Создать</button>
                <a href="{{ route('admin.group.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i>
                    Закрыть</a>
            </div>
        </div>
    </form>
@endsection
