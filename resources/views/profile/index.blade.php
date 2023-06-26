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
                    <h3 class="profile-username text-center">reher</h3>
                    <p class="text-muted text-center">Отсутствует</p>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <strong><i class="fas fa-clock"></i> Дата создания</strong>
                            <p class="text-muted">12312321</p>
                        </li>
                        <li class="list-group-item">
                            <strong><i class="fas fa-users"></i> Количество студентов</strong>
                            <p class="text-muted">
                                233
                            </p>
                        </li>
                        <li class="list-group-item">
                            <strong><i class="fas fa-pencil-alt mr-1"></i> Специальность</strong>
                            <p>Отсутствует</p>
                        </li>
                    </ul>
                    <a href="" class="btn btn-primary btn-block"><b>Редактировать</b></a>
                    <a href="" class="btn btn-secondary btn-block"><b>Закрыть</b></a>
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
                        <li class="nav-item"><a class="nav-link" href="#participants" data-toggle="tab">Студенты</a>
                        </li>
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

                        <div class="tab-pane" id="participants">
                            <div class="col-sm-6">
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
                                                    class="row-1 text-dark">Какой-то текст
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <a href=""
                                           class="btn btn-light mx-1"
                                           data-bs-toggle="tooltip"
                                           data-bs-html="true" data-bs-placement="top"
                                           title="Просмотреть информацию о пользователе">
                                            <i class="fas fa-id-badge"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="settings">
                            <h3 class="text-secondary mb-3">Специальность</h3>
                            <form action="" method="POST"
                                  class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="specialization_id" class="col-sm-2 col-form-label">Специальность</label>
                                    <div class="col-sm-10">
                                    </div>
                                    <input type="hidden" name="group_id" value="">
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Применить</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <h3 class="text-secondary mb-3">Куратор</h3>
                            <form action="" method="POST"
                                  class="form-horizontal">

                                <div class="form-group row">
                                    <label for="user_id" class="col-sm-2 col-form-label">Куратор</label>
                                    <input type="hidden" name="group_id" value="=">
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
