@if (session('success'))
    <div class="mt-8 w-fit">
        <div class="flex h-fit items-center rounded-lg border border-gray-200 bg-green-200 p-4">
            <div class="">

                <div class="text-md font-semibold text-green-700">
                    {{ session('success') }}
                </div>
            </div>
        </div>
@endif

@if (session('error'))
    <div class="mt-8 w-fit">
        <div class="flex h-fit items-center rounded-lg border border-gray-200 bg-red-200 p-4">
            <div class="">

                <div class="text-md font-semibold text-red-700">
                    {{ session('error') }}
                </div>
            </div>
        </div>
@endif
