<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
            'name'       => 'sometimes|required|string|max:255',
            'address'    => 'sometimes|required|string|max:255',
            'city'       => 'sometimes|required|string|max:255',
            'nit'        => 'sometimes|required|string|max:30|unique:hotels,nit,' . $this->hotel->id,
            'max_rooms'  => 'sometimes|required|integer|min:1',
        ];
    }
}
