




<nav class="fixed z-50 border-gray-200 bg-gray-900  w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="/" class="flex items-center">
          <img src="https://pbs.twimg.com/profile_images/1625822397097037826/qJTjFNXS_400x400.jpg" class="h-12 w-12 ms-3 rounded-full" alt="Logo" />
      </a>
      <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-gray-100 " aria-controls="navbar-dropdown" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
        <ul class="flex flex-col items-center font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-900 md:flex-row md:mt-0 md:border-0  ">
          <li class="w-full lg:w-auto lg:mx-3">
            <a href="/" class="block py-2 pe-3 mx-2 ps-4 text-white   rounded md:bg-transparent  {{ Route::currentRouteNamed('home') ? 'md:text-blue-700 bg-blue-700' : 'hover:text-blue-700' }}  md:p-0 " aria-current="page"> {{__('site.home') }}</a>
          </li>
          <li class="w-full lg:w-auto lg:mx-3">
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pe-3 mx-2 ps-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 hover:text-blue-700 md:p-0 md:w-auto ">{{__('site.blogs')}} 
                    <svg class="w-2.5 h-2.5 mx-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
              <!-- Dropdown menu -->
              <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
              
                  <ul class="py-2 text-sm  " aria-labelledby="dropdownLargeButton">
                    <a href="{{ route('post.index') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Route::currentRouteNamed('post.index') ? 'md:text-blue-700 bg-blue-700' : 'hover:text-black' }}">{{__('site.allblogs')}}</a>

                    @foreach (\App\Models\Category::all() as $category)
                        <li>
                            @if (App::isLocale('ar') && $category->name_ar != null)
                            <a href="{{ route('post.category', $category) }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::is('/blogs*') ? 'md:text-blue-700 bg-blue-700' : 'hover:text-black' }} ">{{$category->name_ar}}</a>                        
                            @else
                            <a href="{{ route('post.category', $category) }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::is('/blogs*') ? 'md:text-blue-700 bg-blue-700' : 'hover:text-black' }}">{{$category->name_en}}</a>

                            @endif
                        </li>
                    @endforeach

                  </ul>
              </div>
          </li>
          <li class="w-full lg:w-auto lg:mx-3">
            <a href="{{route('about')}}" class="block py-2 pe-3 mx-2 ps-4 text-white rounded hover:bg-gray-100  md:hover:bg-transparent md:border-0 {{ Route::currentRouteNamed('about') ? 'md:text-blue-700 bg-blue-700 md:bg-transparent' : 'hover:text-blue-700' }} md:p-0"> {{ __('site.about') }}</a>
          </li>
          <li class="w-full lg:w-auto lg:mx-3">
            <a href="{{route('contact')}}" class="block py-2 pe-3 mx-2 ps-4 text-white rounded hover:bg-gray-100  md:hover:bg-transparent md:border-0 {{ Route::currentRouteNamed('contact') ? 'md:text-blue-700 bg-blue-700 md:bg-transparent' : 'hover:text-blue-700' }} md:p-0"> {{ __('site.contact') }}</a>
          </li>

          <li class="w-full lg:w-auto lg:mx-3">
                <button id="dropdownNavbarLink_2" data-dropdown-toggle="dropdownNavbar_2" class="flex items-center justify-between w-full  py-2 pe-3 mx-2 ps-4 text-white rounded hover:bg-gray-100  md:hover:bg-transparent md:border-0 hover:text-blue-700 md:p-0 md:w-auto ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                    </svg>
                    <svg class="w-2.5 h-2.5 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar_2" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50  md:mt-0 md:border-0 md:bg-white " role="none">
                        <li>
                            <a href="{{ url('locale/en') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-lg " role="menuitem">
                                
                                    EN
                                
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('locale/ar') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-lg " role="menuitem">
                                
                                    AR
                            
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="w-full">
                 @auth
                    <div class=" relative w-full"> 
                        <x-dropdown align="end" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() && Auth::user()->profile_photo_path)
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-12 w-12 rounded-full object-cover" src="{{ asset('storage/'.Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md px-4 py-2">
                                        <button type="button" class="inline-flex items-center text-white hover:bg-gray-100 uppercase px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md  hover:text-blue-700 focus:outline-none  transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="me-2 -ms-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('site.manage_account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('site.profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif
                                
                                <x-dropdown-link href="{{ route('post.myPosts')}}">
                                    {{ __('site.my_blogs') }}
                                </x-dropdown-link>

                                      
                                @if (Auth::check() && Auth::user()->hasRole('admin'))
                                    <x-dropdown-link href="{{ url('/admin')}}">
                                        {{ __('site.dashboard') }}
                                    </x-dropdown-link>
                                    
                                @endif

                                <div class="border-t border-gray-200"></div>
                                
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                        {{ __('site.logout') }}
                                    </x-dropdown-link>

                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="flex flex-col md:flex-row gap-3 ">
                        <a href="{{ route('login') }}" class="block py-2 pe-3 ps-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 hover:text-blue-700 md:p-0"> {{ __('site.login') }}</a>
                        <a href="{{route('register')}}" class="block py-2 pe-3 ps-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 hover:text-blue-700 md:p-0"> {{ __('site.register') }}</a>
                    </div>
                @endauth
            </li>

        </ul>
      </div>


    </div>
  </nav>
  
