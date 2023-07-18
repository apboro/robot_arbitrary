@extends('admin.layouts.app')
@section('title', 'Специальности')

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <span class="fw-bolder">Управление специальностями</span>
        <div><a href="{{ route('admin.specialization.create') }}" class="btn btn-block btn-dark btn-sm"
                title="Создать новую роль"><i class="fas fa-plus"></i>
                Создать</a>
        </div>
    </div>
    @forelse($specializations as $specialization)
        <div class="d-flex align-items-center justify-content-between border-bottom">
            <div class="user-panel d-flex align-items-center">
                <div class="info">
                    <div class="col-1">
                        <div class="row-1"><span class="badge bg-danger">{{ $specialization->title }}</span></div>
                    </div>
                </div>
            </div>
            <div class="info p-2">
                <div class="d-flex gx-5">
                    <a href="{{ route('admin.specialization.show', $specialization->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Просмотреть информацию о специальности">
                        <i class="fas fa-id-badge"></i>
                    </a>
                    <a href="{{ route('admin.specialization.edit', $specialization->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Редактировать">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.specialization.destroy', $specialization->id) }}" method="POST">
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
