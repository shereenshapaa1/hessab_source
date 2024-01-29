<?php

namespace App\Http\Requests;

class SlidersRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
                {
                    return [
                        'title' => 'required|string',
                        'image'=> 'required|mimes:jpg,png,jpeg',


                    ];
                }
                // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title' => 'required|string',
                        'image'=> 'required|mimes:jpg,png,jpeg',


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