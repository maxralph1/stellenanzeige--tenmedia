<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'name' => 'nullable|max:75',
            'beschreibung' => 'nullable|max:255',
            'telefon' => 'nullable|max:255',
            'benutzername' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'password' => 'nullable|password|max:255',
            'firma_logo_url' => 'mimes:jpg,bmp,png',
            'haus_number' => 'nullable',
            'strasse' => 'nullable|max:255',
            'stadteil' => 'nullable|max:255',
            'postleitzahl' => 'nullable|max:255',
            'stadt' => 'nullable|max:255',
            'land' => 'nullable|max:255',
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
