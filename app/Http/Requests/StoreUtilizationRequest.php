<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreUtilizationRequest extends FormRequest
{
    /**
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
            'bor' => 'nullable|numeric|decimal:2',
            'btp' => 'nullable|numeric|decimal:2',
            'yor' => 'nullable|numeric|decimal:2',
            'ytp' => 'nullable|numeric|decimal:2',
            'sor' => 'nullable|numeric|decimal:2',
            'stp' => 'nullable|numeric|decimal:2',
            'tanggal' => 'date'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return back()->with([
            'message' => 'Utilization data failed to add!',
            'alert-type' => 'danger',
            'color' => 'red',
            'icon' => '<i class="fa-solid fa-warning w-6 h-6"></i>',
        ]);
    }
}