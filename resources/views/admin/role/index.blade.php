@extends('admin.layouts.app')
@section('title', 'Роли')

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <span class="fw-bolder">Управление ролями</span>
        <div><a href="{{ route('admin.role.create') }}" class="btn btn-block btn-outline-primary btn-sm">Создать</a>
        </div>
    </div>
    @forelse($roles as $role)
        <div class="d-flex align-items-center justify-content-between">
            <div class="user-panel d-flex align-items-center">
                <div class="info">
                    <div class="col-1">
                        <div class="row-1"><span class="badge bg-danger">{{ $role->title }}</span></div>
                    </div>
                </div>
            </div>
            <div class="info p-2">
                <div class="d-flex gx-5">
                    <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Редактировать">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.role.destroy', $role->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-light ml-1" data-bs-toggle="tooltip"
                                data-bs-html="true" data-bs-placement="top" title="Удалить"><i
                                class="fas fa-trash-alt text-danger"></i></button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        @include('includes.no-data')
    @endforelse
@endsection
