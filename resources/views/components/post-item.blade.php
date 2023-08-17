<div class="w-full bg-white shadow mx-auto">
    <a href="{{route('post.show', $post->slug)}}">
        <img class="w-full mx-auto object-cover" src="{{asset($post->getImage())}}" alt="post image" />
        <div class="p-5 w-full flex flex-col justify-between">
            <a href="{{route('post.show', $post->slug)}}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$post->title}}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700">{{$post->shortBody()}}</p>
            
        </div>
    </a>
</div>