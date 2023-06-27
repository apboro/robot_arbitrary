@extends('curator.layouts.app')
@section('title', 'Управление группой')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="d-flex">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Студенты</span>
                    <span class="info-box-number">1,410</span>
                </div>

            </div>

        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Докладные</span>
                    <span class="info-box-number">1,410</span>
                </div>

            </div>

        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Прогулы</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    @foreach($groups as $group)
        @foreach($group->students as $student)
            <div class="d-flex align-items-center justify-content-between border-bottom">
                <div class="user-panel d-flex align-items-center">
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
                <div class="info p-2">
                    <div class="d-flex gx-5">
                        <a href="{{ route('admin.user.show', $student->id) }}" class="btn btn-light mx-1"
                           data-bs-toggle="tooltip"
                           data-bs-html="true" data-bs-placement="top"
                           title="Просмотреть информацию о пользователе">
                            <i class="fas fa-id-badge"></i>
                        </a>
                        <a href="{{ route('admin.user.edit', $student->id) }}" class="btn btn-light mx-1"
                           data-bs-toggle="tooltip"
                           data-bs-html="true" data-bs-placement="top" title="Редактировать">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('admin.user.role.edit', $student->id) }}" class="btn btn-light mx-1"
                           data-bs-toggle="tooltip"
                           data-bs-html="true" data-bs-placement="top" title="Изменить роль">
                            <i class="fas fa-user-tag"></i>
                        </a>
                        <a href="{{ route('admin.user.password.edit', $student->id) }}" class="btn btn-light mx-1"
                           data-bs-toggle="tooltip"
                           data-bs-html="true" data-bs-placement="top" title="Обновить пароль">
                            <i class="fas fa-fingerprint"></i>
                        </a>
                        <form action="{{ route('admin.user.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light ml-1" data-bs-toggle="tooltip"
                                    data-bs-html="true" data-bs-placement="top" title="Удалить"><i
                                    class="fas fa-trash-alt text-danger"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
@endsection
