<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'ISBN'=>'required|string|max:13',
            'name'=>'required|string|max:25',
            'author'=>'required|string|max:50',
            'description'=>'nullable|string|',
            'genre_id'=>'nullable|exists:genres,id',
            'tags' => ['nullable', 'exists:tags,id'],
            

        ];
    }

    public function messages() {
        return [
            'ISBN.required'=> 'Il codice ISBN non può essere vuoto',
            'ISBN.string'=> 'Il codice ISBN deve essere una stringa',
            'ISBN.max'=> 'Il codice ISBN deve essere al massimo di 13 caratteri',

            'name.required'=> 'Il titolo non può essere vuoto',
            'name.string'=> 'Il titolo deve essere una stringa',
            'name.max'=> 'Il titolo deve essere al massimo di 25 caratteri',


            'description.string'=> 'La descrizione deve essere una stringa',            

            'author.required'=> 'L\'autore non deve essere vuoto',
            'author.string'=> 'L\'autore deve essere una stringa',
            'author.max'=> 'L\'autore deve essere al massimo di 50 caratteri',
            'genre_id.exists'=> 'Il genere deve essere inserito',

            'tags.exists' => 'I tags inseriti non sono validi',



        ] ;
    }
}