<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Foundation\Http\FormRequest;

class AssignRoomRequest extends FormRequest
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
            'type'         => 'required|string|in:Estándar,Junior,Suite',
            'accommodation'=> 'required|string|in:Sencilla,Doble,Triple,Cuádruple',
            'quantity'     => 'required|integer|min:1',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $hotel = $this->route('hotel'); // Route model binding

            // Validación 1: compatibilidad tipo-acomodación
            $rules = [
                'Estándar' => ['Sencilla', 'Doble'],
                'Junior' => ['Triple', 'Cuádruple'],
                'Suite' => ['Sencilla', 'Doble', 'Triple'],
            ];

            $type = $this->input('type');
            $accommodation = $this->input('accommodation');

            if (!in_array($accommodation, $rules[$type] ?? [])) {
                $validator->errors()->add('accommodation', 'La acomodación no es válida para este tipo de habitación.');
            }

            // Validación 2 y 3 en el Service
        });
    }
}
