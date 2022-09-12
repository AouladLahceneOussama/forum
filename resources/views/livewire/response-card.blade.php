<div x-data="{ open: false }" class="relative w-full p-6 mb-4 bg-white rounded-lg border border-gray-200 shadow-lg opacity-95 hover:opacity-100 ease-in-out duration-150">
    <div class="flex flex-row-reverse justify-between items-center border-b-2 pb-2 border-gray-100 mb-6">
        <div class="flex flex-row-reverse items-center">
            <i class="fa-solid fa-person-circle-question text-gray-400 text-3xl"></i>
            <p dir="rtl" class="mx-4 font-bold text-xl">{{ $question->title }}</p>
        </div>
        <div>
            <button class="mr-2">
                <i class="fa-solid fa-thumbs-up text-blue-500" wire:click="likeQuestion({{$question->id}})"></i>
                <span class="text-gray-400 text-sm">({{$questionLikes}})</span>
            </button>

            <button>
                <i class="fa-solid fa-comments text-green-500"></i>
                <span class="text-gray-400 text-sm">({{$question->response_count}})</span>
            </button>
        </div>

    </div>

    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400" dir="rtl">{{ $question->question }}</p>
    <div class="bg-gray-300 py-2 px-4 font-semibold rounded-t-lg text-right">
        {{ __('Responses') }}
    </div>
    <div class="w-full max-h-96 border border-gray-300 rounded-b-lg overflow-y-auto overflow-x-hidden" id="scrollable">
        @forelse($responses as $index => $response)
            <livewire:response-item :response="$response" :question="$question" :wire:key="$index" />
        @empty
        <div class="p-6 text-center">
            {{ __('There is no responses for the moments, let us know what you think') }}
        </div>
        @endforelse
    </div>

    <button x-on:click="open = ! open" class="bg-blue-500 px-6 py-1 mt-4 rounded-md text-xs text-white hover:bg-blue-600 transition duration-300 ease-in-out">
        {{ __('Comment') }}
    </button>


    <form x-show="open" class="w-full mt-4 my-3">
        <div class="flex flex-col-reverse md:flex-row flex-wrap md:flex-nowrap justify-between items-center mb-2 space-x-0 md:space-x-4">

            <div dir="rtl" class="w-full md:w-1/3">
                <label class="text-xs text-gray-500 font-bold text-right" for="nom_{{$question->id}}">
                    {{ __('Pseudo') }}
                </label>
                <input wire:model="pseudo" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="nom_{{$question->id}}" type="text" placeholder="{{ __('Pseudo') }}">
                @error('pseudo') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div dir="rtl" class="w-full md:w-1/3">
                <label class="text-xs text-gray-500 font-bold text-right" for="email_{{$question->id}}">
                    {{ __('Email') }}

                </label>
                <input wire:model="email" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="email_{{$question->id}}" type="email" placeholder="{{ __('Email') }}">
                @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div dir="rtl" class="w-full md:w-1/3">
                <label class="text-xs text-gray-500 font-bold text-right" for="nom_{{$question->id}}">
                    {{ __('Name') }}
                </label>
                <input wire:model="name" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="nom_{{$question->id}}" type="text" placeholder="{{ __('Name') }}">
                @error('name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
        </div>

        <div dir="rtl">
            <label class="text-xs text-gray-500 font-bold text-right" for="reponse_{{$question->id}}">
                {{ __('Response') }}

            </label>
            <textarea wire:model="response" name="reponse" id="reponse_{{$question->id}}" rows="3" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none"></textarea>
            @error('response') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

        <div class="w-full flex justify-end items-center">
            @if (session()->has('message')) <div class="text-xs text-gray-400 mr-2">{{ __(session('message')) }}</div> @endif
            <button wire:click.prevent="save" class="bg-blue-500 px-6 py-1 rounded-md text-xs text-white hover:bg-blue-600 transition duration-300 ease-in-out">
                {{ __('Send') }}
            </button>

        </div>
    </form>

</div>