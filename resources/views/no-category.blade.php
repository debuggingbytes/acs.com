{{-- 
  
  ToDo: Hide all images which are not filtered by data-type
  
  --}}


  @extends('template')

  @section('title')
  Used {{$inventory}} for Sale | Alberta Crane Service Ltd
  @endsection
  
  @section('vh')
  vh-50 hero-bg
  @endsection
  @section('h1-text')
    <h1 class="text-white uppercase font-bold text-2xl lg:text-4xl">Used {{$inventory}} inventory for sale</h1>
  @endsection
  @section('content')
   
  <section id='breadcrumbs' class="p-5">
    <div class="text-start uppercase font-semibold font-xl text-cyan-800"><a href="{{ route('home') }}">Home</a> > <a href="{{ route('inventory') }}">Inventory</a> > <a href="{{ route('category', ['slug' => Str::kebab($inventory)]) }}">{{$inventory}}</a></div>
  </section>
  
  <section class="py-10">
    <div class="md:container md:mx-auto p-4">
      <div class="flex justify-center items-center vh-50 bg-neutral-50 rounded-xl shadow">
        <div class="bg-gradient-to-b from:cyan-600">
          <img src="{{ asset('img/acs-logo-new.png') }}" class="mx-auto w-1/2"  alt="Used Cranes | Alberta Crane Service">
          <h2 class="uppercase text-2xl text-cyan-800">Sorry, There was no results found for {{ $inventory }}</h2>
          <div class="text-center pt-10">
            <span class='block text-cyan-800 text-lg'>How about a</span> <a href="{{ route('crane', ['id'=>$randomCrane->id, 'slug' => $randomCrane->slugName]) }}" class="uppercase text-xl font-medium text-cyan-900">{{$randomCrane->subject}}?</a>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  
  @endsection