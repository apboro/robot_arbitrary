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
    <p>Под полем "Часы" добавить ячейку с "ИТОГО" -> сумма всего столбца, то есть все часы сложить и получить общую
        сумму</p>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Студент</th>
            @foreach($items as $item)
                <th class="text-center">{{$item->item->title}}</th>
            @endforeach
            <th class="text-center" colspan="1">Часы</th>
        </tr>
        </thead>
        <tbody>
        @php $counter = 1 @endphp
        @foreach ($students as $index => $countHours)
            @php $totalStudentHours = 0 @endphp
            <tr>
                <td>{{$counter++}}</td>
                <td>{{ $index }}</td>
                @foreach ($countHours as $hours)
                    <td class="text-center">
                        {{ $hours }}
                    </td>
                    @php $totalStudentHours += $hours @endphp
                @endforeach
                <td class="text-center">
                    {{$totalStudentHours}}
                </td>
            </tr>

        @endforeach
        <tr>
            <td style="text-align: right; border: none; background: none" colspan="8">Итого: {{$totalHours}}</td>
        </tr>
        </tbody>
    </table>

@endsection
