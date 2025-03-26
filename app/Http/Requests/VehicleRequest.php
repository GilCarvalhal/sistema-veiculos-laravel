<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'name' => 'required|string',
            'brand' => 'required',
            'vehicle_year' => 'required|integer',
            'kilometers' => 'required|integer',
            'city' => 'required',
            'type' => 'required',
            'price' => 'required|float',
            'description' => 'nullable',
            'image' => 'nullable',
            'contact_name' => 'required|string|min:3',
            'contact_phone' => 'required|string',
            'contact_mail' => 'required|email',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'O nome do veículo é obrigatório.',
            'name.string' => 'O nome do veículo precisa ser um texto.',

            'brand.required' => 'A marca do veículo é obrigatória.',

            'vehicle_year.required' => 'O ano do veículo é obrigatório.',
            'vehicle_year.integer' => 'O ano precisa ser um número.',

            'kilometers.required' => 'A kilometragem do veículo é obrigatória.',
            'kilometers.integer' => 'A kilometragem precisa ser um número.',

            'city.required' => 'A cidade do veículo é obrigatória.',

            'type.required' => 'O tipo do veículo é obrigatório.',

            'price.required' => 'O preço do veículo é obrigatório.',
            'price.float' => 'O preço precisa ser um número.',

            'image' => 'nullable.',

            'description' => 'nullable.',

            'contact_name.required' => 'O nome do vendedor é obrigatório.',
            'contact_name.string' => 'O nome do vendedor precisa ser um texto.',
            'contact_name.min' => 'O mínimo é 3 caracteres.',

            'contact_phone.required' => 'O telefone do vendedor é obrigatório.',
            'contact_phone.string' => 'O telefone do vendedor precisa ser um texto.',

            'contact_mail.required' => 'O e-mail do vendedor é obrigatório.',
            'contact_mail.email' => 'O e-mail do vendedor precisa ser válido.',
        ];
    }
}
