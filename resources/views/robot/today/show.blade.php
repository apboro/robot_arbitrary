@extends('main.layouts.app')
@section('title')
    Рапортичка | Группа 1 | 16 июль 2023 год
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <div class="d-flex flex-column">
            <span class="fw-bolder mb-2">Управление рапортичкой</span>
            <span class="fw-bolder"><a href="{{ route('robot.today.index') }}" class="btn btn-light"><i
                        class="fas fa-arrow-left"></i> Вернуться назад</a></span>
        </div>
        <div class="d-flex align-items-center">
            <a href="" class="btn btn-dark ml-2 btn-sm" title="Экспортировать данные в .xlsx файл"><i
                    class="fas fa-file-import mr-1"></i> Экспорт</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Студент</th>
            <th colspan="1" style="width: 40px">Часы</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 1; $i < 11; $i++)
            <tr>
                <td>{{ $i }}.</td>
                <td>Фамилия Имя Отчество</td>
                <td class="text-center">
                    2
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
