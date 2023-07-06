@extends('main.layouts.app')
@section('title')
    Рапортичка | {{ $group->title }} | {{ $item->title }} | Пара: {{ $couple }}
@endsection

@section('content')
    <form action="{{ route('truancy.store') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Студент</th>
                <th>Часы</th>
            </tr>
            </thead>
            <tbody>
            @forelse($group->students as $student)
                <input type="hidden" name="group_id[]" value="{{ $group->id }}">
                <input type="hidden" name="item_id[]" value="{{ $item->id }}">
                <input type="hidden" name="couple[]" value="{{ $couple }}">
                <input type="hidden" name="teacher_id[]" value="{{ auth()->user()->id }}">
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->surname }} {{ $student->name }} <input type="hidden" name="student_id[]"
                                                                            value="{{ $student->id }}"></td>
                    <td>
                        <input type="number" id="" name="count_hours[]" class="form-control"
                               min="0" max="2" value="0">
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td class="fs-4 text-danger">@include('includes.no-data')</td>
                    <td></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="d-flex">
            <button type="submit" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Создать</button>
            <a href="{{ route('main.index') }}" class="btn btn-outline-dark ml-2">Назад</a>
        </div>
    </form>
@endsection
