<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_company_create');
    }

    public function rules()
    {
        return [
            'company_name'    => [
                'string',
                'nullable',
            ],
            'company_address' => [
                'string',
                'nullable',
            ],
            'company_website' => [
                'string',
                'nullable',
            ],
            'company_email'   => [
                'string',
                'nullable',
            ],
        ];
    }
}
