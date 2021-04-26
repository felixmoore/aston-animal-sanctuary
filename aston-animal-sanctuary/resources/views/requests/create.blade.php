

@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('New adoption request') }}
    </h2>
@endsection
@section('content')

 <!-- display the errors -->
 @if ($errors->any())
 @component('components.alerts.error')
     @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
     @endforeach
 @endcomponent
@endif
<!-- display the success status -->
@if (\Session::has('success'))
 @component('components.alerts.success')
     <p>{{ \Session::get('success') }}</p>
 @endcomponent
@endif
    @if (Auth::user() != null)

        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">

                    <div class="block  font-semibold text-xl self-start text-gray-700">
                        <h1 class="leading-relaxed">{{ $animal->name }}</h2>
                    </div>

                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="flex flex-col">
                                <h1>Are you sure you want to request this animal?</h1>
                                <table class="table table-striped" border="1">
                                    <tr>
                                        <td colspan='2'>
                                            @if ($animal->image == 0)
                                                <img class="w-auto h-auto" src="{{ asset('storage/images/placeholder.png') }}" alt="">
                                            @elseif ($animal->image == 1)
                                                <img class="w-auto h-auto" src="{{ asset('storage/images/' . $images->where('animal_id', $animal->id)->first()->image_location) }}"
                                                    alt="">
                                            @endif
                                        </td>
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
                                <form action="{{ url('requests') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="number" name="user_id" value="{{ Auth::user()->id }}" hidden />
                                    <input type="number" name="animal_id" value="{{ $animal->id }}" hidden />
                                    <br/><br/>
                                    <input type="submit" class="btn btn-primary  w-1/3 text-gray-900 px-4 py-3 rounded-md focus:outline-none" />
                                    <a href="{{ route('animals.show', ['animal' => $animal->id]) }}" class="btn btn-primary  w-1/3 text-gray-900 px-4 py-3 rounded-md focus:outline-none">Cancel</a>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    @else
        <p> Please log in before making an adoption request! </p>
    @endif
@endsection
