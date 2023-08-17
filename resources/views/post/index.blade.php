<x-app-layout>
    <div class="container p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mx-auto my-6 p-3">
            @foreach ($posts as $post)
                <x-post-item :post="$post" />
            @endforeach
        </div>
        {{$posts->links()}}
    </div>
</x-app-layout>