<div class="bg-white p-3 lg:p-6 h-fit my-6 md:mt-12 w-full md:w-80">
    <h1 class="md:text-2xl text-3xl font-extrabold uppercase mb-3">{{__('site.categories')}}</h1>
    <hr>

    <ul>
        @foreach (\App\Models\Category::all() as $category)
            <li class="my-2 ">
                <a href="{{route('post.category', $category)}}" class="flex flex-row justify-between hover:bg-gray-200 p-1">
                    @if (App::isLocale('ar') && $category->name_ar != null)
                        {{$category->name_ar}}                        
                    @else
                        {{$category->name_en}}                        
                    @endif

                    
                    <span class="bg-gray-300 text-gray-600 px-2">{{$category->posts->count()}}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div><div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
</div>