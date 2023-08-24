<x-app-layout>
      {{-- breadcrumbs --}}
      <nav class="flex p-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
              <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
              </svg>
              Home
            </a>
          </li>
        
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 ">Contact</span>
            </div>
          </li>
        </ol>
      </nav>
      
    <div class="h-screen flex lg:flex-row flex-col justify-center align-middle shadow  py-8 lg:px-28 px-8 mx-auto">
       

        <p class="md:text-3xl text-xl lg:text-5xl my-6 lg:my-auto font-bold leading-7 text-center text-gray-700 uppercase">{{__('we are happy to hear from you')}}</p>

        <form action="{{route('send.message')}}" method="post" class=" md:mx-auto bg-white p-6 h-fit my-auto rounded mt-12 lg:mt-auto">
            @csrf
            <div class="md:flex items-center ">
                <div class="md:w-72 flex flex-col">
                    <label class="text-base font-semibold leading-none text-gray-80">Name</label>
                    <input name="name"  type="text" class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100" placeholder="Please input  name" />
                </div>
                <div class="md:w-72 flex flex-col md:ml-6 md:mt-0 mt-4">
                    <label class="text-base font-semibold leading-none text-gray-800 ">Email Address</label>
                    <input name="email" type="email" class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100" placeholder="Please input email address" />
                </div>
            </div>
    
            <div>
                <div class="w-full flex flex-col mt-8">
                    <label class="text-base font-semibold leading-none text-gray-800 ">Message</label>
                    <textarea name="message" rows="5" class=" text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100"></textarea>
                </div>
            </div>
            <div class="flex items-center justify-center w-full">
                <button class="mt-9 text-base font-semibold leading-none text-white py-4 px-10 bg-indigo-700 rounded hover:bg-indigo-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none">SUBMIT</button>
            </div>

        </form>
    </div>
</x-app-layout>