@extends('main.layouts.app')
@section('title', 'Учебный отдел')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#reference" data-toggle="tab">Справки</a>
                    </li>
                    {{--                    <li class="nav-item"><a class="nav-link invi" href="#statement" data-toggle="tab">Заявления</a>--}}
                    {{--                    </li>--}}
                    <li class="nav-item"><a class="nav-link" href="#action" data-toggle="tab">Действия</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#all_reference" data-toggle="tab">Все справки</a>
                    </li>
                    {{--                    <li class="nav-item"><a class="nav-link" href="#all_statement" data-toggle="tab">Все заявления</a>--}}
                    {{--                    </li>--}}
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="reference">

                        <h3 class="text-secondary mb-3">Справки</h3>
                        <div class="post d-flex align-items-center">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm"
                                     src="{{ asset('preview.png') }}" alt="user image">
                                <span
                                    class="username">Мещеряков Лев Валерьевич <sup><span class="badge text-bg-success">New</span></sup></span>
                                <span
                                    class="description">Дата публикации - 29 июнь 2023</span>
                            </div>
                            <div>
                                <a href="" class="btn btn-danger" target="_blank">Просмотреть</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="statement">
                        <h3 class="text-secondary mb-3">Заявления</h3>
                        <div class="post d-flex align-items-center">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm"
                                     src="{{ asset('preview.png') }}" alt="user image">
                                <span
                                    class="username">Мещеряков Лев Валерьевич <sup><span class="badge text-bg-success">New</span></sup></span>
                                <span
                                    class="description">Дата публикации - 29 июнь 2023</span>
                            </div>
                            <div>
                                <a href="" class="btn btn-danger" target="_blank">Просмотреть</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="action">
                        <h3 class="text-secondary mb-3">Действия</h3>
                        <form action="{{ route('reference.store') }}" method="POST">
                            @csrf
                            <div class="form-group w-25">
                                <label for="formFile" class="form-label">Добавить новый вид справки <sup
                                        class="text-danger">*</sup></label>
                                <input class="form-control" name="title" type="text" id="formFile">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger"><b>Создать</b></button>
                            </div>
                        </form>
                        {{--                        <hr>--}}
                        {{--                        <h3 class="text-secondary mb-3">Действия</h3>--}}
                        {{--                        <div class="form-group w-25">--}}
                        {{--                            <label for="formFile" class="form-label">Добавить новый вид заявления <sup--}}
                        {{--                                    class="text-danger">*</sup></label>--}}
                        {{--                            <input class="form-control" name="title" type="text" id="formFile" required>--}}
                        {{--                            @error('claim_file')--}}
                        {{--                            <p class="text-danger">{{ $message }}</p>--}}
                        {{--                            @enderror--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <button type="submit" class="btn btn-danger"><b>Создать</b></button>--}}
                        {{--                        </div>--}}
                        {{--                        <hr>--}}
                    </div>
                    <div class="tab-pane" id="all_reference">

                        <h3 class="text-secondary mb-3">Все справки</h3>
                        @forelse($references as $reference)
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="user-panel d-flex align-items-center">
                                    <div class="info">
                                        <div class="col-1">
                                            <div class="row-1"><span
                                                    class="badge bg-danger">{{ $reference->title }}</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="d-flex gx-5">
                                        <a href="{{ route('reference.edit', $reference->id) }}"
                                           class="btn btn-light mx-1"
                                           data-bs-toggle="tooltip"
                                           data-bs-html="true" data-bs-placement="top" title="Редактировать">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('reference.destroy', $reference->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light ml-1" data-bs-toggle="tooltip"
                                                    data-bs-html="true" data-bs-placement="top" title="Удалить"><i
                                                    class="fas fa-trash-alt text-danger"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @empty
                            @include('includes.no-data')
                        @endforelse
                    </div>
                    <div class="tab-pane" id="all_statement">

                        <h3 class="text-secondary mb-3">Все заявления</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
