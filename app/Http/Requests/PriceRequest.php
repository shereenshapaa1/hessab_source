<?php

namespace App\Http\Requests;

class PriceRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
                {
                    return [
                        'price' => 'required',
                        'total_price' => 'required',
                        'bank_id' => 'required',
                        'payment_option' => 'required',




                    ];
                }
                // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                      


                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                }
        }
    }

    public function messages()
    {
        return [

        ];
    }
}