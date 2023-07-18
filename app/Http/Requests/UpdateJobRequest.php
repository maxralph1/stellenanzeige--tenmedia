<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'company_id' => 'nullable',
            'user_id' => 'nullable',
            'slug' => 'nullable',
            'bezeichnung' => 'nullable|max:255',
            'beschreibung' => 'nullable',
            'standort' => 'nullable',
            'bewerbungen_per_email_erhalten' => 'nullable|boolean',
            'email_bucket_für_bewerbungen' => 'nullable',
        ];
    }
}
