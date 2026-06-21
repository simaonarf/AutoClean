<header class="body-font text-gray-600">
    <div class="container mx-auto flex flex-col flex-wrap items-center p-5 md:flex-row">
        <nav class="flex flex-wrap items-center text-base text-amber-50 md:ml-auto lg:w-2/5">
            <a class="mr-5 hover:text-gray-400" href="#">Agenda</a>
            <a class="mr-5 hover:text-gray-400" href="{{ route('admin.subjects.index') }}">Atendimento</a>
            <a class="mr-5 hover:text-gray-400" href="{{ route('admin.subjects.create') }}">
                Criação
            </a>
        </nav>
        <a
            class="lg:order-0 title-font order-first mb-4 flex items-center font-medium text-gray-900 md:mb-0 lg:w-1/5 lg:items-center lg:justify-center">
            {{--             <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" class="h-10 w-10 rounded-full bg-indigo-500 p-2 text-white"
                viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg> --}}
            <img src="{{ asset('images/sysLogo.png') }}" alt="Loooggggoo" class="w-25">
            <span class="ml-3 text-xl text-white">AC</span>
        </a>
        <div class="ml-5 inline-flex lg:ml-0 lg:w-2/5 lg:justify-end">
            <form action="{{ route('logout') }}" method="post">

                <button
                    class="mt-4 inline-flex cursor-pointer items-center rounded border-0 bg-amber-50 px-3 py-1 text-base hover:bg-gray-200 focus:outline-none md:mt-0">
                    Logout
                    <svg class="ml-1" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M160 256a16 16 0 0 1 16-16h144V136c0-32-33.79-56-64-56H104a56.06 56.06 0 0 0-56 56v240a56.06 56.06 0 0 0 56 56h160a56.06 56.06 0 0 0 56-56V272H176a16 16 0 0 1-16-16zm299.31-11.31-80-80a16 16 0 0 0-22.62 22.62L409.37 240H320v32h89.37l-52.68 52.69a16 16 0 1 0 22.62 22.62l80-80a16 16 0 0 0 0-22.62z">
                        </path>
                    </svg>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    {{--  line-divider --}}
    <div class="w-full border-t border-gray-500 p-2 pt-4 text-center"></div>
</header>
