<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreElectronicRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('electronic_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
            ],
            'product_image' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'status' => [
                'required',
            ],
            'product_gallery' => [
                'array',
            ],
        ];
    }
}
