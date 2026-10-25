<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|max:255|unique:products',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'color_id' => 'required',
            'size_id' => 'required',
            'description' => 'required|max:2000',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'second_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'third_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array{
        return [
            'color_id.required' => 'The color is required.',
            'size_id.required' => 'The size is required.',
            'description.required' => 'The description is required.',
            'description.max' => 'The description is too long.',
            'qty.required' => 'The qty is required.',
            'thumbnail.required' => 'The thumbnail is required.',
            'thumbnail.max' => 'The thumbnail is too large.',
            'thumbnail.image' => 'The thumbnail is invalid.',
            'first_image.max' => 'The image is too large.',
            'first_image.image' => 'The image is invalid.',
            'second_image.max' => 'The image is too large.',
            'second_image.image' => 'The image is invalid.',
            'third_image.max' => 'The image is too large.',
            'third_image.image' => 'The image is invalid.',


        ];
    }
}
