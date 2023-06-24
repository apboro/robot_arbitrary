@extends('admin.layouts.app')
@section('title', 'Предметы')

@section('content')
    <div class="d-flex align-items-center justify-content-between pr-2 mb-3">
        <span class="fw-bolder">Управление предметами</span>
        <div class="d-flex align-items-center">
            <a href="{{ route('admin.item.create') }}" class="btn btn-outline-primary btn-sm" data-bs-toggle="tooltip"
               data-bs-html="true" data-bs-placement="top" title="Добавить новый предмет"><i
                    class="fas fa-book-medical mr-1"></i> Создать</a>
            <a href="" class="btn btn-outline-primary ml-2 btn-sm" data-bs-toggle="tooltip"
               data-bs-html="true" data-bs-placement="top" title="Импортировать данные из .xlsx файла"><i
                    class="fas fa-file-import mr-1"></i> Импорт</a>
            <form action="" class="form-horizontal ml-2">
                <div class="d-flex">
                    <input type="search" name="" id="" class="form-control" placeholder="Поиск...">
                    <input type="submit" class="btn btn-light border border-1 ml-1" value="Найти">
                </div>
            </form>
        </div>
    </div>
    @forelse($items as $item)
        <div class="d-flex align-items-center justify-content-between border-bottom">
            <div class="user-panel d-flex align-items-center">
                <div class="info">
                    <div class="col-1">
                        <div class="row-1"><span class="badge bg-danger">{{ $item->title }}</span></div>
                    </div>
                </div>
            </div>
            <div class="info p-2">
                <div class="d-flex gx-5">
                    <a href="{{ route('admin.item.show', $item->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Просмотреть информацию о предмете">
                        <i class="fas fa-book-reader"></i>
                    </a>
                    <a href="{{ route('admin.item.edit', $item->id) }}" class="btn btn-light mx-1"
                       data-bs-toggle="tooltip"
                       data-bs-html="true" data-bs-placement="top" title="Редактировать">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.item.destroy', $item->id) }}" method="POST">
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
