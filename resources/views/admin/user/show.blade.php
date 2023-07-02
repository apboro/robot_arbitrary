@extends('admin.layouts.app')
@section('title', 'Пользователь')

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
                    <p class="text-muted text-center">@include('includes.get-role')</p>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <strong><i class="fas fa-clock"></i> Дата создания</strong>
                            <p class="text-muted">{{ $dateCreated->day }} {{ $dateCreated->translatedFormat('F') }} {{ $dateCreated->year }} {{ $dateCreated->format('H:i') }}</p>
                        </li>
                        @if($user->role->id === \App\Enums\Role::ROLE_CURATOR->value)
                            <li class="list-group-item">
                                <strong><i class="fas fa-book mr-1"></i> Группа</strong>
                                <p class="text-muted">
                                    @forelse($curators as $curator)
                                        {{ $curator->title}}
                                    @empty
                                        Отсутствует
                                    @endforelse
                                </p>
                            </li>
                        @elseif($user->role->id === \App\Enums\Role::ROLE_STUDENT->value)
                            <li class="list-group-item">
                                <strong><i class="fas fa-book mr-1"></i> Группа</strong>
                                <p class="text-muted">
                                    @forelse($userGroups as $userGroup)
                                        {{ $userGroup->title}}
                                    @empty
                                        Отсутствует
                                    @endforelse
                                </p>
                            </li>
                        @endif
                    </ul>
                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary btn-block"><b>Редактировать</b></a>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary btn-block"><b>Закрыть</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Докладные</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Настройки</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="timeline">
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
                                    <a href="{{ asset('storage/'. $claim->claim_file ) }}" class="btn btn-danger">Просмотреть</a>
                                </div>
                            @empty
                                @include('includes.no-data')
                            @endforelse
                        </div>
                        <div class="tab-pane" id="settings">
                            <form action="{{ route('admin.user.group.store', $user->id) }}" method="POST"
                                  class="form-horizontal">
                                @csrf
                                @forelse($userGroups as $userGroup)
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Текущая
                                            группа</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"
                                                   value="{{ $userGroup->title ?? 'Отсутствует' }}" id="inputName"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Дата
                                            зачисления</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"
                                                   value="{{ \Carbon\Carbon::parse($userGroup->pivot->created_at)->day }} {{ \Carbon\Carbon::parse($userGroup->pivot->created_at)->translatedFormat('F') }} {{ \Carbon\Carbon::parse($userGroup->pivot->created_at)->year }} {{ \Carbon\Carbon::parse($userGroup->pivot->created_at)->format('H:i:s') }}"
                                                   id="inputName"
                                                   readonly>
                                        </div>
                                    </div>
                                @empty
                                    @include('includes.no-data')
                                @endforelse
                                <hr>
                                <input type="hidden" name="user_id" value="{{ $user->id }}" id="">
                                <div class="form-group row mt-4">
                                    <label for="group_id" class="col-sm-2 col-form-label">Новая группа</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="group_id" name="group_id">
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Применить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
