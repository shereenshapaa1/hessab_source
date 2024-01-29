<?php

namespace App\Http\Controllers\Website;

use App\Events\RequestEmailEvent;
use Illuminate\Http\Request;
use App\Models\RequestRateMachine;

use App\Http\Requests\RequestRateMachine as Rate_R_M;
use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\RateMachinesRequestRepositoryInterface;

class RateRequestsControllerMachine extends Controller
{
    private RateMachinesRequestRepositoryInterface $rateRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private $path = 'rates';

    public function __construct(
        RateMachinesRequestRepositoryInterface $rateRepository,
        CategoryRepositoryInterface $categoryRepository,
    ) {
        $this->rateRepository = $rateRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show()
    {
        $result = [];
        $result['goals'] = $this->categoryRepository->getPublishCategories('MachineGoal', 15,'list');

        return view('website.pages.rateMachine.rate', compact('result'));

    }
  
 
    public function update(Request $request)
    {
    

        $RequestRate=RequestRateMachine::where('id',$request->id)->first();
        $data = $request->all();


        $images = $this->rateRepository->getImagesSettings();
        $evaluation = $this->rateRepository->updateRateRequest($RequestRate->id,$data);
        $evaluation=RequestRateMachine::where('id',$request->id)->first();

        foreach ($images as $item) {
            if(! empty($data[$item]))
            {


                $evaluation->addMultipleMediaFromRequest([$item])
                ->each(function ($fileAdder) use($item) {
                        $fileAdder->toMediaCollection($item);
                });
            }

        }

        $title = 'رسائل الموقع رقم '.$RequestRate->request_no;
        $content = __('website.RateRequestContent', ['item' => $evaluation]);
        $view = 'contact';
        // event(new RequestEmailEvent($title, $content, $view, $item));

        flash('تم تحديث طلبك رقم '.$RequestRate->request_no .' بنجاح')->success();
        return redirect()->route('website.rate-request_Machine.show');


    }

    public function store(Rate_R_M $request)
    {
        
        $data = $request->all();
        $data['request_no'] = ! empty(\App\Models\RequestRateMachine::latest()->first()->id) ? \App\Models\RequestRateMachine::latest()->first()->id * 100 : '1000';
        $data['request_no']='02'. $data['request_no'];

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
         event(new RequestEmailEvent($title, $content, $view, $item));

        flash('تم إرسال رسالتك رقم '.$data['request_no'] .' بنجاح')->success();
        return redirect()->route('website.rate-request_Machine.show');
    }
}