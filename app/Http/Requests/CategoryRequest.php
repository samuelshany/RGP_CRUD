<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\Local;
class CategoryRequest extends FormRequest
{
    use Local;
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
$this->getLocal();
        return [
            'name_en'=>'required|unique:categories',

            'name_ar'=>'required|unique:categories',

        ];
    }
    public function messages(): array
    {
        return [
            'name_en.required' => __('errors.category_name_en_required'),
            'name_ar.required' => __('errors.category_name_ar_required'),
            'name_en.unique' => __('errors.category_name_en_unique'),
            'name_ar.unique' => __('errors.category_name_ar_unique'),

        ];
    }
}
