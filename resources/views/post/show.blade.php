<x-app-layout>

    {{-- breadcrumbs --}}
<nav class="flex p-6" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
      <li class="inline-flex items-center">
        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
          <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
          </svg>
          {{__('site.home')}}
        </a>
      </li>
 

      <li aria-current="page">
        <div class="flex items-center">
          <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          
          <a href="{{route('post.index')}}" class="inline-flex mx-1 items-center text-sm font-medium text-gray-700 hover:text-blue-600 "> 
            {{__('site.blogs')}}
          </a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 ">{{$post->title}}</span>
        </div>
      </li>
    </ol>
  </nav>



    <div class=" max-w-4xl mx-auto p-3 bg-white px-6 pt-12 text-start">
        <div class="md:ms-12 my-3">
             @foreach ($post->categories as $category)
                <a href="{{route('post.category', $category)}}" class="inline-block hover:bg-gray-200 transition-all ease  rounded-full px-3 py-1 text-sm md:text-xl font-semibold text-gray-500">#{{$category->name}}</a>
             @endforeach
        </div>
            
        <h1 class="lg:text-5xl md:text-3xl text-xl w-fit mx-auto font-extrabold uppercase my-8 text-center">{{$post->title}}</h1>
       <hr>
        <div class="flex flex-row justify-between align-middle  py-3">
            <div class="flex flex-row gap-2 mx-3">
                @if ($post->user->profile_photo_path)
                    <img src="{{asset('storage/'.$post->user->profile_photo_path)}}" class="w-12 h-12 object-cover rounded-full" alt="user image">
                @endif
                <h2 class="font-bold my-auto">  {{$post->user->name}} .</h2>  
                <p class="my-auto mx-1 text-gray-500">{{$post->updated_at->diffForHumans()}}</p>

            </div>

            <div class="flex flex-row my-auto">
                
                <livewire:like :post="$post"/>

                @if (Auth::id() == $post->user->id)
                    <div class="flex flex-row gap-3">
                        <a href="{{route('post.edit', $post->slug)}}" class="text-orange-500 hover:text-orange-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>   
                        </a>
            
                        <form action="{{route('post.destroy', $post->slug)}}" method="post"  onSubmit="return confirm('are you sure?') ">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>                        
                            </button>
                        </form>
                    </div>
                @endif


            </div>

        </div>
       <hr>

       <div class="mt-6 md:text-xl text-lg">
            @if ($post->getImage())
                <img src="{{asset($post->getImage())}}" class=" w-full my-6 object-cover" alt="user image">
            @endif
                {!!$post->body!!}

                <hr class="my-6">
                {{-- comments section --}}
                <x-post-comments :post="$post" />
       </div>
    </div>
    
</x-app-layout>