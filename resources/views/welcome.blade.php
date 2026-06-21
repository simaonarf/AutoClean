@extends('layouts.public')

@section('content')
    <h1 class="title-font text-center text-4xl font-bold">{{ env('APP_NAME') }}
        <section class="body-font bg-gray-900 text-gray-400">
            <div class="container mx-auto flex flex-col items-center justify-center px-5 py-14">
                <img class="w- mb-8 rounded object-cover object-center md:w-3/6 lg:w-2/6" alt="hero"
                    src="{{ asset('images/sysLogo.png') }}">
                <div class="w-full text-center lg:w-2/3">
                    <h1 class="title-font mb-8 text-3xl font-medium text-white sm:text-4xl">Estética automotiva</h1>
                    <div class="flex justify-center">
                        <a href="{{ route('admin.subjects.create') }}">
                            <button
                                class="inline-flex cursor-pointer rounded border-0 bg-blue-500 px-6 py-2 text-lg text-white hover:bg-blue-600 focus:outline-none">
                                Novo
                            </button>
                        </a>

                        <a href="{{ route('admin.subjects.index') }}">
                            <button
                                class="ml-4 inline-flex cursor-pointer rounded border-0 bg-gray-800 px-6 py-2 text-lg text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none">
                                Atendimentos
                            </button>
                        </a>

                    </div>
                </div>
            </div>
        </section>
    @endsection
