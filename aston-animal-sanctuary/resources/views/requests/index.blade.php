@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Active adoption requests') }}
    </h2>
@endsection
@section('content')
    @include('layouts.requests-list')
@endsection
