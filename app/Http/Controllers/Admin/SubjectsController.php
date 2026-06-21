<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubjectRequest;
use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\Entry;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Entry::with(['vehicle.owner', 'user', 'services'])->get();
        $test = Entry::all();

        return view('admin.subjects.index', compact('subjects','test'));
    }

    public function create()
    {
        $services = Service::all();

        return view('admin.subjects.create', compact('services'));
    }

    public function store(StoreSubjectRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::transaction(function () use ($validated) {
                
                $owner = Owner::firstOrCreate(
                    ['phone' => $validated['owner_phone']],
                    [
                        'name' => $validated['owner_name'],
                        'email' => $validated['owner_email'] ?? null,
                    ]
                );

                $vehicle = Vehicle::firstOrCreate([
                    'owner_id' => $owner->id,
                    'brand' => $validated['vehicle_brand'],
                    'model' => $validated['vehicle_model'],
                    'color' => $validated['vehicle_color'],
                    'year' => $validated['vehicle_year'],
                ]);

                $entry = Entry::create([
                    'vehicle_id' => $vehicle->id,
                    'user_id' => Auth::id(),
                    'entry_date' => $validated['entry_date'],
                    'estimated_delivery' => $validated['estimated_delivery'] ?? null,
                    'total_value' => $validated['total_value'],
                    'status' => 'aguardando',
                ]);

            if (!empty($validated['services'])) {
                
                $serviceIds = (array) $validated['services'];

                $selectedServices = Service::findMany($serviceIds);
                
                $servicesToSync = [];
                
                foreach ($selectedServices as $service) {
                    $servicesToSync[$service->id] = ['price' => $service->default_price];
                }

                $entry->services()->sync($servicesToSync); 
            }
            });

            return redirect()->route('admin.subjects.index')->with('success', 'Entrada registrada com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao registrar a entrada: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(Entry $subject)
    {
        $subject->load(['vehicle.owner', 'services']);

        $services = Service::all();
        $selectedServices = $subject->services->pluck('id')->toArray();

        return view('admin.subjects.edit', compact('subject', 'services', 'selectedServices'));
    }

    public function update(StoreSubjectRequest $request, string $id)
    {
        $validated = $request->validated();

        try {
            DB::transaction(function () use ($validated, $id) {
              
                $entry = Entry::findOrFail($id);
                
                $entry->update([
                    'entry_date' => $validated['entry_date'],
                    'estimated_delivery' => $validated['estimated_delivery'] ?? null,
                    'total_value' => $validated['total_value'],
                    'status' => $validated['status'],
                ]);

                $entry->vehicle->update([
                    'brand' => $validated['vehicle_brand'],
                    'model' => $validated['vehicle_model'],
                    'color' => $validated['vehicle_color'],
                    'year' => $validated['vehicle_year'],
                ]);

                $entry->vehicle->owner->update([
                    'name' => $validated['owner_name'],
                    'email' => $validated['owner_email'] ?? null,
                    'phone' => $validated['owner_phone'],
                ]);

                if (!empty($validated['services'])) {
                    $serviceIds = (array) $validated['services'];
                    $selectedServices = Service::findMany($serviceIds);
                    
                    $servicesToSync = [];
                    foreach ($selectedServices as $service) {
                        $servicesToSync[$service->id] = ['price' => $service->default_price];
                    }
                
                    $entry->services()->sync($servicesToSync); 
                } else {
                    $entry->services()->detach();
                }
            });

            return redirect()->route('admin.subjects.index')->with('success', 'Registro atualizado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao atualizar o registro: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            Entry::destroy($id);

            return redirect()->route('admin.subjects.index')
                ->with('success', 'Registro excluído com sucesso!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao excluir o registro: ' . $e->getMessage());
        }
    }
}