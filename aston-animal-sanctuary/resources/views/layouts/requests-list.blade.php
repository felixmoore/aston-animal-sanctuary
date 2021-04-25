<section>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Request ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date/Time Request Created
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Animal ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Animal Name
                                </th>
                                @if (Auth::user() != null && Auth::user()->type == 'Staff')
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        User ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        User Name
                                    </th>
                                @endif
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if (Auth::user() != null && Auth::user()->type == 'Public')
                                @php
                                    $requests = $user_requests
                                @endphp
                            @endif
                            @foreach ($requests as $request)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $request->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ date('d/m/Y H:i', strtotime($request->created_at)) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $request->animal_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @foreach ($animals as $animal)
                                            @if ($animal->id == $request->animal_id)
                                                {{ $animal->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    @if (Auth::user() != null && Auth::user()->type == 'Staff')
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $request->user_id }}
                                    </td><td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @foreach ($users as $user)

                                            @if ($user->id == $request['user_id'])
                                                {{ $user->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $request->status }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div><a href="{{ route('animals.show', ['animal' => $request->animal_id]) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Animal details</a>
                                        </div>

                                        @if (Auth::user() != null && Auth::user()->type == 'Staff')
                                            @if ($request['status'] == 'Pending'){{-- TODO --}}
                                                <div>
                                                    <a href="{{route('requests.approve', $request->id)}}" class="btn btn-danger text-indigo-600 hover:text-indigo-900">Approve</a>
                                                    
                                                </div>
                                                <div>
                                                    <a href="{{route('requests.deny', $request->id)}}" class="btn btn-danger text-indigo-600 hover:text-indigo-900">Deny</a>
                                                    
                                                    
                                                </div>
                                            @endif

                                            <div>
                                                <form
                                                    action="{{ action([App\Http\Controllers\RequestController::class, 'destroy'], ['request' => $request->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <!--prevents HTTP exception, DELETE not supported in regular HTML form-->
                                                    <button class="btn btn-danger text-indigo-600 hover:text-indigo-900"
                                                        type="submit"> Delete</button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
