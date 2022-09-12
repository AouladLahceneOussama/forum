<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <x-table>
        <x-slot name="title">
            {{ __('Tableau des reponses sur commentaire') }} ({{ count($replies) }})
        </x-slot>
        <x-slot name="thead">
            <tr>
                <th class="w-8 px-4 py-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Id') }}</th>
                <th class="px-4 py-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Repondu_par') }}</th>
                <th class="px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Reponse') }}</th>
                <th class="px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Likes / Dislikes') }}</th>
                <th class="px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Reponses') }}</th>
                <th class="px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Commente_le') }}</th>
                <th class="px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Publiee') }}</th>
                <th class="w-8 px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Actions') }}</th>
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @forelse($replies as $reply)
            <tr>
                <td class="w-8 p-2 text-middle bg-transparent whitespace-nowrap shadow-transparent">
                    <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ $reply->id }}</p>
                </td>
                <td class="p-2 text-left bg-transparent whitespace-nowrap shadow-transparent">
                    <div>
                        <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ $reply->name }}</p>
                        <span class="px-2 text-xs text-gray-400">{{ $reply->email }}</span>
                    </div>
                </td>
                <td class="p-2 text-center bg-transparent whitespace-nowrap shadow-transparent">
                    <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ substr($reply->response, 0 ,50) }}...</p>
                </td>
                <td class="p-2 text-center bg-transparent whitespace-nowrap shadow-transparent">
                    <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ $reply->likeInteraction($reply, 'likes')->count() }} / {{ $reply->likeInteraction($reply, 'dislikes')->count() }}</p>
                </td>
                <td class="p-2 text-center bg-transparent whitespace-nowrap shadow-transparent">
                    <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ count($reply->replies($reply)) }}</p>
                </td>
                <td class="p-2 text-center bg-transparent whitespace-nowrap shadow-transparent">
                    <span class="px-2 font-semibold leading-tight text-xs text-slate-700">{{ $reply->created_at->diffForHumans() }}</span>
                </td>
                
                <td class="p-2 text-center bg-transparent whitespace-nowrap shadow-transparent">
                    <span class="px-4 font-semibold leading-tight text-xs text-slate-700 rounded-md {{ $reply->validated ? 'bg-green-300' : 'bg-gray-300' }}">{{ $reply->validated ? 'Oui' : 'Non' }}</span>
                </td>
                <td class="w-8 p-2 text-center align-middle bg-transparent whitespace-nowrap shadow-transparent">
                    <div class="flex justify-center items-center">
                        @if(count($reply->replies($reply)) > 0)
                        <a href="{{ route('responses.replies', [$reply->question_id, $reply->id] )}}">
                            <i class="fa-solid fa-eye text-indigo-500 p-1 cursor-pointer text-xs"></i>
                        </a>
                        @endif
                        <button wire:click.prevent="validateResponse({{ $reply->question_id }}, {{ $reply->id }})">
                            <i class="fa-solid fa-circle-check text-green-500 p-1 cursor-pointer text-xs"></i>
                        </button>
                        <button wire:click.prevent="ignoreResponse({{ $reply->question_id }}, {{ $reply->id }})">
                            <i class="fa-solid fa-circle-xmark text-red-500 p-1 cursor-pointer text-xs"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <tr>
                <td dir="rtl" colspan="8" class="border-b pb-2">
                    <span class="text-xs">Response</span>
                    <p class="font-semibold text-black"> {{ $reply->response }}</p>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4">
                    {{ __('Tableau des Reponses est vide')}}
                </td>
            </tr>
            @endforelse
        </x-slot>
    </x-table>

</div>