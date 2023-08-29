<x-app-layout>

      {{-- breadcrumbs --}}
      <nav class="flex p-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
              <svg class="w-3 h-3 mx-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
              </svg>
              {{__('site.home')}}
            </a>
          </li>
        
          <li aria-current="page">
            <div class="flex items-center">
              /
              <span class="mx-1 text-sm font-medium text-gray-500 md:me-2 ">{{__('site.about')}}</span>
            </div>
          </li>
        </ol>
      </nav>
    
    <div class="container h-screen 2xl:mx-auto lg:py-16 lg:px-20 md:py-12 md:px-6 py-9 px-4 bg-white">
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="w-full flex flex-col justify-center">
                <h1 class="text-3xl lg:text-4xl font-bold leading-9 text-gray-800  pb-4">{{__('site.about_us')}}</h1>
                <p class="font-normal text-base leading-6 text-gray-600">{{__('site.about_text')}}</p>
            </div>
        </div>

        <div class="flex lg:flex-row flex-col gap-8 pt-12">
            <div class="w-full flex flex-col justify-center">
                <h1 class="text-3xl lg:text-4xl font-bold leading-9 text-gray-800   pb-4">{{__('site.story')}}</h1>
                <p class="font-normal text-base leading-6 text-gray-600 ">{{__('site.story_text')}}</p>
            </div>
        </div>
    </div>

</x-app-layout>