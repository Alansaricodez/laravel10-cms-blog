
<x-app-layout>

  

<div class="overflow-hidden">
    

    {{-- hero section --}}
    <section class="bg-gray-900">

        <div class="grid items-center max-w-screen-xl px-4 py-8 mx-auto xl:gap-0 lg:py-16">
            <div class="mx-auto w-full text-center">
                <h1 class="lg:mb-4 text-4xl font-extrabold md:text-5xl xl:text-6xl text-white">{{__('site.our_first_laravel_blog')}}</h1>

                
                <x-search-component />
            </div>
                      
        </div>
    </section>

    <div class="flex flex-col lg:flex-row justify-center align-middle my-3 ">
        <div class="lg:p-6">
            {{-- latest blog --}}  
            <section class="lg:p-6 p-1">
            
                <div class="flex flex-col">
                {{-- latest post --}}
                
                    <div class="mb-8 w-full">
                        <h1 class="md:text-3xl text-xl w-full p-3 mx-auto lg:ms-0 font-extrabold uppercase lg:mb-4 bg-white">{{__('site.latest_blog')}}</h1>
                            <x-post-item :post="$latestPost" />
                    </div>
            
                     {{--  Popular posts --}}
                    <div class="mb-8 w-full">
                        <h1 class="md:text-3xl text-xl w-full p-3 mx-auto lg:ms-0 font-extrabold uppercase lg:mb-4  bg-white">{{__('site.popular_blogs')}}</h1>
                        
                        <div class="flex flex-col  mx-auto w-full">

                            @foreach ($popularPosts as $post)
                                <x-post-item :post="$post" />
                            @endforeach       

                        </div>
                    </div>
                </div>
            </section>
            
               
            
            
            {{-- blogs by category --}}
            <section class=" lg:p-6 p-1 ">
                <div class="flex flex-col  gap-3 my-6 p-3 w-full">
                    @foreach ($categories as $category)
                        <h1 class="md:text-3xl text-xl w-full p-3 mx-auto lg:ms-0 font-extrabold uppercase lg:mb-4 hover:cursor-pointer hover:text-blue-600 bg-white">
                            <a href="{{route('post.category', $category)}}">

                                @if (App::isLocale('ar') && $category->name_ar != null)
                                    {{$category->name_ar}}                        
                                @else
                                    {{$category->name_en}}                        
                                @endif
                            </a>
                        </h1>
            
                    
                        <div class="mb-8 w-full">
                            @foreach ($category->posts->take(4) as $post)
                                <x-post-item :post="$post" />
                            @endforeach    
                        </div>
                                
                    @endforeach
                </div>
            </section>
        </div>

        {{-- show categories --}}
        <x-categories />
    </div>


    
    
</div>

</x-app-layout>