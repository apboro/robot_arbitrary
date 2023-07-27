@extends('main.layouts.app')
@section('title', 'Сегодняшние рапортички')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{Carbon\Carbon::now()->format('d F Y г.')}}</h3>
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
                @foreach($truancies as $index => $truancy)
                    <tr>
                        <td>{{ $index+1}}.</td>
                        <td>{{$truancy->group->title}}</td>
                        <td class="text-center">
                            <a href="{{ route('robot.today.show', ['id'=>$truancy->group->id]) }}" class="btn btn-light" title="Просмотреть"><i
                                    class="far fa-calendar-check"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
