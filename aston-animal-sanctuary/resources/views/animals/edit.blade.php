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
                                <input type="text" name="name" value="{{ $animal->name }}" />
                            </div>
                            <div class="col-md-8">
                                <label>Animal species</label>
                                <select name="species" selected="{{ $animal->species }}">
                                    <option value="Cat">Cat</option>
                                    <option value="Dog">Dog</option>
                                    <option value="Small animal">Small animal</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label>Age</label>
                                <input type="number" name="age" value="{{ $animal->age }}" />
                            </div>
                            <div class="col-md-8">
                                <label>Breed</label>
                                <input type="text" name="breed" value="{{ $animal->breed }}" />
                            </div>
                            <div class="col-md-8">
                                <label>Colour</label>
                                <input type="text" name="colour" value="{{ $animal->colour }}" />

                            </div>
                            <div class="col-md-8">
                                <label>Image</label>
                                <input type="file" name="image" placeholder="Image file" />
                            </div>
                            <div class="col-md-8">
                                <label>Owner</label>
                                @if ($animal['owner_id']==null) 
                                   @php ($value = 'NULL')
                                @else 
                                    @foreach ($users as $user)
                                        @if ($user->id == $animal['owner_id'])
                                        @php ($value = $user->id)
                                        @endif
                                    @endforeach
                                @endif
                                <select name="owner" selected="{{ $value }}">
                                    <option value="NULL">No owner</option>
                                    @foreach ($users as $user)

                                        <option value="{{ $user->id }}">{{ $user->name }}</option>

                                    @endforeach
                                </select>
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
