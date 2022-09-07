<div x-data="{ open: false }" class="w-full md:w-5/12 p-6 m-1 bg-white rounded-lg border border-gray-200 shadow-lg">
    <div class="flex flex-row-reverse justify-start items-center border-b-2 pb-2 border-gray-100 mb-6">
        <i class="fa-solid fa-person-circle-question text-gray-400 text-3xl"></i>
        <p class="mx-4">{{ $question->title }}</p>
    </div>

    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400" dir="rtl">{{ $question->question }}</p>
    <div class="flex justify-between items-center">
        <div>
            <button class="mr-2">
                <i class="fa-solid fa-thumbs-up text-blue-500"></i>
                <span class="text-gray-400 text-sm">({{$question->likes_count}})</span>
            </button>
            <button>
                <i class="fa-solid fa-comments text-green-500"></i>
                <span class="text-gray-400 text-sm">({{$question->response_count}})</span>
            </button>
        </div>

        <button x-on:click="open = ! open" class="bg-blue-500 px-6 py-1 rounded-md text-xs text-white hover:bg-blue-600 transition duration-300 ease-in-out">
            Commenter
        </button>
    </div>

    <form x-show="open" class="w-full mt-4 my-3">
        <div class="flex flex-row-reverse justify-between items-center mb-2">
            <div dir="rtl" class="ml-2">
                <label class="text-xs text-gray-500 font-bold text-right" for="nom_{{$question->id}}">
                    Nom
                </label>
                <input wire:model="name" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="nom_{{$question->id}}" type="text" placeholder="Nom">
                @error('name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div dir="rtl">
                <label class="text-xs text-gray-500 font-bold text-right" for="email_{{$question->id}}">
                    Email
                </label>
                <input wire:model="email" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="email_{{$question->id}}" type="email" placeholder="Email">
                @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror

            </div>
        </div>

        <div dir="rtl">
            <label class="text-xs text-gray-500 font-bold text-right" for="reponse_{{$question->id}}">
                Reponse
            </label>
            <textarea wire:model="response" name="reponse" id="reponse_{{$question->id}}" rows="3" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none"></textarea>
            @error('response') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

        <div class="w-full flex justify-end items-center">
            @if (session()->has('message')) <div class="text-xs text-gray-400 mr-2">{{ session('message') }}</div> @endif
            <button wire:click.prevent="save" class="bg-blue-500 px-6 py-1 rounded-md text-xs text-white hover:bg-blue-600 transition duration-300 ease-in-out">
                Envoyer
            </button>

        </div>
    </form>


    <!-- Main modal -->
    <div class="bg-gray-600/10 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-screen flex justify-center items-center">
        <div class="relative p-4 w-full max-w-5xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Terms of Service
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
            </div>
        </div>
    </div>

</div>