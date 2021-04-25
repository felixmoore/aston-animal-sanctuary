@extends('layouts.app')
{{-- TODO needs check for user type = admin --}}

    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add an animal to the database') }}
        </h2>
    @endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-header">Enter animal details</div>
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
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif

                    <!-- define the form -->
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ url('animals') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-8">
                                <label>Animal name</label>
                                <input type="text" name="name" value="{{ old('name') ? old('name') :"" }}" placeholder="Name" /> 
                            </div>
                            <div class="col-md-8">
                                <label>Animal species</label>
                                <select name="species" >
                                  @foreach ( $species as $selected )
                                    <option value="{{ $selected }}">{{ $selected }}</option>
                                  @endforeach
    
                                    </select>
                            </div>
                            <div class="col-md-8">
                                <label>Age</label>
                                <input type="number" name="age" value="{{ old('age') ? old('age') : ""  }}"placeholder="Age"  />
                            </div>
                            <div class="col-md-8">
                                <label>Breed</label>
                                <input type="text" name="breed" value="{{ old('breed') ? old('breed') : "" }}" placeholder="Breed" />
                            </div>
                            <div class="col-md-8">
                                <label>Colour</label>
                                <input type="text" name="colour" value="{{ old('colour') ? old('colour') :""}}" placeholder="Colour"  />
                                {{-- <textarea rows="4" cols="50" name="colour"> Colour </textarea> --}}
                            </div>
                            <div class="col-md-8">
                                <label>Image</label>
                                <input type="file" name="image" placeholder="Image file" />
                            </div>
                            <div class="col-md-8">
                                <label>Owner</label>
                                <select name="owner_id">
                                    <option value="" selected>No owner</option>
                                    @foreach($users as $user)
                                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label>Available for adoption?</label>
                                <input type="checkbox" name="available" value="{{ old('available') ? old('available') : False  }}" >
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" />
                                <input type="reset" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
