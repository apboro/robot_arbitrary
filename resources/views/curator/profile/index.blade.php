@extends('curator.layouts.app')
@section('title', 'Профиль группы')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('preview.png') }}"
                             alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">
                        @foreach($groups as $group)
                            {{ $group->title }}
                        @endforeach
                    </h3>
                    @foreach($groups as $group)
                        @forelse($group->curators as $curator)
                            <p class="text-muted text-center">{{ $curator->surname }} {{ $curator->name }} {{ $curator->middleName }}</p>
                        @empty
                            <p class="text-muted text-center">Отсутствует</p>
                        @endforelse
                        <ul class="list-group mb-3">
                            <li class="list-group-item">
                                <strong><i class="fas fa-users"></i> Количество студентов</strong>
                                <p class="text-muted">
                                    {{ $group->students()->count() }}
                                </p>
                            </li>
                            <li class="list-group-item">
                                <strong><i class="fas fa-pencil-alt mr-1"></i> Специальность</strong>
                                <p class="text-muted">
                                    @forelse($group->specializations as $specialization)
                                        {{ $specialization->code }} {{ $specialization->title }}
                                    @empty
                                        Отсутствует
                                    @endforelse
                                </p>
                            </li>
                        </ul>
                    @endforeach
                    <a href="" class="btn btn-secondary btn-block"><b>Закрыть</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#participants"
                                                data-toggle="tab">Рапортички</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="participants">
                            <div class="col-sm-12">
                                <p class="text-muted">
                                    Тут выводить все рапортички ежедневные
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
