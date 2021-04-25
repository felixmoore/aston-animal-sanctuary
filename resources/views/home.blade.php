<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Aston Animal Sanctuary</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            /* font-family: 'Nunito', sans-serif; */
        }

    </style> 
    {{-- <link
    rel="stylesheet"
    href="https://unpkg.com/@tailwindcss/typography@0.2.x/dist/typography.min.css"
  /> --}}
</head>

<body>

    <header class="bg-gradient-to-r from-indigo-300 to-purple-400 shadow-lg ">

        <div class="flex items-center">
            
        <div class="max-w-xs  py-6 px-4 sm:px-6 lg:px-8">
            <img class="transform scale-50" src="img/logo.png" />
            
        </div>

        <div class="block">
            <h1 class="text-3xl font-bold text-gray-900">
                Aston Animal Sanctuary
            </h1>
    
            <p>
                Welcome!
            </p>
        </div>

        <!-- Log in & Register buttons -->
        <div class="block absolute top-10 right-10">
            @if (Route::has('login'))
                <div class="ml-4 flex items-center md:ml-6">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="btn">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </div>
    </header>
<article class="prose lg:prose-xl relative py-3 sm:max-w-xl sm:mx-auto ">
   
            <h1>Adopt a pet</p>
        <p> wow here is some text!!1! </p>
        <p> wow here is some more text!!1! </p>
 
    
            </article>

            <article class="prose lg:prose-xl">
                <h1>Garlic bread with cheese: What the science tells us</h1>
                <p>
                  For years parents have espoused the health benefits of eating garlic bread with cheese to their
                  children, with the food earning such an iconic status in our culture that kids will often dress
                  up as warm, cheesy loaf for Halloween.
                </p>
                <p>
                  But a recent study shows that the celebrated appetizer may be linked to a series of rabies cases
                  springing up around the country.
                </p>
                <!-- ... -->
              </article>
    <section class="grid grid-cols-4 gap-8 mt-10 sm:grid-cols-4 lg:grid-cols-12 sm:px-8 xl:px-0">
    <section id="dogs-section" class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-300 sm:rounded-xl">
        <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">Dogs</h2>
    </section>

    <section id="cats-section" class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-300 sm:rounded-xl">
        <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">Cats</h2>
    </section>

    <section id="small-animals-section" class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-300 sm:rounded-xl">
        <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">Small animals</h2>
    </section>
</section>
    <footer class="flex justify-center mt-4 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 sm:text-left">
            <div class="flex items-center">
                {{-- <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>

                    <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                        Shop
                    </a>

                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                        <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>

                    <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                        Sponsor
                    </a> --}}
            </div>
        </div>

        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </footer>
</body>

</html>
