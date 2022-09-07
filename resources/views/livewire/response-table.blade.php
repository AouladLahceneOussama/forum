<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <x-table>
        <x-slot name="title">
            {{ __('Tableau des reponses') }} ({{ count($responses) }})
        </x-slot>
        <x-slot name="thead">
            <tr>
                <th class="w-8 px-4 py-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Id') }}</th>
                <th class="px-4 py-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Repondu_par') }}</th>
                <th class="px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Response') }}</th>
                <th class="px-4 py-2 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Commente_le') }}</th>
                <th class="px-4 py-2 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Publiee') }}</th>
                <th class="w-8 px-4 py-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">{{ __('Actions') }}</th>
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @forelse($responses as $response)
            <tr>
                <td class="w-8 p-2 text-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ $response->id }}</p>
                </td>
                <td class="p-2 text-left bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <div>
                        <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ $response->name }}</p>
                        <span class="px-2 text-xs text-gray-400">{{ $response->email }}</span>
                    </div>
                </td>
                <td class="p-2 text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="px-2 mb-0 leading-tight text-xs text-slate-700">{{ $response->response }}</p>
                </td>
                <td class="p-2 text-right bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="px-2 font-semibold leading-tight text-xs text-slate-700">{{ $response->created_at->diffForHumans() }}</span>
                </td>

                <td class="w-8 p-2 text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="px-4 font-semibold leading-tight text-xs text-slate-700 rounded-md {{ $response->validated ? 'bg-green-300' : 'bg-gray-300' }}">{{ $response->validated ? 'Oui' : 'Non' }}</span>
                </td>
                <td class="w-8 p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <div class="flex justify-center items-center">
                        <button wire:click.prevent="validateResponse({{ $response->id }})">
                            <i class="fa-solid fa-circle-check text-indigo-500 p-1 cursor-pointer text-xs"></i>
                        </button>
                        <button wire:click.prevent="ignoreResponse({{ $response->id }})">
                            <i class="fa-solid fa-circle-xmark text-red-500 p-1 cursor-pointer text-xs"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-4">
                    {{ __('Tableau des Reponses est vide')}}
                </td>
            </tr>
            @endforelse
        </x-slot>
    </x-table>

</div>