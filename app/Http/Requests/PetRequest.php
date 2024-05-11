<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PetRequest extends FormRequest
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
            'name' => 'required|max:20|',
            'photo' => 'nullable|image|max:1024|dimensions:max_width=350,max_height=600',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.max' => 'Name can only have 20 letters',
            'name.unique' => 'This name is already in use',
            'photo.nullable' => 'Image cannot be null',
            'photo.image' => 'Image must be jpeg,png,jpg format',
            'photo.dimensions' => 'Image dimensions are too big max_width=350,max_height=600',
            'tag.required' => 'Tag is required',
            'tag.max' => 'Tag can only have 20 letters',
            'status.required' => 'Status is required',
        ];
    }
}
