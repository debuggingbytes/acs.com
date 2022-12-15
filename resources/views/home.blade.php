{{--
   ToDo
    Convert inventory images to components
    ToDo
      Make home view extend template
 --}}
<!DOCTYPE html>
<html lang="en" class="scroll-auto md:scroll-smooth">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Used Cranes for Sale | Alberta Crane Service
    </title>
      <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XJCT94S2Z1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'G-XJCT94S2Z1');
    </script>
    {{-- Tailwind CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Google Icons --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-1616.png') }}">
    <link rel="manifest" href="{{asset('site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


  </head>
  <body class="bg-stone-300">

    <header>  
      <nav
        class="bg-gradient-to-b from-slate-900 to-gray-700 px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
          <a href="https://albertacraneservice.com/" class="flex items-center">
            <img src="{{ asset('img/acs-logo-new.png') }}" class="mr-3 h-6 sm:h-16"
              alt="Used Cranes | Alberta Crane Service">
          </a>
          <x-Navigation/>
          
        </div>
      </nav>
  
      <!-- Hero Section -->
      <div class="p-12 relative overflow-hidden bg-no-repeat bg-cover h-screen hero-bg">
        <div
          class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed  transition transform duration-300 ease-in-out hover:backdrop-blur-sm hover:scale-1"
          style="background-color: rgba(0, 0, 0, 0.5);">
          <div class="flex justify-center items-center h-full w-3/4 lg:w-auto lg:px-20 mx-auto gap-10">
            {{-- Call To Action --}}
            <div class="w-full text-center lg:text-start lg:w-1/2">
              <h1
                class="font-bold text-transparent bg-clip-text md:text-4xl 2xl:text-6xl mb-4 text-left uppercase bg-gradient-to-t from-zinc-900 via-neutral-400 to-slate-200 text-2xl drop-shadow-md text-center lg:text-start">
                Used Cranes and Equipment for Sale
                <span class="block text-sm md:text-xl text-white my-4 font-normal">
                  Alberta Crane Service has access to a vast inventory of used equipment and used cranes for sale across
                  Alberta and the global market.
                </span>
              </h1>
              <a class="mt-10 inline-block px-7 py-3 mb-1 border-2 border-gray-200 text-gray-200 font-medium text-sm
                  leading-snug uppercase rounded hover:bg-blue-600 transition duration-1500 ease-in-out
                  " href="{{ route('inventory') }}" role="button" data-mdb-ripple="true" data-mdb-ripple-color="light">View Inventory</a>
            </div>
            {{-- Scrolling Features --}}
            <div class="w-1/3 relative hidden lg:block">
              <div class="slider-main min-w-96 h-full">                   
                <div class="h-72 2xl:h-96 w-full relative overflow-hidden rounded-xl">
                  {{-- start slides --}}                  
                  @foreach ($cranes as $crane)
                  
                    <div class="slide  current">
                      @php
                        $images = json_decode($crane['images']);
                      @endphp
                      <a href='{{ route('crane', ['id' => $crane->id, 'slug' => $crane->slugName]) }}'>
                      <div class="w-full h-full">
                        <img 
                          src="{{ $images['0'] }}" 
                          alt="{{ $crane['year']." ". $crane['subject']}}" 
                          class="object-fit w-full h-full">
                      </div>
                      <div class="absolute bottom-0 left-0 bg-cyan-900/90 w-full text-white h-16">
                        <div class="content text-center p-0.5">
                          <span class="block w-full text-white text-md uppercase font-bold">{{$crane['year']}}</span>
                          <span class="block w-full text-white text-2xl uppercase font-medium drop-shadow-lg">{{$crane['subject']}}</span>  
                        </div>
                      </div>                    
                    </a>
                    </div>
                  @endforeach  
                </div>
               {{-- END OF SLIDE --}}                                    
              </div> {{-- end slider --}}
              <button id="prev" class="hover:drop-shadow-md hover:font-bold hover:opacity-80 px-2 py-2 text-white font-semibold opacity-60 text-center">
                <span class="material-symbols-outlined">arrow_back_ios</span>
              </button>
              <button id="next" class="hover:drop-shadow-md hover:font-bold hover:opacity-80 px-2 py-2 text-white font-semibold opacity-60 text-center">
                <span class="material-symbols-outlined">arrow_forward_ios</span>
              </button>
            </div>
          </div>     
        </div>
      </div>
      <!-- Hero Section -->
    </header>
    <!-- Main content area -->
    <main class="bg-slate-200 min-h-screen">
      <!-- services -->
      <section id="services" class="py-10">
        <div class="md:container md:mx-auto p-4 ">
          <h2 class="text-3xl md:text-3xl text-cyan-800 mt-20 mb-5 font-bold uppercase ">Crane &amp; Equipment Services</h2>
          <p class="mb-4 text-xl font-semibold">Alberta Crane Service Ltd. has a vast inventory of used cranes and heavy equipment for sale, with stock located in the United States, Canada and Europe. </p>
          <p class="mb-10 text-xl font-semibold">Our inventory is always up to date to best serve you with all your used equipment needs.  Our inventory ranges from All Terrain Cranes, truck mounts, carry decks &amp; other various crane parts like counter weights, maxxers, boom &amp; jib attachments.</p>

            <div class="flex flex-wrap gap-5 w-full items-center justify-center py-20">
              
              <x-crane-card crane="All Terrain Cranes"  route="all-terrain-cranes" image="img/all-terrain-crane.png" />
              <x-crane-card crane="Rough Terrain Cranes"  route="rough-terrain-cranes" image="img/rough-terrain-crane.png" />
              <x-crane-card crane="Carry Deck Cranes"  route="carry-deck-cranes" image="img/crane3.png" />
              <x-crane-card crane="Truck Mount Cranes"  route="truck-mounted-telescopic-boom-cranes" image="img/crane4.png" />
              <x-crane-card crane="Boom Truck Cranes"  route="boom-truck-cranes" image="img/boomtruck.png" />
              <x-crane-card crane="Crawler Cranes"  route="crawler-cranes" image="img/crawler-crane.png" />
              <x-crane-card crane="Tower Cranes"  route="tower-cranes" image="img/tower-crane.png" />
              <x-part-card crane="Crane Parts"  route="crane-parts" image="img/crane-parts.png" />
              
            </div>
            
            {{-- Did you know --}}
          <h2 class="text-4xl md:text-4xl text-cyan-800 my-10 font-bold uppercase">Did you know?</h2>
          <p class="text-left md:text-lg my-4 mb-10">
            The cost of a new crane or piece of heavy equipment is significant. The price tag is often out of reach for
            small and
            medium-sized businesses. Buying used cranes, attachments or other equipment can be a great alternative.
            Buying used heavy equipment has several benefits that are worth considering. It provides an opportunity to
            save money, and it also offers the chance to invest in equipment that is generally well maintained. Alberta
            Crane Service has varying stock from Liebherr all-terrain cranes and crawler cranes, Tadano RTs to Grove and
            Linkbelt truck mount cranes.
          </p>


          </div>
        </div>
      </section>
      <!-- end services -->

      {{-- 
        !CALL TO ACTION
      --}}

      <section id="cta" class="bg-gradient-to-b from-transparent to-cyan-700 pt-10 pb-20">
        <div class="min-h-96 md:container md:mx-auto md:p-4">
          {{-- Container for call to action and contact form --}}
          <div class="md:flex items-center justify-between">            
            {{-- Call to Action --}}
            <div class="w-100 text-xl block md:w-1/2 p-5 m-5 items-start h-full text-center">
              <div class="block">
                <p class="uppercase text-xl lg:text-2xl text-white font-bold pb-5 lg:pb-10">
                  <img src="{{ asset('img/acs-logo-new.png') }}" class="mx-auto">
                  {{-- <span class="text-cyan-800 block text-xl lg:text-4xl pb-5 lg:pb-10">Alberta Crane Service</span> --}}
                  also provides a variety of other services to help your business</p>
              </div>
              <h3 class="break-words">
                <span class="block text-xl py-2 md:py-0` md:text-3xl text-white uppercase font-extrabold tracking-widest">
                  <span class="material-symbols-outlined object-cover h-8 w-6 align-middle">
                    check_circle
                  </span>
                  Crane Appraisals</span>
                <span class="block text-xl py-2 md:py-0` md:text-3xl text-white uppercase font-extrabold tracking-widest">
                  <span class="material-symbols-outlined h-8 w-6 align-middle">
                    check_circle
                  </span>
                  Fleet Evaulations
                </span>
                <p class="p-0 py-2 md:py-0 md:p-2 ml-0 m-0 md:ml-8 md:m-2 roboto">
                  Contact our team with your fleets information and have your equipment evaluated today!                
                </p>
              </h3>
            </div>
            {{-- Contact form --}}
            <div class="w-100 md:w-1/2 p-5 m-5 bg-slate-300 rounded-xl ring-1 ring-black drop-shadow-md shadow-sm ">
              <x-forms.contact/>
            </div>
          </div>
        </div>        
      </section>
    </main>
    <!-- end main content -->
    <x-Footer :cranes="$cranes->take(5)"/>
    

    {{-- Laravel JS --}}
    {{-- <script src="{{ mix('/js/app.js') }}"></script> --}}
    {{-- Custom JS --}}
    <script src="{{ asset('/js/scripts.js') }}"></script>
  </body>
</html>