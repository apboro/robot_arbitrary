@extends('admin.layouts.app')
@section('title', 'Пользователь')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('image102-10.jpg') }}"
                             alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $user->surname }} {{ $user->name }} {{ $user->middleName }}</h3>
                    <p class="text-muted text-center">@include('includes.get-role')</p>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <strong><i class="fas fa-clock"></i> Дата создания</strong>
                            <p class="text-muted">{{ $dateCreated->day }} {{ $dateCreated->translatedFormat('F') }} {{ $dateCreated->year }} {{ $dateCreated->format('H:i') }}</p>
                        </li>
                        <li class="list-group-item">
                            <strong><i class="fas fa-book mr-1"></i> Группа</strong>
                            <p class="text-muted">
                                @forelse($userGroups as $userGroup)
                                    {{ $userGroup->title ?? 'Отсутствует' }}
                                @empty
                                    Отсутствует
                                @endforelse
                            </p>
                        </li>
                        <li class="list-group-item">
                            <strong><i class="fas fa-pencil-alt mr-1"></i> Специальность</strong>
                            <p class="text-muted">09.02.07 Информация</p>
                        </li>
                        <li class="list-group-item">
                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                fermentum
                                enim neque.</p>
                        </li>
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
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Докладные</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Документы</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Настройки</a></li>
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
                        <div class="tab-pane" id="settings">
                            <form action="{{ route('admin.user.group.store', $user->id) }}" method="POST"
                                  class="form-horizontal">
                                @csrf
                                @forelse($userGroups as $userGroup)
                                    <div class="border-bottom">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Текущая
                                                группа</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control"
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
                                    </div>
                                @empty
                                    @include('includes.no-data')
                                @endforelse
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
