@extends('main.layouts.app')
@section('title', 'Учебная часть | Справка')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#action" data-toggle="tab">Создание</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#reference" data-toggle="tab">Мои справки <sup><span
                                    class="badge text-bg-danger">{{ $completedReferences }}</span></sup></a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">

                    <div class="active tab-pane" id="action">
                        <h3 class="text-secondary mb-3">Действия</h3>
                        <form action="{{ route('education.student.reference.store') }}" method="POST">
                            @csrf
                            <div class="form-group w-25">
                                <label for="reference_id" class="form-label">Выберите тип справки <sup
                                        class="text-danger">*</sup></label>
                                <select name="reference_id" id="reference_id" class="form-control" required>
                                    @foreach($references as $reference)
                                        <option value="{{ $reference->id }}">{{ $reference->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-25">
                                <label for="reference_id" class="form-label">Выберите способ получения <sup
                                        class="text-danger">*</sup></label>
                                <select name="take" id="reference_id" class="form-control" required>
                                    <option value="Лично">Лично</option>
                                    <option value="Онлайн">Онлайн</option>
                                </select>
                            </div>
                            <input type="hidden" value="Новая" name="status">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger"><b>Создать</b></button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="reference">

                        <h3 class="text-secondary mb-3">Мои справки</h3>
                        @forelse($myReferences as $myReference)
                            <div class="post d-flex align-items-center">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                         src="{{ asset('preview.png') }}" alt="user image">
                                    <span
                                        class="username">{{ $myReference->student->surname }} {{ $myReference->student->name }} {{ $myReference->student->middleName }} <sup><span @class([
                                                            'badge text-bg-danger' => $myReference->status === 'Новая',
                                                            'badge text-bg-success' => $myReference->status === 'Выполнено',
                                                                                                                        ])>{{ $myReference->status }}</span></sup></span>
                                    <span
                                        class="description">Дата публикации - {{ \Carbon\Carbon::parse($myReference->created_at)->day }} {{ \Carbon\Carbon::parse($myReference->created_at)->translatedFormat('F') }} {{ \Carbon\Carbon::parse($myReference->created_at)->year }}</span>
                                </div>
                                <div>
                                    <div class="d-flex gx-5">
                                        <a href=""
                                           class="btn btn-light mx-1"
                                           title="Просмотреть информацию">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            @include('includes.no-data')
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
