@extends('layouts.app')
@section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All animals') }}
        </h2>
    @endsection
@section('content') 
@include('layouts.animal-list')
@endsection
