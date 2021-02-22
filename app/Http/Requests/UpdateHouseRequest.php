<?php

namespace App\Http\Requests;

use App\Models\House;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHouseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('house_edit');
    }

    public function rules()
    {
        return [
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'required',
                'array',
            ],
            'title'        => [
                'string',
                'required',
            ],
            'price'        => [
                'required',
            ],
            'bedrooms'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bathrooms'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'floors'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'description'  => [
                'required',
            ],
        ];
    }
}
