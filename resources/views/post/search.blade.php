<x-app-layout>
    <div class="container p-6 mx-auto bg-white">
        <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase my-3 text-center border-blue-700 border-b-2">{{__('Search Results')}}</h1>

        <x-search-component />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mx-auto my-6 p-3">
            @if($posts->count() > 0)
                @foreach ($posts as $post)
                    <x-post-item :post="$post" />
                @endforeach
            @else 
                <h3 class="mt-6 font-bold text-black">No Results found</h3>
            @endif
        </div>
    </div>
</x-app-layout>