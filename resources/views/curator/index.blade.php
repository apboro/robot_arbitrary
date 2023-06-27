@extends('curator.layouts.app')
@section('title', 'Управление группой')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="d-flex">
        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Студенты</span>
                    @foreach($groups as $group)
                        <span class="info-box-number">{{ $group->students()->count() }}</span>
                    @endforeach
                </div>

            </div>

        </div>
        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Прогулы</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="d-flex align-items-center pr-2 mb-3">
        <span class="fw-bolder">Ваша группа</span>
    </div>
    @foreach($groups as $group)
        @forelse($group->students as $student)
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
                                class="row-1 text-dark">{{ $student->surname }} {{ $student->name }} {{ $student->middleName }}</div>
                        </div>
                    </div>
                </div>
                <div class="info p-2">
                    <div class="d-flex gx-5">
                        <a href="{{ route('curator.show', $student->id) }}" class="btn btn-light mx-1"
                           data-bs-toggle="tooltip"
                           data-bs-html="true" data-bs-placement="top"
                           title="Просмотреть информацию о пользователе">
                            <i class="fas fa-id-badge"></i>
                        </a>
                        <form action="{{ route('curator.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="user_id" value="{{ $student->id }}">
                            <input type="hidden" name="group_id" value="{{ $group->id }}">
                            <button type="submit" class="btn btn-light ml-1" data-bs-toggle="tooltip"
                                    data-bs-html="true" data-bs-placement="top" title="Отчислить"><i
                                    class="fas fa-stop-circle text-danger"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            @include('includes.no-data')
        @endforelse
    @endforeach
@endsection
