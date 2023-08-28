
<x-app-layout>

  

<div class="overflow-hidden">
    

    {{-- hero section --}}
    <section class="bg-gray-900">

        <div class="grid items-center max-w-screen-xl px-4 py-8 mx-auto xl:gap-0 lg:py-16">
            <div class="mx-auto w-full text-center">
                <h1 class="mb-4 text-4xl font-extrabold md:text-5xl xl:text-6xl text-white">{{__('site.our_first_laravel_blog')}}</h1>

                
                <x-search-component />
            </div>
                      
        </div>
    </section>

    <div class="flex flex-col lg:flex-row justify-evenly align-middle mx-auto  container">
        <div class="p-1">
            {{-- latest blog --}}
            
            <section class="lg:p-6 p-1">
            
                <div class="flex flex-col">
                {{-- latest post --}}
                
                    <div class="mb-8  mx-auto ">
                        <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase my-6 text-center border-blue-700 border-b-2">{{__('site.latest_blog')}}</h1>
                            <x-post-item :post="$latestPost" />
                    </div>
            
                     {{--  Popular posts --}}
                    <div class="mb-8 mx-auto">
                        <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase my-6 text-center border-blue-700 border-b-2">{{__('site.popular_blogs')}}</h1>
                        
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

        <div class="bg-white mx-auto p-6 h-fit my-6 md:mt-24 w-full md:w-80">
            <h1 class="md:text-2xl text-3xl font-extrabold uppercase mb-3">{{__('site.categories')}}</h1>
            <hr>

            <ul>
                @foreach (\App\Models\Category::all() as $category)
                    <li class="my-2 ">
                        <a href="{{route('post.category', $category)}}" class="flex flex-row justify-between hover:bg-gray-200 p-1">
                            {{$category->name}} 
                            <span class="bg-gray-300 text-gray-600 px-2">{{$category->posts->count()}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    
    
</div>

</x-app-layout>