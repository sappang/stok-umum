<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if(request()->isMethod('POST')){
            $data = [
                'name' => 'required|unique:products',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                'category_id' => 'required',
                'supplier_id' => 'required',
                'description' => 'required',
                'unit' => 'required',
                'stok_awal' => 'required',
            ];
        }elseif(request()->isMethod('PUT')){
            $data = [
                'name' => 'required','unique:products,name'.$this->id,
                'image' => 'mimes:png,jpg,jpeg|max:2048',
                'category_id' => 'required',
                'supplier_id' => 'required',
                'description' => 'required',
                'unit' => 'required',
            ];
        }
        return $data;
    }
}
