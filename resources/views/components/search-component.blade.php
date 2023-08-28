<form action="{{route('search')}}" method="GET" role="search" class="mt-6  w-3/4 mx-auto">
    @csrf
    <div class="relative flex flex-row">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" name="textInput" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Blogs..." required>
        <button type="submit" class="text-white  transition duration-300 hover:text-blue-700 border border-blue-700 uppercase hover:bg-white bg-blue-700  text-sm lg:text-lg font-extrabold py-1 px-2 mx-1 rounded-md">{{__('site.search')}}</button>
    </div>
</form>