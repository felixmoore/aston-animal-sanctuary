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
                                    Animal
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Species & Breed
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Age
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Colour
                                </th>
                                @if (Auth::user() != null && Auth::user()->type == 'Staff')
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Owner
                                    </th>
                                @endif
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($animals as $animal)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="{{ asset('storage/images/' . $animal->image) }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $animal->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $animal->species }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $animal->species }}</div>
                                        <div class="text-sm text-gray-500">{{ $animal->breed }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $animal->age }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $animal->colour }}
                                    </td>
                                    @if (Auth::user() != null && Auth::user()->type == 'Staff')
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if ($animal->owner_id == null)
                                                No owner
                                            @else
                                                @foreach ($users as $user)
                                                    @if ($user->id == $animal->owner_id)
                                                        {{ $user->name }}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div><a href="{{ route('animals.show', ['animal' => $animal->id]) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Details</a>
                                        </div>

                                        @if (Auth::user() != null && Auth::user()->type == 'Staff')
                                            <div><a href="{{ route('animals.edit', ['animal' => $animal->id]) }}"
                                                    class="btn btnwarning text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </div>
                                            <div>
                                                <form
                                                    action="{{ action([App\Http\Controllers\AnimalController::class, 'destroy'], ['animal' => $animal->id]) }}"
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
