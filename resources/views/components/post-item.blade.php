<div class="w-full bg-white shadow mx-auto">
    <a href="{{route('post.show', $post->slug)}}">
        <img class="w-full mx-auto object-cover" src="{{asset($post->getImage())}}" alt="post image" />
        <div class="p-3 w-full flex flex-col justify-between">
            <a href="{{route('post.show', $post->slug)}}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$post->title}}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700">{{$post->shortBody()}}</p>
            
        </div>
        @if (Auth::id() == $post->user->id)
            <div class="p-3 ms-3">
                <a href="{{route('post.edit', $post->slug)}}" class="text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                      </svg>
                      
                </a>
            </div>
        @endif
    </a>
</div>