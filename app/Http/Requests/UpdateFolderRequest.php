<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property integer $parent_id
 * @property string $name
 * @property string $icon
 */
class UpdateFolderRequest extends FormRequest
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
            'parent_id' => 'nullable|exists:folders,id',
            'name' => 'nullable|unique:folders,name',
            'icon' => 'nullable|mimes:png,jpg|max:2048',
        ];
    }
}
