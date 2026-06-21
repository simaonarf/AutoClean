<?php

namespace App\Http\Requests\Admin;

use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\Entry;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'owner_name' => 'required|string|max:255',
            'owner_email' => 'nullable|email',
            'owner_phone' => 'required|string|max:20',
            
            'vehicle_brand' => 'required|string|max:100',
            'vehicle_model' => 'required|string|max:100',
            'vehicle_year' => 'required|integer',
            'vehicle_color' => 'required|string|max:50',

            'status' => 'required|string|in:aguardando,em andamento,concluido,entregue',
            
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
            
            'total_value' => 'required|numeric|min:0',
            'entry_date' => 'required|date',
            'estimated_delivery' => 'nullable|date|after_or_equal:entry_date',
            ];
        
    }
}