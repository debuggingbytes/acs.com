<form class="px-2" id="form">
  <div class="formSuccess bg-green-400 rounded-xl p-3 hidden mb-10">
    <h4 class="text-center text-xl uppercase text-white font-semibold">Succcess!</h4>
    <p class="text-center text-lg">We have received your request</p>
  </div>
  <div class="formError bg-red-400 rounded-xl p-3 hidden mb-10">
    <h4 class="text-center text-xl uppercase text-white font-semibold">Error!</h4>
    <p class="text-center text-lg">There was an error processing your request</p>
  </div>
  <div class="relative mb-5">
    <label for="fName" class="block text-black font-extrabold tracking-wide">Full Name: </label>
    <input id="fName" type="text" value="" name="fullName" placeholder="John smith" 
      class="
        block p-3 rounded-lg w-full bg-cyan-800 text-white font-extrabold tracking-wide my-2 shadow-md
        focus:outline-none focus:border-teal-200 focus:ring-2 focus:ring-teal-600 
      
      " required>                                 
  </div>
  <div class="relative mb-5">
    <label for="email" class="block text-black font-extrabold tracking-wide">Email: </label>
    <input id="email" type="text" value="" name="email" placeholder="j.smith@email.com"  required
      class="
        block p-3 rounded-lg w-full bg-cyan-800 text-white font-extrabold tracking-wide my-2 shadow-md
        focus:outline-none focus:border-teal-200 focus:ring-2 focus:ring-teal-600 
      
      ">                                 
  </div>
  <div class="relative mb-5">
    <label for="phone" class="block text-black font-extrabold tracking-wide">Phone: </label>
    <input id="phone" type="tel" value="" name="phone" placeholder="(123) 456 7890" required
      class="
        block p-3 rounded-lg w-full bg-cyan-800 text-white font-extrabold tracking-wide my-2 shadow-md
        focus:outline-none focus:border-teal-200 focus:ring-2 focus:ring-teal-600 
      
      ">                                 
  </div>
  <input type="text" name='address' value='' class="hidden">
  <div class="relative mb-5">
    <label for="comments" class="block text-black font-extrabold tracking-wide">Comments: </label>
    <textarea id="comments" type="text" value="" name="comments" placeholder="John smith"  required
      class="
        block p-3 rounded-lg w-full bg-cyan-800 text-white font-extrabold tracking-extrawide my-2 shadow-md noresize h-32
        focus:outline-none focus:border-teal-200 focus:ring-2 focus:ring-teal-600 
      
      "></textarea>                                
  </div>
  <div class="w-100 flex justify-end items-center transition-all">
    <button id='ctaSubmit' type="submit" class="
    bg-cyan-700 px-4 py-2 me-5 rounded-md text-lg text-white font-bold tracking-wider align-middle 
    transition-all duration-500 ease-in-out overflow-hidden
     hover:shadow-md hover:ring-2 hover:ring-violet-400
    hover:bg-gradient-to-br hover:from-sky-400 hover:via-cyan-800 hover:to-blue-900                  
    ">
      Send <span class="material-symbols-outlined align-middle transition-all duration-1000 delay-150" id="plane">send</span>
    </button>
  </div>
</form>