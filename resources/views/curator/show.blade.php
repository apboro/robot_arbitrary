@extends('curator.layouts.app')
@section('title', 'Студент')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('preview.png') }}"
                             alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $user->surname }} {{ $user->name }} {{ $user->middleName }}</h3>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <strong><i class="fas fa-book mr-1"></i> Группа</strong>
                            <p class="text-muted">
                                @forelse($groups as $group)
                                    {{ $group->title}}
                                @empty
                                    Отсутствует
                                @endforelse
                            </p>
                        </li>
                    </ul>
                    <a href="{{ route('curator.index') }}" class="btn btn-secondary btn-block"><b>Закрыть</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Докладные</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#documents" data-toggle="tab">Документы</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            @forelse($claims as $claim)
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                             src="{{ asset('preview.png') }}" alt="user image">
                                        <span
                                            class="username">{{ $claim->teacher->surname }} {{ $claim->teacher->name }} {{ $claim->teacher->middleName }}</span>
                                        <span
                                            class="description">Дата публикации - {{ \Carbon\Carbon::parse($claim->created_at)->day }} {{ \Carbon\Carbon::parse($claim->created_at)->translatedFormat('F') }} {{ \Carbon\Carbon::parse($claim->created_at)->year }}</span>
                                    </div>
                                    <p>{{ $claim->comment ?? 'Комментарий отсутствует' }}</p>
                                    <a href="{{ asset('storage/'. $claim->claim_file ) }}" class="btn btn-dark"
                                       target="_blank"><i class="fas fa-file"></i> Просмотреть</a>
                                    <a href="{{ route('claim.download', $claim->id) }}" class="btn btn-dark"><i
                                            class="fas fa-download"></i> Скачать</a>
                                </div>
                            @empty
                                @include('includes.no-data')
                            @endforelse
                        </div>
                        <div class="tab-pane" id="documents">
                            <div class="post">
                                123
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
