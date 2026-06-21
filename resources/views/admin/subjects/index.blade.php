@section('title', 'AC - Atendimentos')

@extends('layouts.admin')

@section('content')

    <body class="container flex flex-col bg-gray-900 px-5 py-24 text-gray-400">

        <h1 class="title-font mb-5 text-2xl font-medium text-white">Carros Cadastrados</h1>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-300">
                <thead class="bg-gray-700 bg-opacity-50 text-xs uppercase text-blue-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Cliente / Contato</th>
                        <th scope="col" class="px-6 py-3">Veículo</th>
                        <th scope="col" class="px-6 py-3">Serviços Solicitados</th>
                        <th scope="col" class="px-6 py-3">Data Entrada / Previsão</th>
                        <th scope="col" class="px-6 py-3">Valor Total</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-700">
                    @forelse ($subjects as $entry)
                        <tr class="transition-colors duration-150 hover:bg-gray-700 hover:bg-opacity-20">
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-100">{{ $entry->vehicle->owner->name ?? 'N/A' }}</div>
                                <div class="text-xs text-gray-400">{{ $entry->vehicle->owner->phone ?? '' }}</div>
                            </td>

                            <td class="px-6 py-4">
                                <a href="{{ route('admin.subjects.edit', $entry->id) }}">

                                    <div class="font-semibold text-blue-200">{{ $entry->vehicle->brand }}
                                        {{ $entry->vehicle->model }}</div>
                                    <div class="text-xs text-gray-400">{{ $entry->vehicle->color }} •
                                        {{ $entry->vehicle->year }}</div>
                                </a>

                            </td>

                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @forelse($entry->services as $service)
                                        <span
                                            class="inline-block rounded border border-blue-800 bg-blue-900 bg-opacity-40 px-2 py-0.5 text-xs text-blue-300">
                                            {{ $service->name }}
                                        </span>
                                    @empty
                                        <span class="text-xs italic text-gray-500">Nenhum serviço</span>
                                    @endforelse
                                </div>
                            </td>

                            <td class="px-6 py-4 text-xs">
                                <div><span class="text-gray-400">Entrada:</span>
                                    {{ $entry->entry_date->format('d/m/Y H:i') }}</div>
                                @if ($entry->estimated_delivery)
                                    <div class="mt-0.5"><span class="text-gray-400">Previsão:</span>
                                        {{ $entry->estimated_delivery->format('d/m/Y H:i') }}</div>
                                @else
                                    <div class="mt-0.5 italic text-gray-500">Sem previsão</div>
                                @endif
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-100">
                                R$ {{ number_format($entry->total_value, 2, ',', '.') }}
                            </td>

                            <td class="px-6 py-4">
                                @php
                                    $statusClasses = match ($entry->status) {
                                        'aguardando' => 'bg-yellow-900 bg-opacity-30 text-yellow-400 border-yellow-800',
                                        'em andamento' => 'bg-blue-950 bg-opacity-40 text-blue-400 border-blue-900',
                                        'concluido' => 'bg-green-900 bg-opacity-30 text-green-400 border-green-800',
                                        'entregue' => 'bg-gray-700 bg-opacity-30 text-gray-400 border-gray-600',
                                        default => 'bg-gray-800 text-gray-400 border-gray-700',
                                    };
                                @endphp
                                <span
                                    class="{{ $statusClasses }} inline-block rounded border px-2 py-1 text-[10px] font-semibold uppercase tracking-wider">
                                    {{ $entry->status }}
                                </span>
                            </td>

                            <td class="text-center">
                                <form action="{{ route('admin.subjects.destroy', $entry->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir esta entrada? Essa ação não pode ser desfeita.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="rounded border border-red-500 px-3 py-1 text-xs font-semibold text-red-400 transition-colors hover:bg-red-500 hover:text-white">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                                            <path
                                                d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z">
                                            </path>
                                        </svg>
                            </td>

                            </button>
                            </form>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center italic text-gray-500">
                                Nenhum registro de entrada encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if (method_exists($subjects, 'links'))
            <div class="mt-6">
                {{ $subjects->links() }}
            </div>
        @endif

        <x-flash />


    </body>
@endsection

</html>
