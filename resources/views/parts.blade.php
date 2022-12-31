@extends('template')
@php
  $images = json_decode($crane['images'])
@endphp
@section('title')
Used {{$crane['year']}} {{$crane['subject']}} for sale | Alberta Crane Service Ltd
@endsection

@section('meta')
  <meta name="title" content="Used {{$crane['year']}} {{$crane['subject']}} for sale | Alberta Crane Service Ltd">
  <meta name="keywords" content="{{$crane->year}} {{ $crane->subject }}, {{ $crane->capcity }} ton, {{ $crane->condition }} condition, Crane, All-Terrain, Truck Mount, Boom Truck, Tadano, Grove, Liebherr, Mannitwoc, GMK, LTM, LR, Hook, Block, Ball, cropac equipment inc, crane network">
  <meta name="description" content="{{$crane->year}} {{ $crane->subject }} crane with {{ $crane->capcity }} ton capacity, currently in {{ $crane->condition }} condition for sale">
  <meta name="robots" content="index, follow">
  <meta name="revisit-after" content="2 days">
  <meta name="language" content="English">
   <!-- Social Media tags -->
   <meta property="og:title" content="Used {{$crane['year']}} {{$crane['subject']}} for sale">
   <meta property="og:type" content="website">
   <meta property="og:url" content="{{Request::url()}}">
   <meta property="og:image" content="{{$images[0]}}">
@endsection


@section('vh')
vh-50
@endsection
@section('hero')
  style='background-image: url({{$images[0]}}); background-position: center center; background-size: cover;'
@endsection
@section('h1-text')
  <h1 class="text-white uppercase font-bold text-2xl lg:text-4xl">Used {{$crane['year']}} {{$crane['make']}} {{$crane['model']}} for sale</h1>
@endsection

@section('content')
{{-- <div id='lightbox'>
  <div class="absolute" id='lightbox-modal'>
    <div class="flex justify-center items-center w-full h-full">
      <img src='{{ $images[0] }}' class="w-3/4 modalBox"/>
    </div>
  </div>
</div> --}}
<section id='breadcrumbs' class="p-5">
<div class="text-start uppercase font-semibold font-xl text-cyan-800"><a href="{{ route('home') }}">Home</a> > <a href="{{ route('inventory') }}">Inventory</a> > <a href="{{ route('category', ['slug' => Str::kebab(Str::remove(['(',')'], $crane->category))]) }}">{{ $crane['category'] }}</a> > <a href="">{{$crane['subject']}}</a></div>
</section>
<section class="py-10">
  <div class="md:container md:mx-auto p-4 ">
    <div class="p-2">
      <h2 class="uppercase text-cyan-800 text-2xl lg:text-4xl font-bold">Used {{ $crane['year'] }} {{ $crane['subject'] }} for sale</h2>
      <p class="font-medium text-xl pt-5">Alberta Crane Service Ltd is proud to present the {{$crane->year}} {{ $crane->subject}} for sale. This equipment is currently listed in {{ $crane->condition }} condition. The {{$crane->year}} {{ $crane->subject }} is classified as a {{ $crane->category }}. 
      @if (!empty($crane->boom))
      This {{ $crane->make }} comes with {{$crane->boom}}' of boom 
        @if (!empty($crane->jib))
        , and {{$crane->jib}}' of jib.
        @else
          .
        @endif 
      @endif
    </p>
    
      <div class="flex-rows lg:flex pt-12 gap-5">
        <div class="w-100 lg:w-1/2 pb-10 lg:pb-0 relative rounded-xl p-5 bg-neutral-100 shadow-lg">
          <div class="w-full p-2 overflow-hidden transition-all duration-500 ease-in-out">
            <img src='{{ $images[0] }}' class="w-full h-full craneImg" alt="{{ $crane->subject }} for sale"/>
          </div>
          <div class="mt-5 h-42 px-1 py-2 relative " id="slider">
            <div class="flex gap-2 overflow-hidden">
            @foreach ($images as $image)
              <img src='{{ $image }}' class='w-32 h-32 craneThumb cursor-pointer @if ($loop->first) active @endif' alt="{{ $crane->subject }} for sale"/>
            @endforeach
          </div>
            <button id="prevCrane" class="hover:drop-shadow-md hover:font-bold hover:opacity-80 text-black font-semibold bg-white/80 rounded-xl px-2 py-1.5">
              <span class="material-symbols-outlined">arrow_back_ios</span>
            </button>
            <button id="nextCrane" class="hover:drop-shadow-md hover:font-bold hover:opacity-80 text-black font-semibold bg-white/80 rounded-xl px-2 py-1.5">
              <span class="material-symbols-outlined">arrow_forward_ios</span>
            </button>
          </div>
          <div class="uppercase text-center pb-10 lg:pb-0 hidden md:block">
            <p class="block">Use the arrow keys for easier scrolling</p>
            Current Image <span id="curImg"></span> of <span id="imgTotal"></span>
          </div>
        </div>
        <div class="w-100 lg:w-1/2 uppercase text-xl md:text-2xl font-normal bg-neutral-100 rounded-xl shadow-lg p-5">
          <div class="block border-slate-800 pb-2 border-b-2 mb-3">
            <span class="inline-block w-40">manufacture</span> 
            <span class="inline-block ml-2 md:ml-12 font-semibold">{{ $crane['make'] }}</span>
          </div>
          <div class="block border-slate-800 pb-2 border-b-2 mb-3">
            <span class="inline-block w-40">Model</span> 
            <span class="inline-block ml-2 md:ml-12 font-semibold">{{ $crane['model'] }}</span>
          </div>
          <div class="block border-slate-800 pb-2 border-b-2 mb-3">
            <span class="inline-block w-40">Year</span> 
            <span class="inline-block ml-2 md:ml-12 font-semibold">{{ $crane['year'] }}</span>
          </div>
          <div class="block border-slate-800 pb-2 border-b-2 mb-3">
            <span class="inline-block w-40">Hours</span> 
            <span class="inline-block ml-2 md:ml-12 font-semibold">{{ $crane['hours'] ? $crane['hours'] : "contact" }}</span>
          </div>
          <div class="block border-slate-800 pb-2 border-b-2 mb-3">
            <span class="inline-block w-40">Condition</span> 
            <span class="inline-block ml-2 md:ml-12 font-semibold">{{ $crane['condition'] }}</span>
          </div>
          <div class="block border-slate-800 pb-2 border-b-2 mb-3">
            <span class="inline-block w-40">capacity</span> 
            <span class="inline-block ml-2 md:ml-12 font-semibold">{{ $crane['capacity'] }}</span>
          </div>
          <div class="block border-slate-800 pb-2 border-b-2 mb-3">
            <span class="inline-block w-40">Boom</span> 
            <span class="inline-block ml-2 md:ml-12 font-semibold">{{ $crane['boom'] }}'</span>
          </div>
          <div class="block border-slate-800 pb-2 border-b-2 mb-3">
            <span class="inline-block w-40">Jib</span> 
            <span class="inline-block ml-2 md:ml-12 font-semibold">{{ $crane['jib'] }}'</span>
          </div>
          <div class="block border-slate-800 pb-2 border-b-2 mb-3">
            <span class="inline-block w-40">category</span> 
            <span class="inline-block ml-2 md:ml-12 font-semibold">{{ $crane['category'] }}</span>
          </div>
        </div>
      </div>
      <div class="text-center">
        <h4 class="uppercase text-cyan-800 text-2xl font-semibold py-10">Additional Information</h4>
        <div class="rounded-xl w-2/3 mx-auto overflow-hidden">
          {!! $crane->clean_description !!}
          
        </div> 
     </div>
      <div class="flex-rows md:flex w-100 md:justify-between pt-10">
        <div class="uppercase text-xl font-medium text-cyan-800">
          @if (!empty($prev->subject))
            <a href="{{ route('parts', ['id' => $prev->id, 'slug' => $prev->slugName]) }}" class="underline">{{ $prev->subject }}</a>                    
          @else
            {{$prev}}
          @endif
        </div>
        <div class="uppercase text-xl font-medium text-cyan-800">
      
          @if (!empty($next->subject))
            <a href="{{ route('parts', ['id' => $next->id, 'slug' => $next->slugName]) }}" class="underline">{{ $next->subject }}</a>            
          @else
            {{$next}}
          @endif
        </div>

      </div>
    </div>
  </div>
  <div class="w-3/4 mx-auto mt-10">
    <p class="pt-5 text-xl font-medium">
      <x-about-us/>
    </p>
  </div>
</section>
@endsection

{{-- @php
  print_r($images)
@endphp --}}