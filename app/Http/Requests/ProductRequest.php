<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\Local;
class ProductRequest extends FormRequest
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
            'name_en'=>'required',
            'description_en'=>'required',
            'name_ar'=>'required',
            'description_ar'=>'required',
            'price'=>'required|regex:/^[0-9]+$/',
            'quantity'=>'required|regex:/^[0-9]+$/',
            'photo' => 'mimes:jpg,bmp,png',
        ];
    }
    public function messages(): array
    {
        return [
            'name_en.required' => __('errors.product_name_en_required'),
            'description_en.required' => __('errors.product_description_en_required'),
            'name_ar.required' => __('errors.product_name_ar_required'),
            'description_ar.required' => __('errors.product_description_ar_required'),
            'price.required' => __('errors.product_price_required'),
            'quantity.required'=>__('errors.product_quantity_required')

        ];
    }
}
