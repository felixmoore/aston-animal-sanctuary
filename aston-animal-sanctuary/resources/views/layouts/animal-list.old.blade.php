<section>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="table table-bordered">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Species</th>
                                        <th>Age</th>
                                        <th>Breed</th>
                                        <th>Colour</th>
                                        <th>Owner</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($animals as $animal)
                                        <tr>
                                            
                                            <td ><img style="width:200px;height:200px"
                                                src="{{ asset('storage/images/'.$animal->image)}}"></td>
                                                {{-- TODO fix responsive sizing for images --}}
                                            <td>{{ $animal->name }}</td>
                                            <td>{{ $animal->species }}</td>
                                            <td>{{ $animal->age }}</td>
                                            <td>{{ $animal->breed }}</td>
                                            <td>{{ $animal->colour }}</td>
                                
                                            <td>
                                                @if ($animal->owner_id == NULL)
                                                No owner
                                            @else 
    
                                                    @foreach($users as $user)
    
                                                    @if ($user->id == $animal->owner_id)
                                                    {{ $user->name }}
                                                    @endif
                                                    @endforeach
                                                @endif
                                                </td> 
                                            {{-- ^needs check for user type to show only to admins --}}
                                            <td><a href="{{ route('animals.show', ['animal' => $animal->id]) }}"
                                                class="btn btnprimary">Details</a></td>
                                                @if (Auth::user() != NULL && Auth::user()->type == 'Staff' )
                                        <td><a href="{{ route('animals.edit', ['animal' => $animal->id]) }}"
                                                class="btn btnwarning">Edit</a></td>
                                                
                                        <td>
                                            <form
                                                action="{{ action([App\Http\Controllers\AnimalController::class, 'destroy'], ['animal' => $animal->id]) }}"
                                                method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE"> <!--prevents HTTP exception, DELETE not supported in regular HTML form--> 
                                                <button class="btn btn-danger" type="submit"> Delete</button>
                                            </form>
                                        </td>
                                        @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>