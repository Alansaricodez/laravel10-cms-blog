
<footer class="bg-white shadow border-t">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 OurBlog. All Rights Reserved.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
            <a href="{{route('post.index')}}" class="ms-4 hover:underline md:ms-6 ">{{__('site.blogs')}}</a>
        </li>
        <li>
            <a href="{{route('about')}}" class="ms-4 hover:underline md:ms-6 ">{{__('site.about')}}</a>
        </li>
        <li>
            <a href="{{route('contact')}}" class="hover:underline">{{__('site.contact')}}</a>
        </li>
    </ul>
    </div>
</footer>
