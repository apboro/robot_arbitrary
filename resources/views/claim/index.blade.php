@extends('layouts.main')
@section('title', 'Докладная')

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <span class="fw-bolder">Выберите студента для подачи докладной</span>
        <div class="d-flex align-items-center">
            <form action="" method="GET" class="form-horizontal ml-2">
                <div class="d-flex">
                    <input type="search" name="search" value="" class="form-control"
                           placeholder="Поиск...">
                    <input type="submit" class="btn btn-light border border-1 ml-1" value="Найти">
                    <a href="{{ route('claim.index') }}" class="btn btn-light border border-1 ml-1">Сбросить</a>
                </div>
            </form>
        </div>
    </div>
    @foreach($users as $user)
        <div class="d-flex align-items-center justify-content-between border-bottom">
            <div class="user-panel d-flex align-items-center">
                <div class="image">
                    <img src="{{ asset('preview.png') }}"
                         class="img-circle border border-1 object-fit-contain p-1"
                         alt="User Image">
                </div>
                <div class="info">
                    <div class="col-1">
                        <div
                            class="row-1 text-dark">{{ $user->surname }} {{ $user->name }} {{ $user->middleName }}</div>
                    </div>
                </div>
            </div>
            <div class="info p-2">
                <div class="d-flex gx-5">
                    <a href="{{ route('claim.show', $user->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top"
                       title="Просмотреть информацию о пользователе">
                        <i class="fas fa-check"></i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
