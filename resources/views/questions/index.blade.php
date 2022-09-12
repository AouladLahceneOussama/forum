<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('questions.create') }} " class="px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer active:opacity-85 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gray-700 hover:border-slate-700 hover:bg-slate-700 hover:text-white">
                    {{ __('Nouvelle Question') }}
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <x-table>
                        <x-slot name="title">
                            {{ __('Tableau des questions') }} ({{ $count }})
                        </x-slot>
                        <x-slot name="thead">
                            <tr>
                                <th class="w-8 px-4 py-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Id') }}</th>
                                <th class="px-4 py-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Titre') }}</th>
                                <th class="px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Question') }}</th>
                                <th class="px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Reponses') }}</th>
                                <th class="px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Likes') }}</th>
                                <th class="px-4 py-2 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Ajouter le') }}</th>
                                <th class="w-8 px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Actions') }}</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @forelse($questions as $question)
                            <tr>
                                <td class="w-8 p-2 text-middle bg-transparent whitespace-nowrap shadow-transparent">
                                    <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ $question->id }}</p>
                                </td>
                                <td class="p-2 text-middle bg-transparent whitespace-nowrap shadow-transparent">
                                    <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ $question->title }}</p>
                                </td>
                                <td class="p-2 text-center bg-transparent whitespace-nowrap shadow-transparent">
                                    <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ substr($question->question, 0, 50); }}...</p>
                                </td>
                                <td class="p-2 text-center bg-transparent whitespace-nowrap shadow-transparent">
                                    <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ $question->responses()->count() }}</p>
                                </td>
                                <td class="p-2 text-center bg-transparent whitespace-nowrap shadow-transparent">
                                    <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ $question->likes()->count() }}</p>
                                </td>
                                <td class="p-2 text-right bg-transparent whitespace-nowrap shadow-transparent">
                                    <span class="px-2 font-semibold leading-tight text-xs text-slate-700">{{ $question->created_at->diffForHumans() }}</span>
                                </td>
                                <td class="w-8 p-2 text-center align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('responses.show', $question->id) }}"><i class="fa-solid fa-eye text-indigo-500 p-1 cursor-pointer text-xs"></i></a>

                                        <a href="{{ route('questions.update', $question->id) }}"><i class="fa-solid fa-pen text-green-500 p-1 cursor-pointer text-xs"></i></a>
                                        <form method="post" action="{{ route('questions.delete', $question->id) }}">
                                            @csrf
                                            <button onclick="return confirm('Etes-vous sur de supprimer cette element?')"><i class="fa-solid fa-trash text-red-500 p-1 cursor-pointer text-xs"></i></button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td dir="rtl" colspan="7" class="border-b pb-2">
                                    <span class="text-xs">Question</span>
                                    <p class="font-semibold text-black">{{ $question->question }}</p>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    {{ __('Tableu des Questions est vide')}}
                                </td>
                            </tr>
                            @endforelse
                        </x-slot>
                    </x-table>
                    <div class="mb-8 ">
                        {{ $questions->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>