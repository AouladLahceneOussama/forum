<x-guest-layout>
    <header>

        <nav x-data="{ open: false }" class="navbar navbar-expand-lg shadow-md py-2 bg-white">
            <!-- Primary Navigation Menu -->
            <div class="px-6 w-full flex flex-row-reverse justify-between items-center">
                <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="Logo" class="w-32">

                <ul class="hidden md:flex flex-row-reverse justify-center items-center space-x-6">
                    <li class="font-semibold ml-6 text-sm hover:text-blue-500 ease-in-out duration-150"><a href="https://jil.menassat.org/a-propos"> من نحن ؟ </a></li>
                    <li class="font-semibold ml-3 text-sm hover:text-blue-500 ease-in-out duration-150"><a href="https://jil.menassat.org/news"> أخبار </a></li>
                    <li class="font-semibold ml-3 text-sm hover:text-blue-500 ease-in-out duration-150"><a href="https://jil.menassat.org/articles"> مقالات </a></li>
                    <li class="font-semibold ml-3 text-sm hover:text-blue-500 ease-in-out duration-150"><a href="https://jil.menassat.org/presse"> في الإعلام </a></li>
                    <li class="font-semibold ml-3 text-sm hover:text-blue-500 ease-in-out duration-150"><a href="https://jil.menassat.org/gallerie"> صور </a></li>
                    <li class="font-semibold ml-3 text-sm hover:text-blue-500 ease-in-out duration-150"><a href="https://www.youtube.com/channel/UC6-jqxpgFMRlT96VXwEz6xQ"> فيديوهات </a></li>
                    <li class="font-semibold ml-3 text-sm hover:text-blue-500 ease-in-out duration-150"><a href="https://jil.menassat.org/witness"> شهادات</a></li>
                    <li class="font-semibold ml-3 text-sm hover:text-blue-500 ease-in-out duration-150"><a href="http://forum.menassat.org/"> منتدى</a></li>
                </ul>

                <!-- The lang dropdown -->
                <div x-data="{ dropdownOpen: false}" class="relative ml-4 flex justify-center items-center space-x-2">
                    <div @click="open = ! open" class="md:hidden border-2 border-gray-300 px-2 py-1 rounded-lg cursor-pointer">
                        <i class="fa-solid fa-bars text-gray-500"></i>
                    </div>

                    <div>
                        <button @click="dropdownOpen = !dropdownOpen" class="relative outline-none">
                            <i class="fas fa-language text-blue-800 text-3xl hover:text-blue-900 transition duration-300 ease-in-out"></i>
                        </button>

                        <div x-show="dropdownOpen" x-transition="" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>

                        <div x-show="dropdownOpen" x-transition="" class="absolute right-0 mt-2 w-16 text-center bg-white rounded-md overflow-hidden shadow-xl z-20" style="display: none;">

                            @foreach (Config::get('lang') as $lang => $language)
                            @if ($lang != App::getLocale())
                            <a class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200 uppercase cursor-pointer" href="{{ route('lang.switch', $lang) }}"> {{$lang}} </a>
                            @endif
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden py-4">
                <ul class="w-full text-right px-8 space-y-4">
                    <a href="https://jil.menassat.org/a-propos" class="">
                        <li class="w-full font-semibold text-sm py-4 px-2 border-b-2 hover:bg-blue-50 duration-150 ease-in-out border-blue-100">من نحن ؟ </li>
                    </a>
                    <a href="https://jil.menassat.org/news">
                        <li class="w-full font-semibold text-sm py-4 px-2 border-b-2 hover:bg-blue-50 duration-150 ease-in-out border-blue-100"> أخبار </li>
                    </a>
                    <a href="https://jil.menassat.org/articles">
                        <li class="w-full font-semibold text-sm py-4 px-2 border-b-2 hover:bg-blue-50 duration-150 ease-in-out border-blue-100"> مقالات </li>
                    </a>
                    <a href="https://jil.menassat.org/presse">
                        <li class="w-full font-semibold text-sm py-4 px-2 border-b-2 hover:bg-blue-50 duration-150 ease-in-out border-blue-100"> في الإعلام </li>
                    </a>
                    <a href="https://jil.menassat.org/gallerie">
                        <li class="w-full font-semibold text-sm py-4 px-2 border-b-2 hover:bg-blue-50 duration-150 ease-in-out border-blue-100"> صور </li>
                    </a>
                    <a href="https://www.youtube.com/channel/UC6-jqxpgFMRlT96VXwEz6xQ">
                        <li class="w-full font-semibold text-sm py-4 px-2 border-b-2 hover:bg-blue-50 duration-150 ease-in-out border-blue-100"> فيديوهات </li>
                    </a>
                    <a href="https://jil.menassat.org/witness">
                        <li class="w-full font-semibold text-sm py-4 px-2 border-b-2 hover:bg-blue-50 duration-150 ease-in-out border-blue-100"> شهادات</li>
                    </a>
                    <a href="http://forum.menassat.org/">
                        <li class="w-full font-semibold text-sm py-4 px-2 hover:bg-blue-50 duration-150 ease-in-out">منتدى</li>
                    </a>
                </ul>

            </div>

        </nav>
    </header>

    <section class="pb-8" id="#bg" style=" background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7)),url('/img/bg1.jpg'); 
             background-size: cover; background-attachment: fixed;">
        <div class="relative w-full h-52 flex justify-center items-center text-white bg-blue-700 shadow-blue-500/50 shadow-lg mb-4 rounded-b-3xl" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url('/img/bg-q.png');">
            <marquee direction="right" class="w-2/3 md:w-1/2 bg-transparent text-5xl md:text-7xl py-4">منتدى جيل : فضاء للنقاش والحوار</marquee>
        </div>
        <div dir="rtl" class="w-full text-black bg-white -my-12 rounded-xl pt-20 p-8 mb-10">
            <p class="font-semibold mb-2 pb-2 border-b-2 border-gray-100"> لماذا منتدى جيل؟ </p>
            <p class="leading-loose">
                استكمالا للنقاش والحوار الذي تدشنه
                فعاليات برنامج جيل، يأتي إطلاق منتدى جيل للنقاش والحوار إيمانا منا بإن غياب الحوار من المجتمع يعني غياب الحرية،
                والانسيابية في التعبير عن الأفكار والآراء ودليل على تحكم الرأي الواحد، ومصادرة الفكر والثقافة، وسيادة للإقصاء.
                ولعل من سمات المجتمع السليم أن يكون فيه تفاعلات، وتموجات وحراك اجتماعي وثقافي، وحركة دؤوبة نحو البناء والتقدم
                ، وإن من أهم الركائز التي ينبني عليها هذا المجتمع: ركيزتي الحوار والنقاش. وإذا نرحب بكل المواقف والآراء مهما كانت،
                نعلن أن القواعد السليمة للنقاش تقتضي الترفع عن كل أشكال التمييز سواء كانت فكرية، دينية، أوجنسية ...إلخ..
            </p>
        </div>

        <div class="w-full mt-10 px-4 md:px-10">
            @forelse($questions as $question)
            <livewire:response-card :question="$question" :wire:key="$question->id" />
            @empty
            <div>
                {{ __('There is no questions shared for the moment') }}.
            </div>
            @endforelse
        </div>

    </section>

</x-guest-layout>