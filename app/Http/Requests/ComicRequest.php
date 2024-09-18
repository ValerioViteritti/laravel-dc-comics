<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // di default è false, bisogna modificarlo in true
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
            'title' =>'required|min:3|max:50',
            'thumb' =>'required|min:8|max:255',
            'type' =>'required|min:3|max:20',
            'price' =>'required|min:3|max:10',
            'series' =>'required|min:3|max:100',
            'sale_date' =>'required',
            'description' =>'required|min:3|max:1000'
        ];
    }

    // questa funzione si deve chiamare messages
    public function messages(){
        
        return [
            'title.required' => "Il titolo è un campo obbligatorio",
            'title.min' => "Il titolo deve contenere almeno :min caratteri",
            'title.max' => "Il titolo deve avere massimo :max caratteri",
            'thumb.required' => "L'immagine è un campo obbligatorio",
            'thumb.min' => "L'immagine deve contenere almeno :min caratteri",
            'thumb.max' => "L'immagine deve avere massimo :max caratteri",
            'type.required' => "Il tipo è un campo obbligatorio",
            'type.min' => "Il tipo deve contenere almeno :min caratteri",
            'type.max' => "Il tipo deve avere massimo :max caratteri",
            'price.required' => "Il prezzo è un campo obbligatorio",
            'price.min' => "Il prezzo deve contenere almeno :min caratteri",
            'price.max' => "Il prezzo deve avere massimo :max caratteri",
            'series.required' => "La serie è un campo obbligatorio",
            'series.min' => "La serie deve contenere almeno :min caratteri",
            'series.max' => "La serie deve avere massimo :max caratteri",
            'sale_date.required' => "La data è un campo obbligatorio",
            'description.required' => "La descrizione è un campo obbligatorio",
            'description.min' => "La descrizione deve contenere almeno :min caratteri",
            'description.max' => "La descrizione deve avere massimo :max caratteri"
    ];

        


    }
}
