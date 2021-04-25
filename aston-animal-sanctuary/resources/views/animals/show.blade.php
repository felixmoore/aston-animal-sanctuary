@extends('layouts.app')
@section('content')
    <div class="container">
         <!-- display request success status -->
 @if (\Session::has('success'))
 <div class="alert alert-success">
     <p>{{ \Session::get('success') }}</p>
 </div><br />
@endif
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">Animal details</div>
                    <div class="card-body">
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
                            <tr>
                                <th>Age </th>
                                <td>{{ $animal->age }}</td>
                            </tr>
                            <tr>
                                <th>Breed </th>
                                <td>{{ $animal->breed }}</td>
                            </tr>
                            <tr>
                                <th>Colour </th>
                                <td>{{ $animal->colour }}</td>
                            </tr>
                            @if (Auth::user() != NULL && Auth::user()->type == 'Staff' )
                            <tr>
                                <th>Owner</th>
                                <td>
                                    @if ($animal['owner_id'] == null)
                                        No owner
                                    @else

                                        @foreach ($users as $user)

                                            @if ($user->id == $animal['owner_id'])
                                                {{ $user->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                @endif
                        </table>
                        <table>
                            <tr>
                                <td><a href="{{ route('animals.index') }}" class="btn btn-primary" role="button">Back to the
                                        list</a></td>
                                
                                {{-- Check that animal is unowned before allowing a new adoption request--}}
                                @if ($animal['owner_id'] == null) 
                                    <td><a href="{{ route('requests.adopt',  ['id' => $animal['id']]) }}"
                                        class="btn btnwarning">Adopt this animal</a></td>
                                @endif
                                @if (Auth::user() != NULL && Auth::user()->type == 'Staff' )
                                    <td><a href="{{ route('animals.edit', ['animal' => $animal['id']]) }}"
                                            class="btn btnwarning">Edit</a></td>
                                    <td>
                                        <form action="{{ route('animals.destroy', ['animal' => $animal['id']]) }}"
                                            method="post"> @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
