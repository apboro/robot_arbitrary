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
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </form>
@endsection
