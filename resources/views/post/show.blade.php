<x-app-layout>
    <div class="container max-w-4xl mx-auto p-3 bg-white px-6 mt-3">
        <h1 class="lg:text-5xl md:text-3xl text-xl w-fit mx-auto font-extrabold uppercase mt-8 text-center">{{$post->title}}</h1>
       <div class="md:ms-12 my-3">
            @foreach ($post->categories as $category)
                <a href="" class="bg-gray-700 hover:bg-gray-500 text-white p-1 rounded text-xs font-bold uppercase">{{$category->name}}</a>
            @endforeach
       </div>

       <hr>
            <div class="flex flex-row justify-between align-middle  py-3">
               <div class="flex flex-row gap-2">
                    @if ($post->user->profile_photo_path)
                        <img src="{{asset('storage/'.$post->user->profile_photo_path)}}" class="w-12 h-12 object-cover rounded-full" alt="user image">
                    @endif
                    <h2 class="font-bold my-auto">  {{$post->user->name}}</h2>
               </div>

               <p class="my-auto">{{$post->updated_at->diffForHumans()}}</p>
            </div>
       <hr>

       <div class="mt-6 md:text-xl text-lg">
        @if ($post->getImage())
            <img src="{{asset($post->getImage())}}" class=" w-full my-3 object-cover" alt="user image">
        @endif
            {!!$post->body!!}
       </div>
    </div>
    
</x-app-layout>