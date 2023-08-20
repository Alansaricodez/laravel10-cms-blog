<x-app-layout>
    <div class="container bg-white shadow rounded py-8 lg:px-28 px-8 mx-auto">
        <p class="md:text-3xl text-xl font-bold leading-7 text-center text-gray-700 uppercase">{{__('we are happy to hear from you')}}</p>
        <form action="{{route('send.message')}}" method="post" class="max-w-xl mx-auto">
            @csrf
            <div class="md:flex items-center mt-12">
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