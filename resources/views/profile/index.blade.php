@extends('layouts.main')
@section('title', 'Профиль')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('preview.png') }}"
                             alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ auth()->user()->surname }} {{ auth()->user()->name }} {{ auth()->user()->middleName }}</h3>
                    <p class="text-muted text-center">@include('includes.get-role-auth')</p>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <strong><i class="fas fa-clock"></i> Дата создания</strong>
                            <p class="text-muted">{{ $dateCreated->day }} {{ $dateCreated->translatedFormat('F') }} {{ $dateCreated->year }} {{ $dateCreated->format('H:i') }}</p>
                        </li>
                        @if(auth()->user()->role->id === \App\Enums\Role::ROLE_CURATOR)
                            <li class="list-group-item">
                                <strong><i class="fas fa-book mr-1"></i>Куратор группы</strong>
                                <p class="text-muted">
                                    @forelse($curators as $curator)
                                        {{ $curator->title}}
                                    @empty
                                        Отсутствует
                                    @endforelse
                                </p>
                            </li>
                        @elseif(auth()->user()->role->id === \App\Enums\Role::ROLE_STUDENT)
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
                        @endif
                    </ul>
                    <a href="{{ route('main.index') }}" class="btn btn-secondary btn-block"><b>Закрыть</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Данные</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#participants" data-toggle="tab">Действия</a>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Документы</a></li>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">

                            <h3 class="text-secondary mb-3">Профиль пользователя</h3>
                            <form action="" method="POST"
                                  class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="user_family" class="col-sm-2 col-form-label">Фамилия</label>
                                    <div class="col-sm-10 w-25">
                                        <input type="text" class="form-control-plaintext"
                                               value="{{ auth()->user()->surname }}" id="user_family"
                                               readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_family" class="col-sm-2 col-form-label">Имя</label>
                                    <div class="col-sm-10 w-25">
                                        <input type="text" class="form-control-plaintext"
                                               value="{{ auth()->user()->name }}" id="user_family"
                                               readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_family" class="col-sm-2 col-form-label">Отчество</label>
                                    <div class="col-sm-10 w-25">
                                        <input type="text" class="form-control-plaintext"
                                               value="{{ auth()->user()->middleName }}" id="user_family"
                                               readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_family" class="col-sm-2 col-form-label">Логин</label>
                                    <div class="col-sm-10 w-25">
                                        <input type="text" class="form-control-plaintext"
                                               value="{{ auth()->user()->login }}" id="user_family"
                                               readonly>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="timeline">
                            <div class="timeline timeline-inverse">
                                <div class="time-label"><span class="bg-danger">10 Feb. 2014</span>
                                </div>
                                <div>
                                    <i class="fas fa-envelope bg-primary"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <i class="fas fa-user bg-info"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
                                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your
                                            friend request
                                        </h3>
                                    </div>
                                </div>
                                <div>
                                    <i class="fas fa-comments bg-warning"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post
                                        </h3>
                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="time-label"><span class="bg-success">3 Jan. 2014</span>
                                </div>
                                <div>
                                    <i class="fas fa-camera bg-purple"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>
                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                                        <div class="timeline-body">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <i class="far fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="participants">
                            <h3 class="text-secondary mb-3">Персональные данные</h3>
                            <form action="{{ route('profile.update') }}" method="POST"
                                  class="form-horizontal">
                                @csrf
                                @method('patch')
                                <div class="form-group row">
                                    <label for="user_family" class="col-sm-2 col-form-label">Фамилия</label>
                                    <div class="col-sm-10 w-50">
                                        <input type="text" class="form-control" name="surname"
                                               value="{{ auth()->user()->surname }}"
                                               id="user_family">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_family" class="col-sm-2 col-form-label">Имя</label>
                                    <div class="col-sm-10 w-50">
                                        <input type="text" class="form-control" name="name"
                                               value="{{ auth()->user()->name }}"
                                               id="user_family">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_family" class="col-sm-2 col-form-label">Отчество</label>
                                    <div class="col-sm-10 w-50">
                                        <input type="text" class="form-control" name="middleName"
                                               value="{{ auth()->user()->middleName }}"
                                               id="user_family">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Применить</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <h3 class="text-secondary mb-3">Учетные данные</h3>
                            <form action="{{ route('profile.password') }}" method="POST"
                                  class="form-horizontal">
                                @csrf
                                @method('patch')
                                <div class="form-group row">
                                    <label for="user_family" class="col-sm-2 col-form-label">Логин</label>
                                    <div class="col-sm-10 w-50">
                                        <input type="text" class="form-control-plaintext"
                                               value="{{ auth()->user()->login }}" id="user_family"
                                               aria-describedby="loginHelp" readonly>
                                        <div id="loginHelp" class="form-text text-danger">Логин уникальное значение.
                                            Изменить нельзя
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_family" class="col-sm-2 col-form-label">Пароль</label>
                                    <div class="col-sm-10 w-50">
                                        <input type="password" class="form-control" name="password" id="user_family"
                                               aria-describedby="loginHelp">
                                        <div id="loginHelp" class="form-text text-success">Вы можете изменить пароль.
                                            Минимум 7 символов
                                        </div>
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
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
