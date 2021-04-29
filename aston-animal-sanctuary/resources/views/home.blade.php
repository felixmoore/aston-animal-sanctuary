<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Aston Animal Sanctuary') }}</title>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

      <!-- Styles & Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <style>
          /* https://uigradients.com/#Hydrogen */
          body {
              background: #667db6;
              /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
              /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);
              /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
          }
      </style>
  </head>

  <body class="leading-normal tracking-normal gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    @include('layouts.navigation')

    <!--Hero-->
    <div class="pt-24 text-white">
      
        {{-- <div class="m-auto"> --}}
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <div class="flex flex-col w-full justify-center text-center">
                <h1 class="my-4 text-6xl font-bold leading-tight">
                    Welcome to<br/><b>Aston Animal Sanctuary!</b>
                </h1>
                <br/>
                <br/>
            </div>
          </div>
    </div>
    <div class="mx-auto max-w-6xl bg-white py-20 px-12 lg:px-24 shadow-xl mb-24">

      <div class="mb-12">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
          Our animals
        </h1>
        <p class="tracking-wide text-xl mb-6 leading-relaxed mx-auto max-w-xl text-center">
          Thinking about adopting a new furry friend?
          <br class="hidden md:block" />Check out our pets below!</p>

          </div>

          {{-- Adapted from template https://templates.digizu.co.uk/layouts/blocks.html --}}
      <div class="flex flex-wrap -mx-2">
        <div class="w-1/2 p-2">
          <a href="{{ route('animals.index') }}" class="block mb-8 bg-black hover:bg-gray-700">
            <img src="img/alexis-chloe-dD75iU5UAU4-unsplash.jpg" class="w-full h-auto opacity-75" />
          </a>
          <a href="{{ route('animals.index') }}" class="block text-xl text-center">All animals</a>
        </div>

        <div class="w-1/2 p-2">
          <a href="{{ route('animals.filter', ['species' => 'Cat']) }}" class="block mb-8 bg-black hover:bg-gray-700">
            <img src="img/cedric-vt-IuJc2qh2TcA-unsplash.jpg" class="w-full h-auto opacity-75" />
          </a>
          <a href="{{ route('animals.filter', ['species' => 'Cat']) }}" class="block text-xl text-center">Cats</a>
        </div>
        
        <div class="w-1/2 p-2">
          <a href="{{ route('animals.filter', ['species' => 'Dog']) }}" class="block mb-8 bg-black hover:bg-gray-700">
            <img src="img/sergey-semin-VQPD1fc_Y8g-unsplash.jpg" class="w-full h-auto opacity-75" />
          </a>
          <a href="{{ route('animals.filter', ['species' => 'Dog']) }}" class="block text-xl text-center">Dogs</a>
        </div>
        
        <div class="w-1/2 p-2">
          <a href="{{ route('animals.filter', ['species' => 'Small animal']) }}" class="block mb-8 bg-black hover:bg-gray-700">
            <img src="img/silje-roseneng-cMp84C0fPSg-unsplash.jpg" class="w-full h-auto opacity-75" />
          </a>
          <a href="{{ route('animals.filter', ['species' => 'Small animal']) }}" class="block text-xl text-center">Small animals</a>
        </div>
        

      </div>


    </div>


    <footer class="-mx-6 bg-white px-9 py-12">
        
        <div class="mx-auto container text-gray-800 text-sm flex justify-between">
          <span>Aston Animal Sanctuary</a></span>
          <span>&copy; 2021</span>
        </div>

      </footer>

  </body>

</html>
