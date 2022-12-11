<!DOCTYPE html>
<html lang="en" class="scroll-auto md:scroll-smooth">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
      @yield('title')
    </title>
    @yield('meta')
    
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
          <x-Navigation />
        </div>
      </nav>
  
      <!-- Hero Section -->
      <div class="p-12 relative overflow-hidden bg-no-repeat bg-cover @yield('vh')" @yield('hero')>
        <div
          class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed  transition transform duration-300 ease-in-out hover:backdrop-blur-sm hover:scale-1"
          style="background-color: rgba(0, 0, 0, 0.5);">
          <div class="flex justify-center items-center h-full w-3/4 lg:w-auto lg:px-20 mx-auto gap-10">
            {{-- Call To Action --}}
            <div class="w-full text-center">
              @yield('h1-text')
            </div>
          </div>     
        </div>
      </div>
      <!-- Hero Section -->
    </header>
    <!-- Main content area -->
    <main class="bg-slate-200 min-h-screen">
     @yield('content')
    </main>
    <!-- end main content -->
    <x-Footer :cranes="$cranes" />
    <script src="{{ asset('/js/scripts.js') }}"></script>
    @yield('scripts')
  </body>
</html>