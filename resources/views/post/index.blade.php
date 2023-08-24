<x-app-layout>
    <div class="container p-6 mx-auto bg-white">
        <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase my-3 text-center border-blue-700 border-b-2">{{__('Browse All Blogs')}}</h1>

                @auth
                    <div class="mt-6 py-3 text-center">
                        <a href="{{route('post.create')}}" class="text-blue-700  transition duration-300 hover:text-white border border-blue-700 uppercase bg-white hover:bg-blue-700  text-md lg:text-lg font-extrabold py-2 px-4 rounded">
                        Create Blog
                        </a>
                    </div>
                    
                @endauth

                <x-search-component />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mx-auto my-6 p-3">
            @foreach ($posts as $post)
                <x-post-item :post="$post" />
            @endforeach
        </div>
       

        <div class="mx-auto py-3 w-1/4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>