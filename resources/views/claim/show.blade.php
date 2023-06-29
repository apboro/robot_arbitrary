@extends('layouts.main')
@section('title')
    Докладная | {{ $user->surname }}
@endsection

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
                            <strong><i class="fas fa-book mr-1"></i> Группа</strong>
                            <p class="text-muted">
                                @forelse($user->groups as $group)
                                    {{ $group->title }}
                                @empty
                                    @include('includes.no-data')
                                @endforelse
                            </p>
                        </li>
                    </ul>
                    <a href="{{ route('claim.index') }}" class="btn btn-secondary btn-block"><b>Закрыть</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Докладная</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">

                            <h3 class="text-secondary mb-3">Составление докладной</h3>
                            <form action="{{ route('claim.store', $user->id) }}" method="POST"
                                  class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Выберите файл с докладной <sup
                                            class="text-danger">*</sup></label>
                                    <input class="form-control" name="claim_file" type="file" id="formFile" required>
                                </div>
                                @csrf
                                <input type="hidden" name="student_id" id="" value="{{ $user->id }}">
                                <input type="hidden" name="teacher_id" id="" value="{{ auth()->user()->id }}">
                                <div class="form-group">
                                    <label for="comment_claim">Укажите дополнительный комментарий</label>
                                    <textarea class="form-control" id="comment_claim" name="comment" rows="3"
                                              placeholder="Введите текст..."></textarea>
                                    <div id="comment_claim" class="form-text">
                                        Это поле опциональное. Заполнять его необязательно
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger"><b>Создать</b></button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
