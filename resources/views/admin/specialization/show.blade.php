@extends('admin.layouts.app')
@section('title', 'Специальность')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('image102-10.jpg') }}"
                             alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $specialization->title }}</h3>
                    <p class="text-muted text-center">{{ $specialization->code }}</p>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <strong><i class="fas fa-users"></i> Количество групп</strong>
                            <p class="text-muted">
                                1
                            </p>
                        </li>
                    </ul>
                    <a href="{{ route('admin.specialization.edit', $specialization->id) }}"
                       class="btn btn-primary btn-block"><b>Редактировать</b></a>
                    <a href="{{ route('admin.specialization.index') }}"
                       class="btn btn-secondary btn-block"><b>Закрыть</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Участники</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">

                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                         src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="user image">
                                    <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                                    <span class="description">Shared publicly - 7:30 PM today</span>
                                </div>

                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
