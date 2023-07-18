<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
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
            'job_id' => 'nullable',
            'user_id' => 'nullable',
            'anschreiben' => 'nullable',
            'anschreiben_url' => 'nullable|file',
            'lebenslauf_url' => 'nullable|file',
        ];
    }
}
