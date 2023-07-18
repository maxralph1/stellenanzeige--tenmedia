<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:companies|max:75',
            'beschreibung' => 'required|max:255',
            'telefon' => 'required|unique:companies|max:255',
            'benutzername' => 'required|unique:companies|max:255',
            'email' => 'required|unique:companies|email|max:255',
            'password' => 'required|password|max:255',
            'firma_logo_url' => 'mimes:jpg,bmp,png',
            'haus_number' => 'nullable',
            'strasse' => 'required|max:255',
            'stadteil' => 'required|max:255',
            'postleitzahl' => 'required|max:255',
            'stadt' => 'required|max:255',
            'land' => 'required|max:255',
            'webseite' => 'nullable',
            'facebook_url' => 'nullable',
            'linkedin_url' => 'nullable',
            'threads_url' => 'nullable',
            'twitter_url' => 'nullable',
            'xing_url' => 'nullable',
            'andere_social' => 'nullable',
            'andere_social_url' => 'nullable',
            'hinzugefügt_von_tenmedia' => 'nullable|boolean',
            'hinzugefügt_von' => 'nullable',
        ];
    }
}
