@extends('layouts.app')
@section('header')
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
      @endsection
      @section('content')
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                 Welcome to your dashboard!
              </div>
          </div>
          {{-- public - something like two cards w/ "View all animals" "View your adoption requests" --}}
          {{-- public - you have X pending requests --}}
          {{--number of animals available to adopt--}}
          {{-- staff - number of pending requests--}}
          {{-- staff - something like three cards w/ "View all animals"  "Add a new animal"  "View adoption requests"--}}
      </div>
  </div>

  @include('layouts.animal-list')
@endsection

