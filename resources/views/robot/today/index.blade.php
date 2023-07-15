@extends('main.layouts.app')
@section('title', 'Сегодняшние рапортички')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">18 июль 2023 год</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Группа</th>
                    <th colspan="1" style="width: 40px">Действие</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 1; $i < 10; $i++)
                    <tr>
                        <td>{{ $i }}.</td>
                        <td>Группа {{ $i }}</td>
                        <td class="text-center">
                            <a href="{{ route('robot.today.show') }}" class="btn btn-light" title="Просмотреть"><i
                                    class="far fa-calendar-check"></i></a>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">17 июль 2023 год</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Группа</th>
                    <th colspan="1" style="width: 40px">Действие</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 1; $i < 10; $i++)
                    <tr>
                        <td>{{ $i }}.</td>
                        <td>Группа {{ $i }}</td>
                        <td class="text-center">
                            <a href="{{ route('robot.today.show') }}" class="btn btn-light" title="Просмотреть"><i
                                    class="far fa-calendar-check"></i></a>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">16 июль 2023 год</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Группа</th>
                    <th colspan="1" style="width: 40px">Действие</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 1; $i < 10; $i++)
                    <tr>
                        <td>{{ $i }}.</td>
                        <td>Группа {{ $i }}</td>
                        <td class="text-center">
                            <a href="{{ route('robot.today.show') }}" class="btn btn-light" title="Просмотреть"><i
                                    class="far fa-calendar-check"></i></a>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
