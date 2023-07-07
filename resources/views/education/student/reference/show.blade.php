@extends('main.layouts.app')
@section('title', 'Учебная часть | Справка')

@section('content')
    <div class="form-group row">
        <label for="user_family" class="col-sm-2 col-form-label">Фамилия</label>
        <div class="col-sm-10 w-25">
            <input type="text" class="form-control-plaintext"
                   value="{{ $referenceStudent->student->surname }}" id="user_family"
                   readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="user_family" class="col-sm-2 col-form-label">Имя</label>
        <div class="col-sm-10 w-25">
            <input type="text" class="form-control-plaintext"
                   value="{{ $referenceStudent->student->name }}" id="user_family"
                   readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="user_family" class="col-sm-2 col-form-label">Отчество</label>
        <div class="col-sm-10 w-25">
            <input type="text" class="form-control-plaintext"
                   value="{{ $referenceStudent->student->middleName }}" id="user_family"
                   readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="user_family" class="col-sm-2 col-form-label">Справка<sup
                class="text-danger">*</sup></label>
        <div class="col-sm-10 w-25">
            <input type="text" class="form-control-plaintext"
                   value="{{ $referenceStudent->reference->title }}" id="user_family"
                   readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="user_family" class="col-sm-2 col-form-label">Способ получения</label>
        <div class="col-sm-10 w-25">
            <input type="text" class="form-control-plaintext"
                   value="{{ $referenceStudent->take }}" id="user_family"
                   readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="user_family" class="col-sm-2 col-form-label">Статус</label>
        <div class="col-sm-10 w-25">
            <input type="text" class="form-control-plaintext"
                   value="{{ $referenceStudent->status }}" id="user_family"
                   readonly>
        </div>
    </div>
    <a href="{{ route('education.student.reference.index') }}"
       class="btn btn-dark"
       title="Вернуться назад">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
    @if($referenceStudent->take == 'Онлайн')
        <a href="{{ asset('storage/'. $referenceStudent->reference_file ) }}"
           class="btn btn-dark"
           title="Просмотреть справку" target="_blank">
            <i class="fas fa-edit"></i> Ваша справка
        </a>
    @endif
@endsection
