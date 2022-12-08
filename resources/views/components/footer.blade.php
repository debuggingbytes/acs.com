<footer class="w-full bg-cyan-900 h-auto xl:h-80 text-xl relative">
  <div class="md:container px-5  md:px-0 mx-auto grid grid-rows md:grid-cols-3 pt-5">
    <div class="text-center md:text-start pb-5 md:pb-0">
      <h4 class="text-lg text-white font-medium uppercase tracking-wide border-b-2 inline-block pb-1 mb-3">Misc
        Inventory</h4>
      {{-- <img src="https://www.albertacraneservice.com/files/acs-logo-new.png" class="mr-3 h-6 sm:h-28"
        alt="Used Cranes | Alberta Crane Service"> --}}
      @foreach ($cranes as $crane)
      <div class="block w-full uppercase">
        <a href='{{ route('crane', ['id'=> $crane['id'], 'slug' => $crane['slugName']]) }}' class="text-white
          py-2">{{$crane['year']}} - {{$crane['subject']}}</a>
      </div>
      @endforeach
    </div>
    <div class="text-center md:text-start pb-5 md:pb-0 text-white">
      <h4 class="text-lg text-white font-medium uppercase tracking-wide border-b-2 inline-block w-24 pb-1 mb-3">Sitemap
      </h4>
      <div class="block w-full uppercase">
        <ul>
          <li><a href='{{ route('home') }}'>home</a></li>
          <li><a href='{{ route('inventory') }}'>inventory</a></li>
          <li><a href='{{ route('finance') }}'>financing</a></li>
          <li><a href='{{ route('contact') }}'>contact</a></li>
        </ul>
      </div>
    </div>
    <div class="text-center md:text-start pb-20 md:pb-0">
      <h4 class="text-lg text-white font-medium uppercase tracking-wide border-b-2 inline-block w-24 pb-1 mb-3">Contact
      </h4>
      <div class="block w-full uppercase text-white ">
        <ul>
          <li class="pb-2">
            <span class="material-symbols-outlined leading-8 align-middle mr-5">phone_iphone</span> <a href='tel:780-803-2302'  class="align-middle">780-803-2302</a>
          </li>
          <li class="pb-2">
            <img src="https://www.albertacraneservice.com/files/facebook.png" alt="" class="inline-block mr-3"> <a href='https://www.facebook.com/AlbertaCraneService/' target="_blank"  class="align-middle">Facebook</a>
          </li>
          <li class="pb-2">
            <img src="https://www.albertacraneservice.com/files/twitter.png" alt="" class="inline-block mr-3"> <a href='https://twitter.com/albertacranesrv'  class="align-middle" target="_blank">Twitter</a>
          </li>
          <li class="pb-2">
            <span class="material-symbols-outlined leading-8 align-middle mr-5">mail</span> <a href='mailto:contact@albertacraneservice.com'  class="align-middle">Email</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="absolute bottom-1 left-1/2 -translate-x-1/2 pt-14 lg:pt-0 w-full" >
    <h6 class="block uppercase text-xs text-white text-center w-full">
      <span class="copyright block"></span>
      <span class="block">Website developed and maintained by <a href='https://www.debuggingbytes.com'>DebuggingBytes.com</a></span>
    </h6>
  </div>
</footer>