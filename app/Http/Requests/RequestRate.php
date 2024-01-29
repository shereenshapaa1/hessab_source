<?php

namespace App\Http\Requests;

class RequestRate extends Request
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
                        'real_estate_area' => 'required',
                        'goal_id' => 'required|exists:categories,id',
                        'type_id' => 'required|exists:categories,id',
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
            'mobile'=>'يجب أن يبدا ب 05 و يتكومن من 10 أرقام',
            'name' => 'الاسم مطلوب',
            'real_estate_area' => 'المساحة (م2) مطلوب',
            'type_id' => 'نوع العقار محل التقييم مطلوب',
            'usage_id' => 'استعمال العقار مطلوب',
            'real_estate_age' => 'العمر (سنوات) مطلوب',
             'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
             'g-recaptcha-response.required' => 'Please complete the captcha'
        ];
    }
}