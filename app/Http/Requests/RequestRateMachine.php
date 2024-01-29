<?php

namespace App\Http\Requests;

class RequestRateMachine extends Request
{
    public function rules()
    {
        switch ($this->method()) {
            // CREATE

            case 'POST':
                {
                    return [

                        'mobile' => 'required|starts_with:05|string|max:10|min:10',
                        'name' => 'required',
                        'email' => 'required',
                        'location' => 'required',
                        'type_id' => 'required|string',
                        'g-recaptcha-response' => 'required|recaptcha'

                    ];
                }
                // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        // UPDATE ROLES

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
            'name' => 'الاسم مطلوب',
            'mobile'=>'يجب أن يبدا ب 05 و ويتكون من 10 أرقام',
            'real_estate_area' => 'المساحة (م2) مطلوب',
            'type_id' => 'نوع العقار محل التقييم مطلوب',
            'usage_id' => 'استعمال العقار مطلوب',
            'real_estate_age' => 'العمر (سنوات) مطلوب',
                      'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
             'g-recaptcha-response.required' => 'Please complete the captcha'
        ];
    }
}