<span class="inline-flex items-center text-sm gap-3 my-1 me-auto">
    <div  class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
          </svg>
          
   
      <span class="font-medium text-gray-900">{{ $post->comments->count() }}</span>
      <span class="sr-only">likes</span>
    </div>
    <button wire:click="like"   class="inline-flex space-x-2 {{ $post->isLiked() ? 'text-blue-500 hover:text-blue-700' : 'text-gray-400 hover:text-gray-500' }} focus:outline-none focus:ring-0">
      <svg class="h-5 w-5" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
      </svg>
   
      <span class="font-medium text-gray-900">{{ $post->likes->count() }}</span>
      <span class="sr-only">likes</span>
    </button>
  </span>

