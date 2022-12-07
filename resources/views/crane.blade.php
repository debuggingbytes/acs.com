@extends('template')
@php
  $images = json_decode($crane['images'])
@endphp
@section('title')
Used {{$crane['year']}} {{$crane['make']}} {{$crane['model']}} for sale | Alberta Crane Service Ltd
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
      <div class="flex-rows lg:flex pt-12 gap-10 ">
        <div class="w-100 lg:w-1/2 pb-10 lg:pb-0 ">
          <div class="w-full lg:w-1/3 border border-cyan-800 rounded-xl shadow-lg overflow-hidden transition-all duration-500 ease-in-out">
            <img src='{{ $images[0] }}' class="w-full h-full craneImg" alt="{{ $crane->subject }} for sale"/>
          </div>
          <div class="mt-5 h-42 px-1 py-2 relative" id="slider">
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
        <div class="w-100 lg:w-1/2 uppercase text-xl md:text-2xl font-normal">
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
        <div class="rounded-xl">
          {!! $crane['description'] !!}
        </div> 
     </div>
      <div class="flex-rows md:flex w-100 md:justify-between pt-10">
        <div class="uppercase text-xl font-medium text-cyan-800">
          @if (!empty($prev->subject))
            <a href="{{ route('crane', ['id' => $prev->id, 'slug' => $prev->slugName]) }}" class="underline">{{ $prev->subject }}</a>                    
          @else
            {{$prev}}
          @endif
        </div>
        <div class="uppercase text-xl font-medium text-cyan-800">
      
          @if (!empty($next->subject))
            <a href="{{ route('crane', ['id' => $next->id, 'slug' => $next->slugName]) }}" class="underline">{{ $next->subject }}</a>            
          @else
            {{$next}}
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

{{-- @php
  print_r($images)
@endphp --}}