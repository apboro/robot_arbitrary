@extends('main.layouts.app')
@section('title')
    Рапортичка | {{ $group->title }}
@endsection

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Студент</th>
            <th>Часы</th>
        </tr>
        </thead>
        <tbody>
        <input type="hidden" name="group_id" value="{{ $group->id }}" id="">
        <input type="hidden" name="item_id" value="{{ $item->id }}" id="">
        <input type="hidden" name="couple" value="{{ $couple }}" id="">
        <input type="hidden" name="teacher_id" value="{{ auth()->user()->id }}" id="">
        @forelse($group->students as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->surname }} {{ $student->name }} <input type="hidden" name="student_id"
                                                                        value="{{ $student->id }}" id=""></td>
                <td>
                    <input type="number" id="" name="count_hours" class="form-control"
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
@endsection
