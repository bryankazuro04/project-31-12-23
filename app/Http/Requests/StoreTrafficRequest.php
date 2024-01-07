<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreTrafficRequest extends FormRequest
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
            'kunjungan_kapal' => 'nullable|numeric',
            'jumlah_bongkar_muat' => 'nullable|numeric',
            'grt' => 'nullable|numeric',
            'loa' => 'nullable|decimal:2|numeric',
            'created_at' => 'date'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return back()->with([
            'message' => 'Traffic data failed to add!',
            'alert-type' => 'danger',
            'color' => 'red',
            'icon' => '<i class="fa-solid fa-warning w-6 h-6"></i>',
        ]);
    }
}