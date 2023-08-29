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
          
          <a href="{{route('post.index')}}" class="inline-flex mx-1 items-center text-sm font-medium text-gray-700 hover:text-blue-600 "> 
            {{__('site.blogs')}}
          </a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          /
          <span class="mx-1 text-sm font-medium text-gray-500 md:me-2 ">{{__('site.search')}}</span>
        </div>
      </li>
    </ol>
  </nav>
    
    <div class="min-h-screen p-6 mx-auto">
        <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase my-3 text-center border-blue-700 border-b-2">{{__('site.search_result')}}</h1>

        <x-search-component />

        <div class="flex flex-col gap-3 mx-auto my-6 p-3 lg:w-1/2">
            @if($posts->count() > 0)
                @foreach ($posts as $post)
                    <x-post-item :post="$post" />
                @endforeach
            @else 
                <h3 class="m-6 font-bold text-black">No Results found</h3>
            @endif
        </div>
    </div>
</x-app-layout>