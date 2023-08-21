<x-app-layout>
    <div class="container p-6 mx-auto bg-white">
        <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase my-3 text-center border-blue-700 border-b-2">{{$category->name}}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mx-auto my-6 p-3">
            @foreach ($posts as $post)
                <x-post-item :post="$post" />
            @endforeach
        </div>
    </div>
</x-app-layout>