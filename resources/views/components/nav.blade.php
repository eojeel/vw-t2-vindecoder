  <nav class="bg-gray-800 text-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a class="text-white no-underline hover:text-white hover:no-underline font-extrabold" href="{{ route('home') }}" wire:navigate>
            <span class="text-2xl pl-2"><i class="em em-grinning"></i>Vintage VW Decoder</span>
        </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
          <li>
            <a class="inline-block  no-underline hover:text-gray-200 hover:text-underline py-2 px-4" aria-current="page" href="{{ route('home') }}" wire:navigate>Home</a>
          </li>
          <li>
            <a class="inline-block  no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="{{ route('latebay') }}" vire:navigate>LateBay</a>
          </li>
          <li>
            <a class="inline-block  no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="{{ route('earlybay') }}">EarlyBay</a>
          </li>
          <li>
            <a class="inline-block  no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="{{ route('home') }}" wire:navigate>Vin List</a>
        </li>
        </ul>
      </div>
    </div>
  </nav>
