<nav class="fixed top-0 z-50 w-full bg-gray-700 border-b border-gray-700 ">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm  rounded-lg sm:hidden  focus:outline-none focus:ring-2  text-gray-400 hover:bg-gray-700 focus:ring-gray-600">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
           </button>
          <a href="/" class="flex ml-2 md:mr-24">
            {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="SIKP logo" /> --}}
            
            <div class="h-10 mr-3 relative w-10  overflow-hidden bg-gray-100 rounded-sm dark:bg-gray-600">
              <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
            </div>

            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">SIKP</span>
          </a>
        </div>
        <div class="flex items-center">
            <div class="flex items-center ml-3">
              <div>
                <button type="button" class="text-white flex text-sm bg-gray-700 rounded-md focus:bg-gray-600 px-3 py-2 " aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <span class="sr-only">Open user menu</span>
                  {{-- {{ Auth::user()->name }} --}}
                  <i class="fa-solid fa-user me-2 mt-1"></i>
                  <div class="uppercase">{{ Auth::user()->name }}</div>

                  <div class="ml-1 mt-1">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                  </div>
                </button>
              </div>
              <div class="z-50 hidden my-4 text-base list-none  divide-y  rounded shadow bg-gray-800 divide-gray-600" id="dropdown-user">
                
                <ul class="py-3" role="none">
                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" class="mx-8 text-white">
                            @csrf

                            <button :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </button>
                        </form>               
                    </li>  
                </ul>
              </div>
            </div>
          </div>
      </div>
    </div>
  </nav>
  
  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full  border-r  sm:translate-x-0 bg-gray-800 border-gray-600" aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-800">
        <ul class="space-y-2 font-large">
           <li>
              <a href="{{ route('dashboard')}}" class="flex items-center p-2  rounded-lg text-white  hover:bg-gray-600 group">
                <i class="fa-solid fa-chart-pie "></i>
                 <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white ">
                    {{ __('Dashboard') }}
                </x-nav-link>
              </a>
           </li>
           <li>
              <a href="{{  route('pegawai') }}" class="flex items-center p-2  rounded-lg text-white  hover:bg-gray-600 group">
                 <i class="fa-solid fa-user-tie px-0.5"></i>
                 <x-nav-link :href="route('pegawai')" :active="request()->routeIs('pegawai')" class="text-white ">
                    {{ __('Pegawai') }}
                </x-nav-link>
              </a>
           </li>
        </ul>
     </div>
  </aside>

  <div class="p-4 sm:ml-64">

  </div>
  
  
