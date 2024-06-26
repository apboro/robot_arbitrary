@extends('layouts.main')
@section('title', 'Мои докладные')

@section('content')
    @forelse($claims as $claim)
        <div class="post d-flex align-items-center">
            <div class="user-block">
                <img class="img-circle img-bordered-sm"
                     src="{{ asset('preview.png') }}" alt="user image">
                <span
                    class="username">{{ $claim->student->surname }} {{ $claim->student->name }} {{ $claim->student->middleName }}</span>
                <span
                    class="description">Дата публикации - {{ \Carbon\Carbon::parse($claim->created_at)->day }} {{ \Carbon\Carbon::parse($claim->created_at)->translatedFormat('F') }} {{ \Carbon\Carbon::parse($claim->created_at)->year }}</span>
            </div>
            <div class="d-flex align-items-center">
                <a href="{{ asset('storage/'. $claim->claim_file ) }}" class="btn btn-dark mr-1" target="_blank">Просмотреть</a>
                <a href="{{ route('claim.download', $claim->id) }}" class="btn btn-dark">Скачать</a>
            </div>
        </div>
    @empty
        @include('includes.no-data')
    @endforelse
@endsection
