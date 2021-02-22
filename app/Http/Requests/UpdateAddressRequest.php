<?php

namespace App\Http\Requests;

use App\Models\Address;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('address_edit');
    }

    public function rules()
    {
        return [
            'address_one' => [
                'string',
                'required',
            ],
            'address_two' => [
                'string',
                'required',
            ],
            'latitude'    => [
                'string',
                'required',
            ],
            'longitude'   => [
                'string',
                'required',
            ],
        ];
    }
}
