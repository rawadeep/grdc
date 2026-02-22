<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectResourceRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'type' => 'required|in:Report,Data & Analytics,Knowledge Products,Notices',
            'description' => 'required|string',
            'file' => 'nullable|file|max:20480', // max 20MB
        ];
    }
}
