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
            'title'=>'required|min:3|max:100',
            'description'=>'required',
            'thumb'=>'required|min:3|max:255',
            'price'=>'required|min:1|max:10',
            'series'=>'required|min:3|max:100',
            'sale_date'=>'required|date',
            'type'=>'required|min:3|max:50'
        ];
    }

    public function messages() {
        return[
            'title.required'=>"Il titolo è un campo obbligatorio",
            'title.min'=>"Il titolo non può essere più corto di :min caratteri",
            'title.max'=>"Il titolo non può essere più lungo di :max caratteri",
            'description.required'=>"La descrizione è un campo obbligatorio",
            'thumb.required'=>"L'url è un campo obbligatorio",
            'thumb.min'=>"L'url non può essere più corto di :min caratteri",
            'thumb.max'=>"L'url non può essere più lungo di :max caratteri",
            'price.required'=>"Il prezzo è un campo obbligatorio",
            'price.min'=>"Il prezzo non può essere più corto di :min caratteri",
            'price.max'=>"Il prezzo non può essere più lungo di :max caratteri",
            'series.required'=>"La serie è un campo obbligatorio",
            'series.min'=>"La serie non può essere più corto di :min caratteri",
            'series.max'=>"La serie non può essere più lungo di :max caratteri",
            'sale_date.required'=>"La data di uscita è un campo obbligatorio",
            'sale_date.date'=>"Il campo deve essere compilato nel formato sopra descritto",
            'type.required'=>"La tipologia è un campo obbligatorio",
            'type.min'=>"La tipologia non può essere più corto di :min caratteri",
            'type.max'=>"La tipologia non può essere più lungo di :max caratteri",
        ];
    }
}
