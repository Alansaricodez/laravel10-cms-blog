<x-app-layout>

<div class="">

    {{-- hero section --}}
    <section class="bg-white dark:bg-gray-900">

        <div class="grid items-center max-w-screen-xl px-4 py-8 mx-auto xl:gap-0 lg:py-16">
            <div class="mx-auto w-full text-center">
                <h1 class="mb-4 text-4xl font-extrabold md:text-5xl xl:text-6xl dark:text-white">{{__('Our First Laravel Blog')}}</h1>

                
                <x-search-component />
            </div>
                      
        </div>
    </section>



    {{-- latest blog --}}

    <section class="bg-white p-3">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 py-3">
        {{-- latest post --}}
        
            <div class="mb-8 col-span-1 mx-auto">
                <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase my-3 text-center border-blue-700 border-b-2">{{__('latest Blog')}}</h1>
                <div class="my-6">
                    <x-post-item :post="$latestPost" />
                </div>
            </div>

             {{--  Popular posts --}}
            <div class="mb-8 col-span-1 overflow-auto">
                <h1 class="md:text-xl text-3xl w-fit mx-auto font-extrabold uppercase my-6 text-center border-blue-700 border-b-2">{{__('Popular Blogs')}}</h1>
                
                @foreach ($popularPosts as $post)
                    <div class="flex flex-row max-w-full  mx-auto md:mx-0 gap-2 my-3">
                        <a href="{{route('post.show', $post->slug)}}" class=" flex flex-row">
                            <img src="{{$post->getImage()}}" class="mx-3 h-24 w-24 object-cover" alt="post image" style="">
                        </a>
                            <div class="mt-1">
                                
                                <a href="{{route('post.show', $post->slug)}}">
                                    <h3 class="test-sm uppercase whitespace-nowrap truncate hover:text-blue-500">{{\Illuminate\Support\Str::words($post->title, 6)}}</h3>
                                </a>

                                <livewire:like :post="$post"/>
                               
                                <div class="text-xs my-2">
                                    {{$post->shortBody()}}
                                </div>

                                <div class="flex">
                                    @foreach ($post->categories as $category)
                                        <a href="{{route('post.category', $category)}}" class="inline-block outline hover:bg-gray-200 transition-all ease  rounded-full px-3 py-1 text-sm font-semibold text-gray-500">#{{$category->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                    </div>

                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach       
            </div>
        </div>
    </section>

       


    {{-- blogs by category --}}
    <section class="bg-white md:p-12 p-6">
        @foreach ($categories as $category)
            <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase mt-10 text-center border-blue-700 border-b-2">{{$category->name}}</h1>

        
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mx-auto my-6 p-3">
                @foreach ($category->posts->take(4) as $post)
                    <x-post-item :post="$post" />
                @endforeach    
            </div>
            
        @endforeach
    </section>
    
    
</div>

</x-app-layout>