<form action="{{route('search')}}" method="GET" role="search" class="mt-6  w-3/4 mx-auto">
    @csrf
    <div class="relative flex flex-col gap-3 md:flex-row">
    
        <input type="search" name="textInput" class="block w-full p-4 pe-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Blogs..." required>
        <button type="submit" class="text-white  transition duration-300 hover:text-blue-700 border border-blue-700 uppercase hover:bg-white bg-blue-700  text-sm lg:text-lg font-extrabold py-2 px-3 mx-1 rounded-md">{{__('site.search')}}</button>
    </div>
</form>