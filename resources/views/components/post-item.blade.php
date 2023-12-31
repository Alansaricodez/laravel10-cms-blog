<div class="flex flex-col lg:flex-row min-w-full overflow-hidden mx-auto  gap-2 my-3 bg-white p-3  shadow ">
    @if ($post->image)
        <a href="{{route('post.show', $post->slug)}}" class=" md:flex flex-row items-center">
            <img src="{{$post->image}}" class="mx-3 h-32 w-32 object-cover" alt="post image" style="">
        </a>
    @endif
    <div class="mt-1 mx-3 w-full p-3 ">  
          <div>
            @foreach ($post->categories as $category)
                @if (App::isLocale('ar') && $category->name_ar != null)
                    <a href="{{route('post.category', $category)}}" class="inline-block border mb-1 text-white hover:bg-white hover:text-blue-700 hover:border-blue-200 rounded-full bg-blue-700 transition-all ease-in px-2 py-1 text-sm ">#{{$category->name_ar}}</a>
        
                @else
                    <a href="{{route('post.category', $category)}}" class="inline-block border mb-1 text-white hover:bg-white hover:text-blue-700 hover:border-blue-200 rounded-full bg-blue-700 transition-all ease-in px-2 py-1 text-sm ">#{{$category->name_en}}</a>
                @endif
            @endforeach

        </div>

        <a href="{{route('post.show', $post->slug)}}">
            <h3 class="text-md lg:text-xl font-bold uppercase break-all hover:text-blue-700">{{\Illuminate\Support\Str::words($post->title, 15)}}</h3>
        </a>

        <p class="text-sm text-gray-500 mb-3">
            {{__('site.by')}} <span class="text-blue-700 font-bold">{{$post->user->name}}</span>, <span>{{$post->updated_at->diffForHumans()}}</span>
        </p>

        
        <div class="flex flex-col lg:flex-row gap-3 justify-between ">
            <p class="text-gray-500 text-sm">{{$post->shortBody()}}</p>

            <div class="flex flex-row gap-3">
                @if (Auth::id() == $post->user->id)
                    <div class="flex flex-row gap-3 mx-6">
                        <a href="{{route('post.edit', $post->slug)}}" class="text-orange-500 hover:text-orange-700 my-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>   
                        </a>
            
                        <form action="{{route('post.destroy', $post->slug)}}" method="post"  onSubmit="return confirm('are you sure?') " class="my-auto">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>                        
                            </button>
                        </form>
                    </div>
                @endif
    
    
             <livewire:like :post="$post" />

            </div>

        </div>

    </div>
</div>



  