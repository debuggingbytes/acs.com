{{-- 
  
  ToDo: Hide all images which are not filtered by data-type
  
  --}}


@extends('template')

@section('title')
Used Crane Inventory for Sale | Alberta Crane Service Ltd
@endsection

@section('vh')
vh-50 hero-bg
@endsection
@section('h1-text')
  <h1 class="text-white uppercase font-bold text-2xl lg:text-4xl">Used Crane inventory for sale</h1>
@endsection
@section('content')
 
<section id='breadcrumbs' class="p-5">
  <div class="text-start uppercase font-semibold font-xl text-cyan-800"><a href="{{ route('home') }}">Home</a> > <a href="{{ route('inventory') }}">Inventory</a></div>
</section>

<section class="py-10">
  <div class="md:container md:mx-auto p-4">
    <div class="grid grid-flow-rows grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 grid-rows-max gap-5 p-2">
      @foreach ($inventory as $crane)
        @php
          $images = json_decode($crane['images']);
        @endphp    
        <x-inventory-card 
          :loop="$loop->iteration"
          :category="$crane->category"
          :year="$crane->year"
          :subject="$crane->subject"
          :capacity="$crane->capacity"
          :condition="$crane->condition"
          :images="$images"
          :id="$crane->id"
          :slug="$crane->slugName"
          route="crane"
        />
      @endforeach
      
      @foreach ($parts as $part)
      @php
        $images = json_decode($part['images'], true);
      @endphp    
       
      {{-- {{$part->images}} --}}
      <x-inventory-card 
          :loop="$loop->iteration"
          :category="$part->category"
          :year="$part->year"
          :subject="$part->subject"
          :capacity="$part->capacity"
          :condition="$part->condition"
          :images="$images"
          :id="$part->id"
          :slug="$part->slugName"
          route="parts"
        />

      @endforeach

      {{-- Heavy Equipment (Non Cranes) --}}
      @foreach ($nonCrane as $nc)
        @php
          $images = json_decode($nc['images']);
        @endphp

        <x-inventory-card 
        :loop="$loop->iteration"
        :category="$nc->category"
        :year="$nc->year"
        :subject="$nc->subject"
        :capacity="$nc->capacity"
        :condition="$nc->condition"
        :images="$images"
        :id="$nc->id"
        :slug="$nc->slugName"
        route="heavy-equip-view"
      />
      @endforeach
    </div>
  </div>
</section>

@endsection