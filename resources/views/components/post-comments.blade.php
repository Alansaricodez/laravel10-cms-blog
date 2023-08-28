<section class="bg-white  py-8 lg:py-16">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-lg lg:text-2xl font-bold text-gray-900 ">{{__('site.discussion')}} ({{$post->comments->count()}})</h2>
      </div>

      <form  class="my-6" method="POST" action="{{route('comment.store', $post->slug)}}">
        @csrf
          <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
              <label for="comment" class="sr-only">Your comment</label>
              <textarea name="content" rows="6"
                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
                  placeholder="Write a comment..." required></textarea>

                  <input type="hidden" name="post_id" value="{{$post->id}}">
                  <input type="hidden" name="user_id" value="{{Auth::id()}}">
          </div>
          <button type="submit"
              class="text-white  transition duration-300 hover:text-blue-700 border border-blue-700 uppercase hover:bg-white bg-blue-700  text-md lg:text-lg font-extrabold py-2 px-4 rounded">
             {{__('site.submit')}}
          </button>
      </form>


      @if($post->comments->count() > 0)

        @foreach ($post->comments as $comment)
            <article class="p-6 mb-6 text-base bg-white rounded-lg ">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center ms-3 text-sm text-gray-900 ">
                            @if ($comment->user->profile_photo_path)
                                <img class="ms-2 w-6 h-6 rounded-full"
                                src="{{asset('storage/'.$comment->user->profile_photo_path)}}"
                                alt="user image" /> 

                            @endif
                         

                                {{$comment->user->name}}</p>
                        <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-08"
                                title="February 8th, 2022">{{$comment->created_at->diffForHumans()}}</time></p>
                    </div>
            
                    
                    @if (Auth::id() == $comment->user_id)
                    
                        <div class="flex flex-row gap-3">
                            <form action="{{route('comment.destroy', $comment)}}" method="post"  onSubmit="return confirm('are you sure?') ">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>                        
                                </button>
                            </form>
                        </div>
                    @endif
                </footer>
                <p class="text-gray-500 ">{{$comment->content}}</p>
            
            </article>
            
        @endforeach

      @else
        <p class="text-gray-500 ">{{__('site.be_the_first_to_comment')}}</p>
      @endif

      

    </div>
</section>
