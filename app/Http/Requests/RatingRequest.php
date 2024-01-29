<?php

namespace App\Http\Requests;

class RatingRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
                {
                    return [
                        'name' => 'required|string',
                        'Position' => 'required|string',
                        'commit' => 'required',

                         'image'=> 'required|mimes:jpg,png,jpeg',


                    ];
                }
                // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|string',
                        'Position' => 'required|string',
                        'commit' => 'required',

                         'image'=> 'mimes:jpg,png,jpeg',


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