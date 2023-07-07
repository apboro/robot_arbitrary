@extends('main.layouts.app')
@section('title', 'Учебный отдел')

@section('content')
    <form action="" method="POST" class="form-horizontal w-10">
        @csrf
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
        @if($referenceStudent->take == 'Онлайн')
            <div class="form-group w-25">
                <label for="formFile" class="form-label">Выберите файл со справкой <sup
                        class="text-danger">*</sup></label>
                <input class="form-control" name="claim_file" type="file" id="formFile" required>
                @error('claim_file')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="formFile" class="form-text">
                    Формат загружаемого файла: <span
                        class="text-dark fs-6">  .pdf, .doc, .docx</span>
                </div>
            </div>
        @endif
        <input type="hidden" name="status" value="Выполнено">
        <div class="card-footer">
            <button type="submit" class="btn btn-danger"><b>Обработать</b></button>
            <a href="{{ route('education.worker.index') }}" class="btn btn-secondary"><b>Закрыть</b></a>
        </div>
    </form>
@endsection
