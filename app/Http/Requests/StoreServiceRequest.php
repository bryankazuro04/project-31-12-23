<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'waiting_time_pilot' => 'nullable|numeric|decimal:2',
            'waiting_time_dermaga' => 'nullable|numeric|decimal:2',
            'wt_gross' => 'nullable|numeric|decimal:2',
            'postpone_time' => 'nullable|numeric|decimal:2',
            'approach_time' => 'nullable|numeric|decimal:2',
            'tanggal' => 'date'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return back()->with([
            'message' => 'Service data failed to add!',
            'alert-type' => 'danger',
            'color' => 'red',
            'icon' => '<i class="fa-solid fa-warning w-6 h-6"></i>',
        ]);
    }
}