<?php

namespace App\Http\Requests;

class BankRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
                {
                    return [
                        'title' => 'required|string|max:100',
                        'iban' => 'required|string|max:100',

                        // 'image'=> 'required|mimes:jpg,png,jpeg',


                    ];
                }
                // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title' => 'required|string|max:100',
                        'iban' => 'required|string|max:100',


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