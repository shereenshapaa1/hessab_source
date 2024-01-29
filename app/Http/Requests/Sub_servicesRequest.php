<?php

namespace App\Http\Requests;

class Sub_servicesRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
            // CREATE

            case 'POST':
                {
                    return [

                        'title' => 'required',
                        'description' => 'required',
                        'service_id' => 'required|exists:contents,id',
                        'image'=> 'required|mimes:jpg,png,jpeg',
                    ];
                }
                // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title' => 'required',
                        'description' => 'required',
                        'service_id' => 'required|exists:contents,id',
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