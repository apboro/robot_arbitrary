@extends('admin.layouts.app')
@section('title', 'Группа')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('preview.png') }}"
                             alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $group->title }}</h3>
                    @forelse($curators as $curator)
                        <p class="text-muted text-center">{{ $curator->surname }} {{ $curator->name }} {{ $curator->middleName }}</p>
                    @empty
                        <p class="text-muted text-center">Отсутствует</p>
                    @endforelse
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <strong><i class="fas fa-clock"></i> Дата создания</strong>
                            <p class="text-muted">{{ $dateCreated->day }} {{ $dateCreated->translatedFormat('F') }} {{ $dateCreated->year }} {{ $dateCreated->format('H:i') }}</p>
                        </li>
                        <li class="list-group-item">
                            <strong><i class="fas fa-users"></i> Количество студентов</strong>
                            <p class="text-muted">
                                {{ $group->students()->count() }}
                            </p>
                        </li>
                        <li class="list-group-item">
                            <strong><i class="fas fa-pencil-alt mr-1"></i> Специальность</strong>
                            @forelse($groupSpecializations as $groupSpecialization)
                                <p class="text-muted">{{ $groupSpecialization->code }} {{ $groupSpecialization->title }}</p>
                            @empty
                                <p>Отсутствует</p>
                            @endforelse
                        </li>
                    </ul>
                    <a href="{{ route('admin.group.edit', $group->id) }}" class="btn btn-primary btn-block"><b>Редактировать</b></a>
                    <a href="{{ route('admin.group.index') }}" class="btn btn-secondary btn-block"><b>Закрыть</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#participants"
                                                data-toggle="tab">Студенты</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Настройки</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="participants">
                            <div class="col-sm-12">
                                @forelse($students as $student)
                                    <div class="user-panel d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex">
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
                                        <div class="d-flex">
                                            <a href="{{ route('admin.user.show', $student->id) }}"
                                               class="btn btn-light mx-1"
                                               data-bs-toggle="tooltip"
                                               data-bs-html="true" data-bs-placement="top"
                                               title="Просмотреть информацию о пользователе">
                                                <i class="fas fa-id-badge"></i>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    @include('includes.no-data')
                                @endforelse
                            </div>
                        </div>

                        <div class="tab-pane" id="settings">
                            <h3 class="text-secondary mb-3">Специальность</h3>
                            <form action="{{ route('admin.user.specialization.store', $group->id) }}" method="POST"
                                  class="form-horizontal">
                                @csrf
                                @forelse($groupSpecializations as $groupSpecialization)
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Текущая
                                            специальность</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"
                                                   value="{{ $groupSpecialization->code  ?? '' }} {{ $groupSpecialization->title  ?? '' }}"
                                                   id="inputName"
                                                   readonly>
                                        </div>
                                    </div>
                                @empty
                                    <div class="mb-2">
                                        @include('includes.no-data')
                                    </div>
                                @endforelse
                                <div class="form-group row">
                                    <label for="specialization_id" class="col-sm-2 col-form-label">Специальность</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="specialization_id" name="specialization_id">
                                            @foreach($specializations as $specialization)
                                                <option
                                                    value="{{ $specialization->id }}">{{ $specialization->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Применить</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <h3 class="text-secondary mb-3">Куратор</h3>
                            <form action="{{ route('admin.user.curator.store', $group->id) }}" method="POST"
                                  class="form-horizontal">
                                @csrf
                                @forelse($curators as $curator)
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Текущий куратор</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"
                                                   value="{{ $curator->surname  ?? '' }} {{ $curator->name  ?? '' }} {{ $curator->middleName  ?? '' }}"
                                                   id="inputName"
                                                   readonly>
                                        </div>
                                    </div>
                                @empty
                                    <div class="mb-2">
                                        @include('includes.no-data')
                                    </div>
                                @endforelse
                                <div class="form-group row">
                                    <label for="user_id" class="col-sm-2 col-form-label">Куратор</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="user_id" name="user_id">
                                            @foreach($teachers as $teacher)
                                                <option
                                                    value="{{ $teacher->id }}">{{ $teacher->surname }} {{ $teacher->name }} {{ $teacher->middleName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="group_id" value="{{ $group->id }}">
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
