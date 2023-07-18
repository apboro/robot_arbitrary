@extends('main.layouts.app')
@section('title')
    Рапортичка | Группа 1 | 16 июль 2023 год
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <div class="d-flex flex-column">
            <span class="fw-bolder mb-2"><a href="{{ route('robot.today.index') }}" class="btn btn-outline-dark"><i
                        class="fas fa-arrow-left"></i> Вернуться назад</a></span>
            <span class="fw-bolder">Управление рапортичкой</span>
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
            <th class="text-center">Математика</th>
            <th class="text-center">Русский язык</th>
            <th class="text-center">География</th>
            <th class="text-center">ОБЖ</th>
            <th class="text-center">Веб-программирование</th>
            <th class="text-center" colspan="1">Часы</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 1; $i < 11; $i++)
            <tr>
                <td>{{ $i }}.</td>
                <td>Фамилия Имя Отчество</td>
                <td class="text-center">
                    {{ rand(0, 2) }}
                </td>
                <td class="text-center">
                    {{ rand(0, 2) }}
                </td>
                <td class="text-center">
                    {{ rand(0, 2) }}
                </td>
                <td class="text-center">
                    {{ rand(0, 2) }}
                </td>
                <td class="text-center">
                    {{ rand(0, 2) }}
                </td>
                <td class="text-center">
                    сумма всего ряда
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
