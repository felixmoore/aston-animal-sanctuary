@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Active adoption requests') }}
    </h2>
@endsection
@section('content')
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="table table-bordered">
                        <thead class="bg-gray-50">
                            <tr>
                                <th>Request ID</th>
                                <th>Date/Time</th>
                                <th>Animal ID</th>
                                <th>Animal Name</th>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Status</th>

                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($requests as $request)
                                <tr>

                                    {{-- <td><img style="width:200px;height:200px"
                                            src="{{ asset('storage/images/' . $request['image']) }}"></td> --}}
                                    {{-- TODO fix responsive sizing for images --}}
                                    <td>{{ $request['id'] }}</td>
                                    <td>{{  date('d/m/Y H:i', strtotime($request['created_at'])) }}</td>
                                    <td>{{ $request['animal_id'] }}</td>
                                    <td>
                                        @foreach ($animals as $animal)
                                            @if ($animal->id == $request['animal_id'])
                                                {{ $animal->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    @if (Auth::user() != null && Auth::user()->type == 'Staff')
                                    <td>{{ $request['user_id'] }}</td>
                                    <td>
                                        @foreach ($users as $user)

                                            @if ($user->id == $request['user_id'])
                                                {{ $user->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    @endif
                                    <td>{{ $request['status'] }}</td>

                                   
                                    <td><a href="{{ route('animals.show', ['animal' => $request['animal_id']]) }}"
                                            class="btn btnprimary">Details</a></td>
                                    @if (Auth::user() != null && Auth::user()->type == 'Staff')
                                        <td><a href="{{ route('requests.edit', ['request' => $request['id']]) }}"
                                                class="btn btnwarning">Edit</a></td>

                                        <td>
                                            @if ($request['status'] == 'Pending')
                                                                                            
                                            {{-- TODO --}}
                                            <td><a href="{{ route('requests.edit', ['request' => $request['id']]) }}"
                                                class="btn btnwarning">Approve</a></td>

                                        <td>
                                            <td><a href="{{ route('requests.edit', ['request' => $request['id']]) }}"
                                                class="btn btnwarning">Deny</a></td>
                                                @endif
                                        {{-- end TODO --}}
                                        <td>
                                            
                                            <form
                                                action="{{ action([App\Http\Controllers\RequestController::class, 'destroy'], ['request' => $request['id']]) }}"
                                                method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <!--prevents HTTP exception, DELETE not supported in regular HTML form-->
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
@endsection
