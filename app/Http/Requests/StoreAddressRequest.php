<?php

namespace App\Http\Requests;

use App\Models\Address;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('address_create');
    }

    public function rules()
    {
        return [
            'house_id'    => [
                'required',
                'integer',
            ],
            'address_one' => [
                'string',
                'required',
            ],
            'address_two' => [
                'string',
                'nullable',
            ],
        ];
    }
}
