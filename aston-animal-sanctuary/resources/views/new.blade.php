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

    
        /* .gradient {
          background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
        } */
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
    {{-- <link
    rel="stylesheet"
    href="https://unpkg.com/@tailwindcss/typography@0.2.x/dist/typography.min.css"
  /> --}}
</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">


    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white bg-black">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">

            <div class="pl-4 flex flex-row items-center">
            
                <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                    href="#">
                    
                    <img class="absolute left-20 top-3 invisible md:visible lg:visible" src="img/logo-small.png" />
                    
                    <p class="visible md:hidden">&nbsp&nbspASTON ANIMAL SANCTUARY</p>
                </a>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle"
                    class="flex items-center p-1 text-white hover:text-gray-100 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
                id="nav-content">
                @if (Route::has('login'))
                {{-- <div class="ml-4 flex items-center md:ml-6"> --}}
                    @auth
                    <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    
                      <li class="mr-3">
                       
                            <a class="inline-block text-white no-underline font-bold rounded-full hover:text-underline py-2 px-4 focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                              href="{{  url('/dashboard') }}" type="button">Dashboard</a>
                      </li>
                    @else
                    <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    
                      <li class="mr-3">
                          <a class="inline-block text-white no-underline font-bold rounded-full hover:text-underline py-2 px-4 focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                              href="{{ route('login') }}" type="button">Log in</a>
                      </li>
                      @if (Route::has('register'))
                      <li class="mr-3">
                        <a class="inline-block text-white no-underline font-bold rounded-full hover:text-underline py-2 px-4 focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                            href="{{ route('register') }}" type="button">Register</a>
                    </li>
                    @endif
                      
                  </ul>
                 
                  @endauth
                {{-- </div> --}}
            @endif
                
            </div>
        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>

    <!--Hero-->
    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                <h1 class="my-4 text-5xl font-bold leading-tight">
                    Welcome to <br /><b>Aston Animal Sanctuary!</b>
                </h1>
                <p class="leading-normal text-2xl mb-8">
                    Thinking about adopting a new furry friend? <br />Check out our pets below!
                </p>
                {{-- <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          Subscribe
        </button> --}}
            </div>
            <!--Right Col-->
            <div class="w-full md:w-3/5 py-6 text-center">
                {{-- SVG from https://undraw.co/ --}}
                <svg id="ba852881-1fdd-4058-baca-f1caa98e12dd" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="811.89649" height="549" viewBox="0 0 811.89649 549"><path d="M194.05176,402.04562c0-67.16541,54.44832-226.54562,121.61373-226.54562S437.27923,334.88021,437.27923,402.04562a121.61374,121.61374,0,0,1-243.22747,0Z" transform="translate(-194.05176 -175.5)" fill="#63ff98"/><path d="M315.66545,697.918a1,1,0,0,1-1-1V277.63379a1,1,0,0,1,2,0V696.918A1,1,0,0,1,315.66545,697.918Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M315.66545,358.57959a.99683.99683,0,0,1-.70715-.293l-48.13452-48.13428a1,1,0,1,1,1.4143-1.41406l48.13453,48.13428a1,1,0,0,1-.70716,1.707Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M315.66545,441.90967a1,1,0,0,1-.70715-1.707l80.61-80.61035a1,1,0,1,1,1.41431,1.41406l-80.61,80.61035A.99708.99708,0,0,1,315.66545,441.90967Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M243.31913,724.11381c.17385.13427.35658.25485.53221.38619H392.94449c2.92142-11.83653,3.953-23.68571-.41069-33.97582-6.21717-14.66282-24.61809-23.81571-39.24692-17.51888a22.33763,22.33763,0,0,0-8.77358,6.94176c-5.71689-10.23335-15.9718-17.949-27.80872-17.94055-14.82975.01059-27.15985,12.13812-31.18341,26.14659-6.47972-10.937-19.27818-18.58032-31.78747-15.29233C232.81053,678.36005,226.20174,710.88481,243.31913,724.11381Z" transform="translate(-194.05176 -175.5)" fill="#f2f2f2"/><path d="M831.05176,492.791C831.05176,444.52731,870.20367,330,918.5,330s87.44824,114.52731,87.44824,162.791a87.44826,87.44826,0,0,1-174.89648,0Z" transform="translate(-194.05176 -175.5)" fill="#e6e6e6"/><path d="M918.5,705.3987a.71879.71879,0,0,1-.71906-.71857V403.39122a.71907.71907,0,0,1,1.43813,0V704.68013A.7188.7188,0,0,1,918.5,705.3987Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M918.5,461.55719a.717.717,0,0,1-.50849-.21052l-34.61187-34.58829a.71881.71881,0,1,1,1.017-1.01612l34.61187,34.58829a.71858.71858,0,0,1-.50849,1.22664Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M918.5,521.43646a.71859.71859,0,0,1-.50849-1.22664l57.96386-57.92493a.71881.71881,0,0,1,1.017,1.01612l-57.96386,57.92492A.71718.71718,0,0,1,918.5,521.43646Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M866.47822,724.22249c.125.09649.25641.18314.3827.27751H974.06866c2.10069-8.50549,2.84249-17.02006-.29532-24.41432-4.47055-10.5364-17.702-17.11348-28.2211-12.5887a16.0604,16.0604,0,0,0-6.30878,4.9882c-4.11081-7.35347-11.48476-12.89776-19.99629-12.89171-10.66356.00761-19.52971,8.72221-22.42291,18.7884-4.65935-7.85912-13.86228-13.35143-22.85727-10.98875C858.92185,691.34479,854.1697,714.71641,866.47822,724.22249Z" transform="translate(-194.05176 -175.5)" fill="#f2f2f2"/><path d="M616.55812,521.18894c7.37864,14.59866-.331,35.16665-16.446,39.78467-4.53267,1.29891-9.66887,1.1628-13.66041-1.57486-3.29534-2.26017-5.67343-6.25671-5.3598-10.32521.60354-7.8292,10.57271-10.73863,16.92043-8.21147,8.595,3.42185,12.44416,13.50484,13.64635,21.97006,1.46978,10.34937-.54869,21.04207-4.59267,30.60406-8.09568,19.14225-24.11968,34.05632-40.00464,46.85868a253.09756,253.09756,0,0,1-53.17955,32.8793q-3.58248,1.64424-7.21487,3.17585a1.51056,1.51056,0,0,0-.53813,2.05229,1.53833,1.53833,0,0,0,2.05229.53812,256.43884,256.43884,0,0,0,58.43079-34.4798c17.29144-13.57006,34.74077-29.5872,43.36529-50.27016,4.29937-10.31054,6.23475-21.69844,4.47685-32.79584-1.47988-9.34231-6.12653-19.67939-15.49979-23.36973-7.39465-2.91135-17.70165.15693-20.32937,8.18918-1.44464,4.4159.05093,9.19188,2.91051,12.684a16.66325,16.66325,0,0,0,12.701,5.87348c9.6434.20028,18.46811-5.98783,23.31173-14.01829a33.31985,33.31985,0,0,0,3.8627-25.146,29.53071,29.53071,0,0,0-2.26231-5.93245c-.87108-1.72343-3.46009-.2065-2.59042,1.51415Z" transform="translate(-194.05176 -175.5)" fill="#ccc"/><polygon points="588.623 527.306 577.842 531.111 558.035 491.341 573.946 485.725 588.623 527.306" fill="#a0616a"/><path d="M765.184,704.49437h22.04781a0,0,0,0,1,0,0v13.88195a0,0,0,0,1,0,0H751.302a0,0,0,0,1,0,0v0A13.88193,13.88193,0,0,1,765.184,704.49437Z" transform="translate(-386.98543 121.10781) rotate(-19.44132)" fill="#2f2e41"/><polygon points="471.562 537.833 460.13 537.832 454.693 493.736 471.566 493.737 471.562 537.833" fill="#a0616a"/><path d="M451.96353,534.5653h22.04781a0,0,0,0,1,0,0v13.88195a0,0,0,0,1,0,0H438.0816a0,0,0,0,1,0,0v0A13.88193,13.88193,0,0,1,451.96353,534.5653Z" fill="#2f2e41"/><path d="M664.55535,700.38428a4.55073,4.55073,0,0,1-1.1189-.14063l-16.86035-4.27441a4.49238,4.49238,0,0,1-3.38111-4.70606l16.11182-210.25146.49854.03808-.49854-.03808A18.052,18.052,0,0,1,676.33,464.40234l50.95508-2.64453,8.56763,131.94531,50.8164,91.51954a4.49971,4.49971,0,0,1-2.41455,6.41992L760.84783,700.042a4.47505,4.47505,0,0,1-5.60547-2.34912l-59.75806-129.415a1.50012,1.50012,0,0,0-2.83691.356L668.96745,696.69971a4.50785,4.50785,0,0,1-4.4121,3.68457Z" transform="translate(-194.05176 -175.5)" fill="#2f2e41"/><path d="M608.64471,513.69564a9.37694,9.37694,0,0,1,13.77666-4.11629l17.75488-11.9968,9.922,9.01148L624.787,523.18367a9.42779,9.42779,0,0,1-16.14224-9.488Z" transform="translate(-194.05176 -175.5)" fill="#a0616a"/><circle cx="511.11617" cy="181.59655" r="24.56103" fill="#a0616a"/><path d="M671.74919,469.95117a9.3262,9.3262,0,0,1-9.14843-11.04053l4.28735-22.91455c-4.57617-16.61523,18.73266-31.26367,19.72925-31.88086l14.54223-5.57666.17871.4668-.17871-.4668A17.72316,17.72316,0,0,1,725.20915,415.71l-1.76294,50.39111L672.464,469.92432C672.225,469.94238,671.98625,469.95117,671.74919,469.95117Z" transform="translate(-194.05176 -175.5)" fill="#63ff98"/><path d="M693.027,627.07568a246.89745,246.89745,0,0,1-33.45043-2.67431l-.46875-.07325.04834-.47167c.88159-8.60743,21.64746-210.958,26.14086-225.22168,1.16114-3.686,4.77271-6.583,10.73462-8.60987,18.73926-6.36963,39.78687,3.07617,47.91724,21.50586a51.17457,51.17457,0,0,1,4.31323,21.59522l-3.77978,178.1372-.39868.0752c-.10425.02-10.572,2.06592-24.39185,10.99658C714.06853,625.96875,703.63933,627.07568,693.027,627.07568Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M721.06286,433.21754c12.99227,22.057,6.437,33.80227-5.85366,56.31056-6.81719,12.48458-27.851,27.92506-37.70318,18s-2.06577-23.4184,2.21274-37.12243,13.48092-24.98787,23.08778-35.18194C709.65576,427.95583,723.79778,433.92263,721.06286,433.21754Z" transform="translate(-194.05176 -175.5)" opacity="0.05098"/><path d="M636.58293,519.52051a4.50547,4.50547,0,0,1-4.34741-3.33887l-3.11841-11.66016a4.52085,4.52085,0,0,1,1.72876-4.82226l50.48633-36.12207,6.80347-38.64356a19.09914,19.09914,0,1,1,36.73633,9.90088l-14.37964,39.123a31.65664,31.65664,0,0,1-15.83594,17.57471l-56.09155,27.52636A4.49373,4.49373,0,0,1,636.58293,519.52051Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M694.79705,347.77246a10.99687,10.99687,0,0,1-20.63146-7.12662,24.535,24.535,0,0,1,45.514-6.68573c7.7728-5.43545,19.97412-2.69,24.6695,5.551s.83626,20.13708-7.80266,24.05237c-4.29906,1.9484-3.97917,9.47119.46977,11.0476a7.59008,7.59008,0,0,1-.07737,14.33542c-5.59766,1.9157-11.30288,3.85151-17.21738,4.00114s-12.17978-1.76391-15.91264-6.35407-3.99287-12.124.41062-16.07538a14.098,14.098,0,0,0,2.85879-16.7518C704.1402,348.40644,696.27917,344.74738,694.79705,347.77246Z" transform="translate(-194.05176 -175.5)" fill="#2f2e41"/><path d="M536.17107,719.17041a6.49765,6.49765,0,0,1-5.59766-9.78369v-.00049l9.09717-15.53174,11.21753,6.57031L541.79094,715.957A6.50448,6.50448,0,0,1,536.17107,719.17041Z" transform="translate(-194.05176 -175.5)" fill="#63ff98"/><circle cx="377.81845" cy="500.1724" r="8" fill="#63ff98"/><path d="M500.97307,719.17041a6.49768,6.49768,0,0,1-5.59766-9.78418l9.09717-15.53174,11.21729,6.57031L506.5927,715.957A6.50514,6.50514,0,0,1,500.97307,719.17041Z" transform="translate(-194.05176 -175.5)" fill="#63ff98"/><path d="M553.35027,708.78906H513.04119a20.71429,20.71429,0,0,1-20.69092-20.69092v-6.12353a7.19375,7.19375,0,0,1,7.1853-7.18555h53.8147a17,17,0,0,1,0,34Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M551.44011,724.46a6.50736,6.50736,0,0,1-6.5-6.5v-18h13v18A6.50736,6.50736,0,0,1,551.44011,724.46Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M513.7177,724.46a6.50736,6.50736,0,0,1-6.5-6.5v-18h13v18A6.50736,6.50736,0,0,1,513.7177,724.46Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M504.7177,650.4209h-16v-21a8,8,0,0,1,16,0Z" transform="translate(-194.05176 -175.5)" fill="#63ff98"/><path d="M503.44914,680.17236H476.9865a5.7753,5.7753,0,0,1-5.7688-5.76855V660.543a18.3915,18.3915,0,0,1,18.3706-18.37061H493.81a15.42532,15.42532,0,0,1,15.40772,15.40772v16.82373A5.7751,5.7751,0,0,1,503.44914,680.17236Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M504.7177,650.4209h-11v-23.5a5.5,5.5,0,0,1,11,0Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><path d="M501.976,680h-29a8,8,0,0,1,0-16h29Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/><ellipse cx="271.67353" cy="496.35583" rx="1.875" ry="3.375" fill="#63ff98"/><path d="M824.44844,724.5h-381a1,1,0,0,1,0-2h381a1,1,0,1,1,0,2Z" transform="translate(-194.05176 -175.5)" fill="#3f3d56"/></svg>
            </div>
        </div>
    </div>

    <section class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
          <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Our animals
          </h1>
          <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
              <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                
                <div class="w-full font-bold text-4xl text-gray-800 px-6">
                 Cats
                 
                </div>
                <img class="transform scale-75" src="img/cedric-vt-IuJc2qh2TcA-unsplash.jpg" />
              </a>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="flex items-center justify-start">
                <button class="mx-auto lg:mx-0 hover:underline bg-black text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Action
                </button>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
              <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                
                <div class="w-full font-bold text-4xl text-gray-800 px-6">
                  Dogs
                </div>
                <img class="transform scale-75" src="img/sergey-semin-VQPD1fc_Y8g-unsplash.jpg" />
              </a>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="flex items-center justify-center">
                <button class="mx-auto lg:mx-0 hover:underline bg-black text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Action
                </button>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink ">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow ">
              <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                
                <div class="w-full font-bold text-4xl text-gray-800 px-6">
                  Small animals
                  
                </div>
                <img class="transform scale-75" src="img/silje-roseneng-cMp84C0fPSg-unsplash.jpg" />
              </a>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="flex items-center justify-end">
                <button class="mx-auto lg:mx-0 hover:underline bg-black text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Action
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>


    {{-- <section class="bg-white border-b py-8 ">
        <div class="container max-w-5xl mx-auto m-8 ">
          <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Our animals
          </h1>
          <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <div class="flex flex-wrap content-center ">
            <div class="w-5/6 sm:w-1/2 p-6 ">
              <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                Cats
              </h3>
              <p class="text-gray-600 mb-8">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
                <br />
                <br />
  
                Images from:
  
                <a class="text-pink-500 underline" href="https://undraw.co/">undraw.co</a>
              </p>
            </div>
            <div class="w-full sm:w-1/2 p-6">
                <img class="transform scale-75" src="img/cedric-vt-IuJc2qh2TcA-unsplash.jpg" />
            </div>
          </div>
          <div class="flex flex-wrap flex-col-reverse sm:flex-row">
            <div class="w-full sm:w-1/2 p-6 mt-6">
              
              <img class="transform scale-75" src="img/sergey-semin-VQPD1fc_Y8g-unsplash.jpg" />
            </div>
            <div class="w-full sm:w-1/2 p-6 mt-6">
              <div class="align-middle">
                <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                  Dogs
                </h3>
                <p class="text-gray-600 mb-8">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
                  <br />
                  <br />
                  Images from:
  
                  <a class="text-pink-500 underline" href="https://undraw.co/">undraw.co</a>
                </p>
              </div>
            </div>
          </div>
          <div class="flex flex-wrap">
            <div class="w-5/6 sm:w-1/2 p-6">
              <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                Small animals
              </h3>
              <p class="text-gray-600 mb-8">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
                <br />
                <br />
  
                Images from:
  
                <a class="text-pink-500 underline" href="https://undraw.co/">undraw.co</a>
              </p>
            </div>
            <div class="w-full sm:w-1/2 p-6">
                <img class="transform scale-75" src="img/silje-roseneng-cMp84C0fPSg-unsplash.jpg" />
            </div>
          </div>
        </div>
        
      </section> --}}

    {{-- <section class="bg-white border-b py-8 w-full text-black prose lg:prose-xl">
        <div class="container max-w-5xl mx-auto m-8">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">My First Bootstrap Page
            </h1>
            <p class="text-3xl text-gray-800 font-bold leading-none mb-3">This is some text.</p>
            <h1>Non quaeritur autem quid naturae tuae consentaneum sit, sed quid disciplinae.</h1>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Utrum igitur tibi litteram videor an totas
                paginas commovere? Sed eum qui audiebant, quoad poterant, defendebant sententiam suam. Sic enim censent,
                oportunitatis esse beate vivere. Facile est hoc cernere in primis puerorum aetatulis. </p>

            <ol>
                <li>Id et fieri posse et saepe esse factum et ad voluptates percipiendas maxime pertinere.</li>
                <li>Quod si ita se habeat, non possit beatam praestare vitam sapientia.</li>
                <li>Verum hoc idem saepe faciamus.</li>
                <li>Potius inflammat, ut coercendi magis quam dedocendi esse videantur.</li>
            </ol>

            <p>Addidisti ad extremum etiam indoctum fuisse. Sine ea igitur iucunde negat posse se vivere? Nulla profecto
                est, quin suam vim retineat a primo ad extremum. <b>Eadem fortitudinis ratio reperietur.</b> Cave putes
                quicquam esse verius. At miser, si in flagitiosa et vitiosa vita afflueret voluptatibus. Et quod est
                munus, quod opus sapientiae? <b>Illi enim inter se dissentiunt.</b> </p>

            <ul>
                <li>Quod quidem iam fit etiam in Academia.</li>
                <li>Animum autem reliquis rebus ita perfecit, ut corpus;</li>
                <li>Num igitur dubium est, quin, si in re ipsa nihil peccatur a superioribus, verbis illi commodius
                    utantur?</li>
            </ul>

            <blockquote cite="http://loripsum.net">
                Amicitiae vero locus ubi esse potest aut quis amicus esse cuiquam, quem non ipsum amet propter ipsum?
            </blockquote>

            <p>Duo Reges: constructio interrete. Verum tamen cum de rebus grandioribus dicas, ipsae res verba rapiunt;
                Sed fortuna fortis; Innumerabilia dici possunt in hanc sententiam, sed non necesse est. Quod equidem non
                reprehendo; <mark>Utilitatis causa amicitia est quaesita.</mark> </p>

        </div>
    </section> --}}

</body>

</html>
