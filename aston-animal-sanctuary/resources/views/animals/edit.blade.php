@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Update an animal\'s information') }}
    </h2>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
        @component('components.alerts.error')
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endcomponent
        </div><br />
    @endif
    @if (\Session::has('success'))
        @component('components.alerts.success')
            <p>{{ \Session::get('success') }}</p>
        @endcomponent
    @endif
    {{-- Adapted from https://tailwindcomponents.com/component/form-create --}}
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
            <div class="max-w-md mx-auto">
                <div class="block  font-semibold text-xl self-start text-gray-700">
                    <h1 class="leading-relaxed">Edit animal details</h2>
                </div>
                <form class="form-horizontal" method="POST"
                    action="{{ route('animals.update', ['animal' => $animal['id']]) }}"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf


                    <div class="divide-y divide-gray-200">
                        <div
                            class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="flex flex-col">
                                <label class="leading-loose">Animal name</label>
                                <input type="text"
                                    class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                    name="name" value="{{ old('name') ? old('name') : $animal->name  }}"
                                    placeholder="Name" />
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="flex flex-col w-1/2">
                                    <label class="leading-loose">Animal species</label>
                                    <select name="species"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                        @foreach ($species as $selected)
                                        <option value="{{ $selected }}"{{ ( $animal->species == $selected ) ? ' selected' : '' }}>{{ $selected }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col w-1/2">
                                    <label class="leading-loose">Breed</label>
                                    <input type="text"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        name="breed" value="{{ old('breed') ? old('breed') : $animal->breed  }}"
                                        placeholder="Breed" />
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-4">
                                <div class="flex flex-col w-1/2">
                                    <label class="leading-loose">Age</label>
                                    <input type="number"
                                    class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                    name="age" value="{{ old('age') ? old('age') : $animal->age  }}"
                                    placeholder="Age" />
                                </div>

                                <div class="flex flex-col w-1/2">
                                    <label class="leading-loose">Sex</label>
                                    <select name="sex"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                        <option value="Female" @if($animal->sex == "Female") selected @endif>Female</option>
                                        <option value="Male" @if($animal->sex == "Male") selected @endif>Male</option>
                                    </select>
                                </div>
                                
                            </div>


                            <div class="flex flex-col">
                                <label class="leading-loose">Colour</label>
                                <input type="text"
                                    class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                    name="colour" value="{{ old('colour') ? old('colour') : $animal->colour  }}"
                                    placeholder="Colour" />
                            </div>

                            <div class="flex flex-col">
                                <label class="leading-loose">Image</label>

                                <input type="file" name="images[]" multiple
                                    class="form-control px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                    accept="image/*">
                                @if ($errors->has('files'))
                                    @foreach ($errors->get('files') as $error)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $error }}</strong>
                                        </span>
                                    @endforeach
                                @endif
                                {{-- <input type="file"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            name="image" placeholder="Image file" /> --}}
                            </div>

                            <div class="flex flex-col ">
                                <label class="leading-loose">Owner</label>
                                <select name="owner_id"
                                    class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
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

                            <div class="flex flex-row">
                                <input type="checkbox" name="available"  class="px-4 py-4  border focus:ring-gray-500 focus:border-gray-900 h-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                 value="{{ old('available') ? old('available') : $animal->available  }}"  
                            @if($animal->available) checked=checked @endif >
                               
                                <label class="leading-loose pl-3 ">Available for adoption?</label>
                            </div>

                        </div>
                        <div class="pt-4 flex items-center space-x-4">

                            <a href="{{ route('animals.index') }}"
                                class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none"><svg
                                    class="w-6 h-6 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg> Cancel</a>

                            <input type="submit"
                                class="btn btn-primary bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none" />
                        </div>
                    </div>



                </form>
            </div>
        </div>
    </div>

@endsection
