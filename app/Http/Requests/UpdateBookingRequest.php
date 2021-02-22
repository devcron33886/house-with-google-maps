<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('booking_edit');
    }

    public function rules()
    {
        return [
            'house_id' => [
                'required',
                'integer',
            ],
            'names'    => [
                'string',
                'required',
            ],
            'email'    => [
                'required',
            ],
            'mobile'   => [
                'string',
                'required',
            ],
            'status'   => [
                'required',
            ],
        ];
    }
}
