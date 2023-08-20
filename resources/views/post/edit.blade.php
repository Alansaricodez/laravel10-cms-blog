<x-app-layout>

    <div class="container p-6 mx-auto bg-white">
        <h1 class="md:text-5xl text-3xl w-fit mx-auto font-extrabold uppercase my-3 text-center border-blue-700 border-b-2">{{__('Create new Blog')}}</h1>
    
        <form class="w-full max-w-2xl mx-auto mt-12" method="POST" action="{{route('post.update', $post->slug)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full  px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  Title
                </label>
                <input value="{{$post->title}}" class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="title" type="text" placeholder="blog title">
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Content
                </label>
                
                <textarea id="myeditorinstance" name="body" rows="10" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 p-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    {!!$post->body!!}
                </textarea>

              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-2">
             
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                Category
                </label>
                <div class="relative">
                    <select name="category" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $selectedCategory  ? 'selected="selected"': ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                  Thumbnail
                </label>
                <input name="image" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="file">

            </div>
            </div>

            <input type="hidden" name="user_id" value="{{Auth::id()}}">

            <div class="mt-6">
                <button type="submit" class="text-white  transition duration-300 hover:text-blue-700 border border-blue-700 uppercase hover:bg-white bg-blue-700  text-md lg:text-lg font-extrabold py-2 px-4 rounded">
                   Submit
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