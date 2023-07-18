@extends('main.layouts.app')
@section('title', 'Произвольные рапортички')

@section('content')
    <div class="card card-light">
        <div class="card-header d-flex flex-column">
            <h3 class="card-title">Формирование рапортички: неделя, месяц, семестр, год</h3>
            <div id="emailHelp" class="form-text">Выберите группу, дату с какого и дату по какое</div>
        </div>
        <div class="card-body">
            <form action="{{ route('truancy.index') }}" method="GET">
                <div class="row">
                    <div class="col-3">
                        <select class="form-select" id="group_id" name="group_id">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="date" class="form-control"
                               value="{{ \Carbon\Carbon::now() }}">
                    </div>
                    <div class="col-3">
                        <input type="date" class="form-control"
                               value="">
                    </div>
                    <div class="col-3 text-center">
                        <button type="submit" class="btn btn-dark" data-bs-toggle="tooltip"
                                data-bs-html="true" data-bs-placement="top" title="Сформировать"><i
                                class="fas fa-poo-storm"></i> Сформировать
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p>По умолчанию скрыто, появляется только тогда когда отправлена форма для формирования или можно создать также
        отдельный роут как с сегодняшними</p>
    <p>Под полем "Общее количество часов" добавить ячейку с "ИТОГО" -> сумма всего столбца, то есть все часы сложить и
        получить общую сумму</p>
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <span class="fw-bolder mb-2">Управление рапортичкой</span>
        <div class="d-flex align-items-center">
            <a href="" class="btn btn-dark ml-2 btn-sm" title="Экспортировать данные в .xlsx файл"><i
                    class="fas fa-file-import mr-1"></i> Экспорт</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Группа 1 | <b>С 17.07.2023 - По 29.12.23</b></h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Студент</th>
                    <th colspan="4" class="text-center">Общее количество часов</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 1; $i < 24; $i++)
                    <tr>
                        <td>{{ $i }}.</td>
                        <td>Фамилия Имя Отчество</td>
                        <td class="text-center">
                            {{ rand(50, 1000) }}
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
