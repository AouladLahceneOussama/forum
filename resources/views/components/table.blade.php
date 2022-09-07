<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-4 mb-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>{{ $title }}</h6>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">

                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        {{ $thead }}
                    </thead>

                    <tbody>
                        {{ $tbody }}
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>