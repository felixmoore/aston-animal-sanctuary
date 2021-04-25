@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">Edit and update the animal</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif
                    <div class="card-body">
                        <form class="form-horizontal" method="POST"
                            action="{{ route('animals.update', ['animal' => $animal['id']]) }}"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="col-md-8">
                                <label>Animal name</label>
                                {{-- old if/then keeps inputted data in case of validation errors --}}
                                <input type="text" name="name" value="{{ old('name') ? old('name') : $animal->name  }}"  /> 
                            </div>
                            <div class="col-md-8">
                                <label>Animal species</label>
                                <select name="species" >
                                @foreach ( $species as $selected )
                                <option value="{{ $selected }}"{{ ( $animal->species == $selected ) ? ' selected' : '' }}>{{ $selected }}</option>
                              @endforeach

                                </select>
                            </div>
                            <div class="col-md-8">
                                <label>Age</label>
                                <input type="number" name="age" value="{{ old('age') ? old('age') : $animal->age  }}" />
                            </div>
                            <div class="col-md-8">
                                <label>Breed</label>
                                <input type="text" name="breed" value="{{ old('breed') ? old('breed') : $animal->breed  }}" />
                            </div>
                            <div class="col-md-8">
                                <label>Colour</label>
                                <input type="text" name="colour" value="{{ old('colour') ? old('colour') : $animal->colour  }}" />

                            </div>
                            <div class="col-md-8">
                                <label>Image</label>
                                <input type="file" name="image" placeholder="Image file" value="{{ asset('storage/images/' . $animal->image)}}"/>
                            </div>
                            <div class="col-md-8">
                                <label>Owner</label>
                                
                                <select name="owner_id">
                                    <option value="">No owner</option>
                                    @foreach ($users as $user)
                                        @if ($user->id == $animal->owner_id)
                                            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                        @else
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                            <label>Available for adoption?</label>
                            <input type="checkbox" name="available" value="{{ old('available') ? old('available') : $animal->available  }}"  
                            @if($animal->available) checked=checked @endif >
                        </div>
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" />
                                <input type="reset" class="btn btn-primary" />
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
