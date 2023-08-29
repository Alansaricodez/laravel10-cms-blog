<nav x-data="{ open: false }" class="bg-white fixed z-50 w-full lg:border-b lg:p-1">
    <!-- Primary Navigation Menu -->
    <div class="w-full mx-auto px-4 md:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="shrink-0 flex justify-center items-center mx-auto md:mx-0">
                <a href="{{ url('/') }}" class="mx-3">
                    <img class="h-12 w-12 rounded-full object-cover" src="https://pbs.twimg.com/profile_images/1625822397097037826/qJTjFNXS_400x400.jpg" alt="Logo">
                </a>
                
                <div class="flex lg:ms-3">
                    <!-- Navigation Links -->
                    <div class="hidden md:flex">
                        <x-nav-link href="{{ url('/') }}" :active="request()->routeIs('/')">
                            {{__('site.home') }}
                        </x-nav-link>
                    </div>
                    
                    <div class="hidden sm:mx-3 md:flex" >                            
                        <x-nav-link >

                            
                            <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class=" font-medium rounded-lg text-sm text-center inline-flex items-center" type="button">{{ __('site.blogs') }} <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                                    <li>
                                        <a href="{{ route('post.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{__('site.allblogs')}}</a>
                                    </li>
                                    @foreach (\App\Models\Category::all() as $category)
                                        <li>
                                            @if (App::isLocale('ar') && $category->name_ar != null)
                                            <a href="{{ route('post.category', $category) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$category->name_ar}}</a>                        
                                            @else
                                            <a href="{{ route('post.category', $category) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$category->name_en}}</a>
                   
                                            @endif
                                        </li>
                                    @endforeach
                       
                                </ul>
                            </div>

                        </x-nav-link>
                    </div>
                    <div class="hidden sm:mx-3 md:flex">
                        <x-nav-link href="{{route('about')}}">
                            {{ __('site.about') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden sm:mx-3 md:flex">
                        <x-nav-link href="{{route('contact')}}">
                            {{ __('site.contact') }}
                        </x-nav-link>
                    </div>
                    
                </div>
            </div>

            <div class="hidden md:flex md:items-center md:me-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="me-3 relative">
                        <x-dropdown align="start" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="me-2 -ms-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                
                <nav class=" border-gray-200">
                    <div class=" flex flex-wrap items-center justify-between mx-auto p-4">

                        <div class="flex items-center md:order-2">
                            <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900  rounded-lg cursor-pointer hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                                </svg>
                                
                            </button>
                            <!-- Dropdown -->
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow " id="language-dropdown-menu">
                                <ul class="py-2 font-medium" role="none">
                                    <li>
                                        <a href="{{ url('locale/en') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">
                                            <div class="inline-flex items-center">
                                                EN
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('locale/ar') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                            <div class="inline-flex items-center">
                                                AR
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <button data-collapse-toggle="navbar-language" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-language" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                                </svg>
                            </button>
                        </div>
            
                    </div>
                </nav>
  
                
                @auth
                    <div class="me-3 relative"> 
                        <x-dropdown align="end" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
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
                    <div class="">
                        <x-nav-link href="{{ route('login') }}">
                            {{ __('site.login') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('register') }}">
                            {{ __('site.register') }}
                        </x-nav-link>
                    </div>
                @endauth
                <!-- Settings Dropdown -->
            </div>


            <!-- Hamburger -->
            <div class="-ms-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden ">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ url('/') }}">
                {{ __('site.home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{route('post.index')}}">
                {{ __('site.blogs') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{route('about')}}">
                {{ __('site.about') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{route('contact')}}">
                {{ __('site.contact') }}
            </x-responsive-nav-link>

            @if (Auth::check() && Auth::user()->hasRole('admin'))
                <x-responsive-nav-link href="{{ url('/admin')}}">
                    {{ __('site.dashboard') }}
                </x-responsive-nav-link>
            @endif

            <div class="flex flex-row w-full">
                <x-responsive-nav-link href="{{url('locale/en')}}">
                    EN
                </x-responsive-nav-link>
                <span class="my-auto">|</span>
                <x-responsive-nav-link href="{{url('locale/ar')}}">
                    AR
                </x-responsive-nav-link>

            </div>

        </div>

        

        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 ms-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('site.profile') }}
                    </x-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif

                    <x-responsive-nav-link href="{{ route('post.myPosts')}}">
                        {{ __('site.my_blogs') }}
                    </x-responsive-nav-link>

                    @if (Auth::check() &&  Auth::user()->hasRole('admin'))
                        <x-responsive-nav-link href="{{ url('/admin')}}">
                            {{ __('site.dashboard') }}
                        </x-responsive-nav-link>
                        
                        
                        @endif
                        
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                            {{ __('site.logout') }}
                        </x-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-responsive-nav-link>
                        @endcan

                        <!-- Team Switcher -->
                        @if (Auth::user()->allTeams()->count() > 1)
                            <div class="border-t border-gray-200"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" component="responsive-nav-link" />
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
            
            @else
            <div class="">
                <x-responsive-nav-link href="{{ route('login') }}">
                    {{ __('site.login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('register') }}">
                    {{ __('site.register') }}
                </x-responsive-nav-link>
            </div>
        @endauth
    </div>
</nav>
