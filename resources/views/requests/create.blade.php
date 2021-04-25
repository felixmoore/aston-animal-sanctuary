{{-- TODO check user is logged in !!! --}}

@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('New adoption request') }}
    </h2>
@endsection
@section('content')

    {{-- @include('layouts.requests-list') --}}
    @if (Auth::user() != NULL)
<h1>Are you sure you want to request this animal?</h1>
<table class="table table-striped" border="1">
    <tr>
        <td colspan='2'><img style="width:250px;height:250px%"
                src="{{ asset('storage/images/' . $animal->image) }}"></td>
    </tr>
    <tr>
        <th> Name </th>
        <td> {{ $animal->name }}</td>
    </tr>
    <tr>
        <th>Species </th>
        <td>{{ $animal->species }}</td>
    </tr>
</table>
<form action="{{ url('requests') }}" method="POST"  enctype="multipart/form-data">
    @csrf

    <input type="number" name="user_id" value="{{Auth::user()->id}}" hidden/> 
    <input type="number" name="animal_id" value="{{$animal->id}}" hidden/> 
 
    <input type="submit" class="btn btn-primary" />
    <a href="{{ route('animals.show', ['animal' => $animal->id]) }}">Cancel</a>

    
</form>
{{-- <a href="{{ route('animals.index') }}" class="btn btn-primary" role="button">Confirm</a>
    <a href="{{ route('animals.index') }}" class="btn btn-primary" role="button">Cancel</a> --}}
    @else
        <p> Please log in before making an adoption request! </p>
        {{-- TODO link to login instead --}}
    @endif
@endsection
