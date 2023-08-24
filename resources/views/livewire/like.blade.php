<span class="inline-flex items-center text-sm gap-3 my-1 me-auto">

    <button wire:click="like"   class="inline-flex space-x-2 {{ $post->isLiked() ? 'text-blue-500 hover:text-blue-700' : 'text-gray-400 hover:text-gray-500' }} focus:outline-none focus:ring-0">
      <svg class="h-5 w-5" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
      </svg>
   
      <span class="font-medium text-gray-900">{{ $post->likes->count() }}</span>
      <span class="sr-only">likes</span>
    </button>
  </span>

