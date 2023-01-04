<div class="flex flex-col shadow rounded-xl bg-zinc-50 gap-5 overflow-hidden @if ($loop > 6) fadeIn  @endif crane-details" data-category="{{ $category }}">
  <div class="w-100 h-60 relative">
    <div class="crane__details w-100 font-bold text-lg text-white uppercase text-center">
      <h3 >{{$year}} {{$subject}}</h3>
      <ul>
        @if($capacity)<li>{{$capacity}} Tons capacity</li>@endif
        <li>{{$condition}} condition</li>
        <li>{{count($images)}} total images</li>
      </ul>
    </div>
    <img src="{{ $images[0] }}" class="object-cover w-full h-full" alt="Used {{ $subject }} for sale">
  </div>
  <div class="flex-rows w-full align-center justify-center relative">
    <div class="w-full text-center uppercase text-cyan-800 font-semibold text-md">{{$year}} {{$subject}}</div>
    @if($capacity) <div class="w-full text-center uppercase text-cyan-800 font-semibold text-md">{{$capacity}}T</div> @endif
    <div class="w-full text-center uppercase text-cyan-800 font-semibold text-xs">{{$category}}</div>

    <div class="w-full text-center pt-10 pb-5">
      <a href="{{ route($route, ['id' => $id, 'slug' => $slug]) }}" class="px-3 py-2 bg-cyan-800 rounded-md text-white uppercase font-md transition-all ease-in-out hover:bg-cyan-500">View Equipment</a>
    </div>
  </div>
</div>