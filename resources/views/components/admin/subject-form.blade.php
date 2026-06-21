@props(['action', 'method' => 'POST', 'subject' => null, 'services' => [], 'selectedServices' => []])

<div class="rounded-md bg-gray-800 bg-opacity-50 p-10">
    <form method="POST" action="{{ $action }}">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif

        <div class="mb-4 flex">
            <a class="flex-initial border-b-2 border-blue-400 px-1 py-2 text-lg text-blue-400">Informações do
                proprietário</a>
        </div>

        <div class="grid grid-flow-col grid-rows-2 gap-4">
            <div>
                <label for="owner_name" class="mb-4 text-lg leading-7 text-gray-200">Nome</label>
                <input type="text" name="owner_name" id="owner_name" placeholder="Nome do proprietário(a)"
                    value="{{ old('owner_name', $subject?->vehicle?->owner?->name ?? '') }}"
                    class="mt-4 w-full rounded border border-gray-600 bg-gray-600 bg-opacity-20 px-3 py-1 text-sm leading-8 text-gray-100 outline-none focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-900">
                @error('owner_name')
                    <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="owner_email" class="mb-4 text-lg leading-7 text-gray-200">Email</label>
                <input type="email" name="owner_email" id="owner_email"
                    placeholder="Email do proprietário(a) (opcional)"
                    value="{{ old('owner_email', $subject?->vehicle?->owner?->email ?? '') }}"
                    class="mt-4 w-full rounded border border-gray-600 bg-gray-600 bg-opacity-20 px-3 py-1 text-sm leading-8 text-gray-100 outline-none focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-900">
                @error('owner_email')
                    <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="owner_phone" class="mb-4 text-lg leading-7 text-gray-200">Telefone</label>
                <input type="text" name="owner_phone" id="owner_phone" placeholder="Telefone do proprietário(a)"
                    value="{{ old('owner_phone', $subject?->vehicle?->owner?->phone ?? '') }}"
                    class="mt-4 w-full rounded border border-gray-600 bg-gray-600 bg-opacity-20 px-3 py-1 text-sm leading-8 text-gray-100 outline-none focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-900">
                @error('owner_phone')
                    <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <x-flash />

        <div class="mb-4 flex">
            <a class="mt-4 flex-initial border-b-2 border-blue-400 px-1 py-2 text-lg text-blue-400">Detalhes do
                Veículo</a>
        </div>

        <div class="grid grid-flow-col grid-rows-2 gap-4">
            <div>
                <label for="vehicle_brand" class="mb-4 text-lg leading-7 text-gray-200">Marca</label>
                <input type="text" name="vehicle_brand" id="vehicle_brand" placeholder="Ex: Ford, Chevrolet, Fiat"
                    value="{{ old('vehicle_brand', $subject?->vehicle?->brand ?? '') }}"
                    class="mt-4 w-full rounded border border-gray-600 bg-gray-600 bg-opacity-20 px-3 py-1 text-sm leading-8 text-gray-100 outline-none focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-900">
                @error('vehicle_brand')
                    <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="vehicle_model" class="mb-4 text-lg leading-7 text-gray-200">Modelo</label>
                <input type="text" name="vehicle_model" id="vehicle_model" placeholder="Ex: Focus, Tracker, Argo"
                    value="{{ old('vehicle_model', $subject?->vehicle?->model ?? '') }}"
                    class="mt-4 w-full rounded border border-gray-600 bg-gray-600 bg-opacity-20 px-3 py-1 text-sm leading-8 text-gray-100 outline-none focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-900">
                @error('vehicle_model')
                    <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="vehicle_year" class="mb-4 text-lg leading-7 text-gray-200">Ano</label>
                <input type="number" name="vehicle_year" id="vehicle_year" placeholder="Ex: 2020"
                    value="{{ old('vehicle_year', $subject?->vehicle?->year ?? '') }}"
                    class="mt-4 w-full rounded border border-gray-600 bg-gray-600 bg-opacity-20 px-3 py-1 text-sm leading-8 text-gray-100 outline-none focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-900">
                @error('vehicle_year')
                    <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="vehicle_color" class="mb-4 text-lg leading-7 text-gray-200">Cor</label>
                <input type="text" name="vehicle_color" id="vehicle_color" placeholder="Ex: Prata, Preto"
                    value="{{ old('vehicle_color', $subject?->vehicle?->color ?? '') }}"
                    class="mt-4 w-full rounded border border-gray-600 bg-gray-600 bg-opacity-20 px-3 py-1 text-sm leading-8 text-gray-100 outline-none focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-900">
                @error('vehicle_color')
                    <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4 flex">
            <a class="mt-4 flex-initial border-b-2 border-blue-400 px-1 py-2 text-lg text-blue-400">Status e
                Serviços</a>
        </div>

        <div class="grid grid-flow-col grid-rows-3 gap-4">
            <div>
                <label for="status" class="mb-4 text-lg leading-7 text-gray-200">Status do Serviço</label>
                <select name="status" id="status"
                    class="leading-8outline-none mt-4 w-full rounded border border-gray-600 bg-gray-600 bg-opacity-20 px-3 py-2 text-sm text-gray-200 focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-900">
                    <option value="aguardando" class="bg-gray-600"
                        {{ old('status', $subject?->status ?? 'aguardando') == 'aguardando' ? 'selected' : '' }}>
                        Aguardando</option>
                    <option value="em andamento" class="bg-gray-600"
                        {{ old('status', $subject?->status ?? '') == 'em andamento' ? 'selected' : '' }}>Em Andamento
                    </option>
                    <option value="concluido" class="bg-gray-600"
                        {{ old('status', $subject?->status ?? '') == 'concluido' ? 'selected' : '' }}>Concluído
                    </option>
                    <option value="entregue" class="bg-gray-600"
                        {{ old('status', $subject?->status ?? '') == 'entregue' ? 'selected' : '' }}>Entregue</option>
                </select>
                @error('select')
                    <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div class="row-span-3">
                <label for="services" class="mb-4 text-lg leading-7 text-gray-200">Serviços </label>
                <div class="mt-2 flex flex-col gap-2 rounded border border-gray-600 bg-gray-600 bg-opacity-20 p-4">

                    @foreach ($services as $service)
                        <label class="m-0 flex cursor-pointer items-center gap-3 py-1">

                            <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                class="h-4 w-4 rounded border-gray-600 bg-gray-700 text-blue-600 focus:ring-blue-500 focus:ring-offset-gray-800"
                                {{ in_array($service->id, old('services', $selectedServices ?? [])) ? 'checked' : '' }}>

                            <span class="text-sm font-medium text-gray-200">
                                {{ $service->name }} (R$ {{ number_format($service->default_price, 2, ',', '.') }})
                            </span>

                        </label>
                    @endforeach
                    @error('services')
                        <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="total_value" class="mb-4 text-lg leading-7 text-gray-200">Valor Cobrado (R$)</label>
                <input type="number" step="0.01" name="total_value" id="total_value" placeholder="Ex: 50.00"
                    value="{{ old('total_value', $subject?->total_value ?? '') }}"
                    class="mt-4 w-full rounded border border-gray-600 bg-gray-600 bg-opacity-20 px-3 py-1 text-sm leading-8 text-gray-100 outline-none focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-900">
                @error('total_value')
                    <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="entry_date" class="mb-4 text-lg leading-7 text-gray-200">Data e Hora de Entrada</label>
                <input type="datetime-local" name="entry_date" id="entry_date"
                    value="{{ old('entry_date', $subject?->entry_date ? $subject->entry_date->format('Y-m-d\TH:i') : '') }}"
                    class="mt-4 w-full rounded border border-gray-600 bg-gray-600 bg-opacity-20 px-3 py-1 text-sm leading-8 text-gray-100 outline-none focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-900">
                @error('entry_date')
                    <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="estimated_delivery" class="mb-4 text-lg leading-7 text-gray-200">Previsão de
                    Entrega</label>
                <input type="datetime-local" name="estimated_delivery" id="estimated_delivery"
                    value="{{ old('estimated_delivery', $subject?->estimated_delivery ? $subject->estimated_delivery->format('Y-m-d\TH:i') : '') }}"
                    class="mt-4 w-full rounded border border-gray-600 bg-gray-600 bg-opacity-20 px-3 py-1 text-sm leading-8 text-gray-100 outline-none focus:border-blue-500 focus:bg-transparent focus:ring-2 focus:ring-blue-900">
                @error('estimated_delivery')
                    <p class="text-md mt-1 font-semibold text-red-700">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit"
            class="text-md border-0mb {{ $subject ? 'bg-blue-500 hover:bg-yellow-600' : 'bg-blue-500 hover:bg-blue-600' }} mt-8 rounded px-6 py-2 font-semibold text-white focus:outline-none">
            {{ $subject ? 'Atualizar Registro' : 'Registrar Entrada' }}
        </button>
    </form>
</div>
