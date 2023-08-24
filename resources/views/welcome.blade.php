
<x-app-layout>

  

<div class="">
    

    {{-- hero section --}}
    <section class="bg-gray-900">

        <div class="grid items-center max-w-screen-xl px-4 py-8 mx-auto xl:gap-0 lg:py-16">
            <div class="mx-auto w-full text-center">
                <h1 class="mb-4 text-4xl font-extrabold md:text-5xl xl:text-6xl text-white">{{__('Our First Laravel Blog')}}</h1>

                
                <x-search-component />
            </div>
                      
        </div>
    </section>



    {{-- latest blog --}}

    <section class="p-3">

        <div class="flex flex-col gap-3 py-3">
        {{-- latest post --}}
        
            <div class="mb-8  mx-auto">
                <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase my-6 text-center border-blue-700 border-b-2">{{__('latest Blog')}}</h1>
                    <x-post-item :post="$latestPost" />
            </div>

             {{--  Popular posts --}}
            <div class="mb-8 mx-auto">
                <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase my-6 text-center border-blue-700 border-b-2">{{__('Popular Blogs')}}</h1>
                
                @foreach ($popularPosts as $post)
                    <x-post-item :post="$post" />
                @endforeach       
            </div>
        </div>
    </section>

       


    {{-- blogs by category --}}
    <section class=" lg:p-6 p-1">
        <div class="flex flex-col gap-3 mx-auto my-6 p-3">
            @foreach ($categories as $category)
                <h1 class="md:text-5xl text-3xl  w-fit mx-auto font-extrabold uppercase mt-10 text-center border-blue-700 border-b-2">
                    <a href="{{route('post.category', $category)}}">
                                {{$category->name}}
                    </a>
                </h1>

            
                <div class="mb-8 mx-auto">
                    @foreach ($category->posts->take(4) as $post)
                        <x-post-item :post="$post" />
                    @endforeach    
                </div>
                        
        @endforeach
        </div>
    </section>
    
    
</div>

</x-app-layout>