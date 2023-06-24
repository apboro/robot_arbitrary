@extends('admin.layouts.app')
@section('title', 'Группы')

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <span class="fw-bolder">Управление группами</span>
        <div><a href="{{ route('admin.group.create') }}" class="btn btn-block btn-outline-primary btn-sm"
                data-bs-toggle="tooltip"
                data-bs-html="true" data-bs-placement="top" title="Создать новую роль"><i class="fas fa-plus"></i>
                Создать</a>
        </div>
    </div>
    @forelse($groups as $group)
        <div class="d-flex align-items-center justify-content-between border-bottom">
            <div class="user-panel d-flex align-items-center">
                <div class="info">
                    <div class="col-1">
                        <div class="row-1"><span class="badge bg-danger">{{ $group->title }}</span></div>
                    </div>
                </div>
            </div>
            <div class="info p-2">
                <div class="d-flex gx-5">
                    <a href="{{ route('admin.group.show', $group->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Просмотреть информацию о группе">
                        <i class="fas fa-id-badge"></i>
                    </a>
                    <a href="{{ route('admin.group.edit', $group->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Редактировать">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.group.destroy', $group->id) }}" method="POST">
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
