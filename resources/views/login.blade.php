@include('shared.head')
<div class="bg-gray-900">
    <div class="container mx-auto flex min-h-screen items-center justify-center">
        <div class="relative flex w-full flex-col rounded-lg bg-gray-700 p-8 shadow-md md:w-1/2 lg:w-1/3">
            <h2 class="title-font mb-1 text-lg font-medium text-white">Login</h2>
            <p class="mb-5 leading-relaxed text-gray-400">Acesse sua conta para continuar</p>
            <form method="POST" action="{{ route('authenticate') }}">

                @csrf

                <div class="relative mb-4">
                    <label for="email" class="text-sm leading-7 text-gray-400">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full rounded border border-gray-700 bg-gray-800 px-3 py-1 text-base leading-8 text-gray-100 outline-none transition-colors duration-200 ease-in-out focus:border-blue-500 focus:ring-2 focus:ring-blue-900">
                </div>

                @error('email')
                    <p class="text-md font-semibold text-red-700">{{ $message }}</p>
                @enderror

                <div class="relative mb-4">
                    <label for="password" class="text-sm leading-7 text-gray-400">Senha</label>
                    <input type="password" id="password" name="password"
                        class="w-full rounded border border-gray-700 bg-gray-800 px-3 py-1 text-base leading-8 text-gray-100 outline-none transition-colors duration-200 ease-in-out focus:border-blue-500 focus:ring-2 focus:ring-blue-900">
                </div>


                @error('password')
                    <p class="text-md font-semibold text-red-700">{{ $message }}</p>
                @enderror

                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="rounded border-0 bg-blue-500 px-6 py-2 text-center text-lg text-white hover:bg-blue-600 focus:outline-none">Entrar</button>
                </div>

                <p class="mt-3 text-center text-xs text-gray-400 text-opacity-90">Esqueceu sua senha? <a href="#"
                        class="text-blue-500 hover:text-blue-400">Clique aqui.</a></p>

            </form>

            <x-flash />
        </div>
    </div>
