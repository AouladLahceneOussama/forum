<x-guest-layout>
    <header>
        <nav class="navbar navbar-expand-lg shadow-md py-2 bg-white relative flex items-center w-full justify-between">
            <div class="px-6 w-full flex flex-wrap items-center justify-between">
                <div class="w-full flex justify-end items-center">
                    <img src="{{ Vite::asset('resources/img/logo_ar.png') }}" alt="Logo" class="w-32">
                </div>
            </div>
        </nav>
    </header>
    <section class="px-4 md:px-0 pt-8 pb-8">
        <div class="w-full flex justify-center items-start flex-wrap">
            @forelse($questions as $question)
            <livewire:response-card :question="$question" :wire:key="$question->id"/>
            @empty
            <div>
                No Questions Shared Yet.
            </div>
            @endforelse
        </div>

    </section>

</x-guest-layout>