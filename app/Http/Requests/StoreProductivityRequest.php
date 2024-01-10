<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductivityRequest extends FormRequest
{
    /**w
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'general_cargo' => 'nullable|numeric|decimal:2',
            'bag_cargo' => "nullable|numeric|decimal:2",
            'unitized' => 'nullable|numeric|decimal:2',
            'truck_lossing' => 'nullable|numeric|decimal:2',
            'pipa_lossing' => 'nullable|numeric|decimal:2',
            'tanggal' => 'date'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return back()->with([
            'message' => 'Productivity data failed to add!',
            'alert-type' => 'danger',
            'color' => 'red',
            'icon' => '<i class="fa-solid fa-warning w-6 h-6"></i>',
        ]);
    }
}