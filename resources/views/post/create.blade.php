<x-app-layout>

    {{-- breadcrumbs --}}
    <nav class="flex p-6 bg-white" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
            <svg class="w-3 h-3 mx-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            {{__('site.home')}}
          </a>
        </li>
   

        <li aria-current="page">
          <div class="flex items-center">
            /
            
            <a href="{{route('post.index')}}" class="inline-flex mx-1 items-center text-sm font-medium text-gray-700 hover:text-blue-600 "> 
              {{__('site.blogs')}}
            </a>
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            /
            <span class="mx-1 text-sm font-medium text-gray-500 md:me-2 ">{{__('site.create')}}</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class=" p-6 mx-auto bg-white">
        <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase my-3 text-center border-blue-700 border-b-2">{{__('site.create_blog')}}</h1>
    
        <form class="w-full max-w-2xl mx-auto mt-12" method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full  px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  {{__('site.title')}}
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="title" type="text" placeholder="blog title">
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  {{__('site.content')}}
                </label>

                
                <textarea id="myeditorinstance" name="body" rows="10" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 p-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    
                </textarea>

              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-2">
             
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                {{__('site.category')}}
                </label>
                <div class="relative">
                    <select name="category[]" multiple class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 ps-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach ($categories as $category)
                            @if (App::isLocale('ar') && $category->name_ar != null)
                              <option value="{{$category->id}}">{{$category->name_ar}}</option>
           
                            @else
                              <option value="{{$category->id}}">{{$category->name_en}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                  {{__('site.thumbnail')}}
                </label>
                <input name="image" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="file">

            </div>
            </div>

            <input type="hidden" name="user_id" value="{{Auth::id()}}">

            <div class="mt-6">
                <button type="submit" class="text-white  transition duration-300 hover:text-blue-700 border border-blue-700 uppercase hover:bg-white bg-blue-700  text-md lg:text-lg font-extrabold py-2 px-4 rounded">
                   {{__('site.submit')}}
                </button>
            </div>
          </form>
    </div>

    <script src="https://cdn.tiny.cloud/1/1yis7y9d57kjplyrqqwaopklicv766peiuthafqvl597m5wg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic forecolor backcolor | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
   

</x-app-layout>