@extends('template')

@section('title')
Used Heavy Equipment for Sale | Alberta Crane Service Ltd
@endsection

@section('meta')
  <meta name="title" content="Used Crane Parts for sale | Inventory | Alberta Crane Service Ltd">
  <meta name="keywords" content="Heavy Equipment, Crane, All-Terrain, Truck Mount, Boom Truck, Tadano, Grove, Liebherr, Mannitwoc, GMK, LTM, LR, Hook, Block, Ball, condition, cropac equipment inc, crane network">
  <meta name="description" content="Vast inventory of used cranes, crane parts, equipment and other heavy equipment. Check out our inventory today at Alberta Crane Service">
  <meta name="robots" content="index, follow">
  <meta name="revisit-after" content="2 days">
  <meta name="language" content="English">
@endsection

@section('vh')
vh-50 hero-bg
@endsection
@section('h1-text')
  <h1 class="text-white uppercase font-bold text-2xl lg:text-4xl">Used Heavy Equipment inventory for sale</h1>
@endsection
@section('content')
 
<section id='breadcrumbs' class="p-5">
  <div class="text-start uppercase font-semibold font-xl text-cyan-800"><a href="{{ route('home') }}">Home</a> > <a href="{{ route('heavy-equipment') }}">Heavy Equipment</a></div>
</section>

<section class="py-10">
  <div class="md:container md:mx-auto p-4">
    <div class="grid grid-flow-rows grid-cols-1 lg:grid-cols-3 grid-rows-max gap-5">
      @foreach ($inventory as $nonCrane)
      @php
        $images = json_decode($nonCrane['images']);
      @endphp
      <div class="flex shadow p-2 rounded-xl bg-zinc-50 gap-5 @if ($loop->iteration > 6) fadeIn  @endif" data-category="{{ $nonCrane->category }}">
        <div class="w-3/4 h-40">
          <img src="{{ $images[0] }}" class="object-fill w-full h-full" alt="Used {{ $nonCrane->subject }} for sale">
        </div>
        <div class="flex-rows w-full align-center justify-center relative">
          <div class="w-full text-center uppercase text-cyan-800 font-semibold text-md md:text-md">{{$nonCrane->year}} {{$nonCrane->subject}}</div>
          <div class="w-full text-center uppercase text-cyan-800 font-semibold text-sm">{{$nonCrane->category}}</div>

          <div class="w-full text-center absolute bottom-1 left-1/2 -translate-x-1/2 ">
            <a href="{{ route('heavy-equip-view', ['id' => $nonCrane->id, 'slug' => $nonCrane->slugName]) }}" class="px-3 py-2 bg-cyan-800 rounded-md text-white uppercase font-md transition-all ease-in-out hover:bg-cyan-500">View Equipment</a>
          </div>
        </div>
      </div>

      @endforeach
    </div>
  </div>
</section>

@endsection