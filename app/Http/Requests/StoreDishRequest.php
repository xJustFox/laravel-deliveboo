<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'genre_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'visible' => 'required|boolean',
            'image' => 'nullable|string',
        ];
    }

    public function messages(){
        return[
            'genre_id.required' => 'Il campo genere è obbligatorio.',
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.max' => 'Il campo nome non può superare i 100 caratteri.',
            'description.required' => 'Il campo descrizione è obbligatorio.',
            'price.required' => 'Il campo prezzo è obbligatorio.',
            'price.numeric' => 'Il prezzo deve essere un valore numerico.',
            'price.min' => 'Il prezzo non può essere inferiore a 0€',
            'visible.required' => 'Il campo visibile è obbligatorio.',
            'visible.boolean' => 'Il campo visibile deve essere di tipo booleano.',
        ];
    }
}
