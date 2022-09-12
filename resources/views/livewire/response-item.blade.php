<div x-data="{ open : false }" class=" p-6 border-gray-100 hover:bg-blue-50 duration-150 ease-in-out">
    <div class="flex flex-row-reverse justify-start items-center">
        <div class="bg-gray-200 w-10 h-10 rounded-full text-center text-white ml-4 leading-10">
            <i class="fa-solid fa-user w-10 h-10"></i>
        </div>
        <div dir="rtl" class="w-full">
            <span class="font-semibold">{{ $response->pseudo }}</span>
            <p>{{ $response->response }}</p>
            <div class="w-full flex flex-wrap justify-start items-center">
                <div>
                    <button wire:click.prevent="interactionLikes('dislikes', {{ $response->id }} )" class="text-xs">
                        <span class="text-gray-400 ">( {{ $dislikes }} )</span>
                        <i class="fa-solid fa-thumbs-down text-green-500"></i>

                    </button>
                    <button wire:click.prevent="interactionLikes('likes', {{ $response->id }} )" class="mr-2 text-xs">
                        <span class="text-gray-400 ">( {{ $likes }} )</span>
                        <i class="fa-solid fa-thumbs-up text-blue-500"></i>

                    </button>
                </div>

                <div>
                    <button @click="open = !open" class="text-xs font-bold text-blue-500 mr-10 hover:text-blue-600 transition duration-300 ease-in-out">
                        {{ __('Reply') }}
                    </button>
                    @if($response->validatedReplies($response)->count() > 0)
                    <button wire:click.prevent="loadMoreReplies" class="text-xs font-bold text-blue-500 mr-4 hover:text-blue-600 transition duration-300 ease-in-out">
                        {{ __('Replies') }} <span class="text-xs">( {{ $response->replies($response)->count() }} )</span>
                    </button>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div :class="{'block': open, 'hidden': ! open}" class="w-full ">
        <!-- Modal content -->
        <div class="flex flex-col-reverse md:flex-row flex-wrap md:flex-nowrap justify-between items-center mb-2 space-x-0 md:space-x-4">

            <div dir="rtl" class="w-full md:w-1/3">
                <label class="text-xs text-gray-500 font-bold text-right" for="nom_{{$response->id}}">
                    {{ __('Pseudo') }}
                </label>
                <input wire:model="pseudo" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="nom_{{$question->id}}" type="text" placeholder="{{ __('Pseudo') }}">
                @error('pseudo') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div dir="rtl" class="w-full md:w-1/3">
                <label class="text-xs text-gray-500 font-bold text-right" for="email_{{$response->id}}">
                    {{ __('Email') }}

                </label>
                <input wire:model="email" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="email_{{$question->id}}" type="email" placeholder="{{ __('Email') }}">
                @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div dir="rtl" class="w-full md:w-1/3">
                <label class="text-xs text-gray-500 font-bold text-right" for="nom_{{$response->id}}">
                    {{ __('Name') }}
                </label>
                <input wire:model="name" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="nom_{{$question->id}}" type="text" placeholder="{{ __('Name') }}">
                @error('name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
        </div>

        <div dir="rtl">
            <label class="text-xs text-gray-500 font-bold text-right" for="reponse_{{$response->id}}">
                {{ __('Reply') }}

            </label>
            <textarea wire:model="reply" name="reponse" id="reponse_{{$response->id}}" rows="3" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none"></textarea>
            @error('reply') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

        <div class="w-full flex justify-between items-center">
            <button @click="open = false" class="bg-red-500 px-6 py-1 rounded-md text-xs text-white hover:bg-red-600 transition duration-300 ease-in-out">
                {{ __('Cancel') }}
            </button>

            <div class="w-full flex justify-end items-center">
                @if (session()->has('message')) <div class="text-xs text-gray-400 mr-2">{{ __(session('message')) }}</div> @endif
                <button wire:click.prevent="save" class="bg-blue-500 px-6 py-1 rounded-md text-xs text-white hover:bg-blue-600 transition duration-300 ease-in-out">
                    {{ __('Send') }}
                </button>
            </div>
        </div>

    </div>

    <!-- more replies -->
    @if($loadMoreReplies)
    @foreach($moreReplies as $index => $reply)
    <livewire:response-item :response="$reply" :question="$question" :wire:key="$index" />
    @endforeach
    @endif
</div>