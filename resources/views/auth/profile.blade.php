<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session()->has('message'))
                <div class="bg-green-300 rounded-md py-2 px-4 text-green-800 my-4 mx-8">
                    {{ session()->get('message') }}
                </div>
                @endif
                <form method="post" class="w-full py-2 px-8 mt-4 h-full overflow-y-auto">
                    @csrf

                    <div class="w-full mb-3">
                        <span class="text-gray-400 text-xs ">{{ __('Informations Personnelles')}}</span>
                        <div class="bg-gray-200 w-full h-px"></div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-4">

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="name">
                                {{ __('Nom') }}
                            </label>
                            <input type="text" name="name" value="{{ $user->name }}" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Nom" id="name" />
                            @error('name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="email">
                                {{ __('Email') }}
                            </label>
                            <input type="email" name="email" value="{{ $user->email }}" disabled class="disabled:opacity-75 text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Email" id="email" />
                            @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <div class="flex flex-wrap -mx-3 mb-4">

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="password">
                                {{ __('Mot de passe') }}
                            </label>
                            <input type="password" name="password" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Mot de passe" id="password" />
                            @error('password') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-1" for="confirm_password">
                                {{ __('Confirmer Mot de passe') }}
                            </label>
                            <input type="password" name="password_confirmation" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-gray-500 focus:outline-none focus:transition-shadow" placeholder="Confirmer mot de passe" id="confirm_password" />
                            @error('password') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <div class="w-full mb-3">
                        <div class="flex justify-end items-center">
                            <button class="bg-gray-700 justify-self-end text-white py-2 px-5 rounded-md text-sm cursor-pointer mb-1">{{ __('Modifier')}}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>