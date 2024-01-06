<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUtilizationRequest extends FormRequest
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
            'bor' => 'required|numeric',
            'btp' => 'required|numeric',
            'yor' => 'required|numeric',
            'ytp' => 'required|numeric',
            'sor' => 'required|numeric',
            'stp' => 'required|numeric'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return back()->with([
            'message' => 'Utilization data failed to change!',
            'alert-type' => 'danger',
            'color' => 'red',
            'icon' => '<i class="fa-solid fa-warning w-6 h-6"></i>',
        ]);
    }
}