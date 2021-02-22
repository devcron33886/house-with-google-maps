<?php

namespace App\Http\Requests;

use App\Models\Infrastructure;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInfrastructureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('infrastructure_create');
    }

    public function rules()
    {
        return [
            'name'      => [
                'string',
                'required',
            ],
            'address' =>[

            'required',
            'string',],
            'latitude'  => [
                'string',
                'nullable',
            ],
            'longitude' => [
                'string',
                'nullable',
            ],
        ];
    }
}
