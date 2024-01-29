<?php

namespace App\Http\Controllers\Api;

use App\Events\RequestEmailEvent;
use App\Http\Requests\RequestRate;
use App\Interfaces\RateRequestRepositoryInterface;

class RateRequestsController extends ResponseController
{
    private RateRequestRepositoryInterface $rateRepository;
    private $path = 'rates';

    public function __construct(
        RateRequestRepositoryInterface $rateRepository,
    ) {
        $this->rateRepository = $rateRepository;
    }

    public function store(RequestRate $request)
    {
        $data = $request->all();

        $data['request_no'] = ! empty(\App\Models\RateRequest::latest()->first()->id) ? \App\Models\RateRequest::latest()->first()->id * 100 : '1000';
        $images = $this->rateRepository->getImagesSettings();
        $evaluation = $this->rateRepository->createRateRequest($data);

        foreach ($images as $item) {
            if(! empty($data[$item]))
            {
                $evaluation->addMultipleMediaFromRequest([$item])
                ->each(function ($fileAdder) use($item) {
                        $fileAdder->toMediaCollection($item);
                });
            }

        }

        $title = 'رسائل الموقع رقم '.$data['request_no'];
        $content = __('website.RateRequestContent', ['item' => $evaluation]);
        $view = 'contact';
        // event(new RequestEmailEvent($title, $content, $view, $item));

        return $this->successResponse([], trans(' تم استلام طلبك رقم ' .$data['request_no']. 'سيقوم فريق العمل بشركة صالح الغفيض للتقييم العقارى بالتواصل معك قريباَ'), 200);
    }
}