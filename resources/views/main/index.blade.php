@extends('main.layouts.app')
@section('title', 'Главная')

@section('content')
    @can('view-create-report-panel', auth()->user())
        <div class="card card-light">
            <div class="card-header d-flex flex-column">
                <h3 class="card-title">Создание рапортички</h3>
                <div id="emailHelp" class="form-text">Выберите группу, предмет, пару</div>
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
                        <div class="col-4">
                            <select class="form-select" id="item_id" name="item_id">
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-select" id="couple" name="couple">
                                <option value="1">1 пара</option>
                                <option value="2">2 пара</option>
                                <option value="3">3 пара</option>
                                <option value="4">5 пара</option>
                                <option value="5">6 пара</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-outline-dark" data-bs-toggle="tooltip"
                                    data-bs-html="true" data-bs-placement="top" title="Приступить к созданию"><i
                                    class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endcan
@endsection
