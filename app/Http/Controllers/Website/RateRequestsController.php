<?php

namespace App\Http\Controllers\Website;

use App\Events\RequestEmailEvent;
use Illuminate\Http\Request;
use App\Models\RateRequest;
use App\Models\RequestRateMachine;

use App\Http\Requests\RequestRate;
use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\RateRequestRepositoryInterface;

class RateRequestsController extends Controller
{
    private RateRequestRepositoryInterface $rateRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private $path = 'rates';

    public function __construct(
        RateRequestRepositoryInterface $rateRepository,
        CategoryRepositoryInterface $categoryRepository,
    ) {
        $this->rateRepository = $rateRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show()
    {
        $result = [];
        $result['goals'] = $this->categoryRepository->getPublishCategories('ApartmentGoal', 15,'list');
        $result['entities'] = $this->categoryRepository->getPublishCategories('ApartmentEntity', 15,'list');
        $result['types'] = $this->categoryRepository->getPublishCategories('ApartmentType', 15,'list');
        $result['usages'] = $this->categoryRepository->getPublishCategories('ApartmentUsage', 15,'list');

        return view('website.pages.rate', compact('result'));

    }
    public function show2()
    {
        return view('website.pages.rate2');
    }
    public function checknumber(Request $request)
    {
        $type = substr($request->request_no, 0, 2);

        if($type==01)
        {
            $RequestRate=RateRequest::where('request_no',$request->request_no)->first();
            if($RequestRate)
            {
    
                $result = [];
                $result['id'] = $RequestRate->id;
                $result['RequestRate'] = $RequestRate;

    
                $result['goals'] = $this->categoryRepository->getPublishCategories('ApartmentGoal', 15,'list');
                $result['entities'] = $this->categoryRepository->getPublishCategories('ApartmentEntity', 15,'list');
                $result['types'] = $this->categoryRepository->getPublishCategories('ApartmentType', 15,'list');
                $result['usages'] = $this->categoryRepository->getPublishCategories('ApartmentUsage', 15,'list');
        
                return view('website.pages.rate3', compact('result'));
    
            }
            else
            {
    
                flash('لا يوجد طلب رقم '.$request->request_no )->error();
                return redirect()->route('website.rate-request.step2');
    
            }


        }
        elseif($type=02)
        {
            $RequestRate=RequestRateMachine::where('request_no',$request->request_no)->first();
            if($RequestRate)
            {
    
    
                $result = [];
                $result['id'] = $RequestRate->id;
                $result['RequestRate'] = $RequestRate;

    
                $result['goals'] = $this->categoryRepository->getPublishCategories('MachineGoal', 15,'list');
                $result['entities'] = $this->categoryRepository->getPublishCategories('ApartmentEntity', 15,'list');

                $result['usages'] = $this->categoryRepository->getPublishCategories('ApartmentUsage', 15,'list');
        
                return view('website.pages.rateMachine.rate3', compact('result'));
    
            }
            else
            {
    
                flash('لا يوجد طلب رقم '.$request->request_no )->error();
                return redirect()->route('website.rate-request.step2');
    
            }

        }

       
        
    }
    public function update(Request $request)
    {
    

        $RequestRate=RateRequest::where('id',$request->id)->first();
        $data = $request->all();
        $images = $this->rateRepository->getImagesSettings();
        $evaluation = $this->rateRepository->updateRateRequest($RequestRate->id,$data);
        $evaluation=RateRequest::where('id',$request->id)->first();

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
        return redirect()->route('website.rate-request.show');


    }

    public function store(RequestRate $request)
    {
         $request->validate([
            'mobile' => 'required|starts_with:05|string|max:10',
         ]);
        
        $data = $request->all();
        $data['request_no'] = ! empty(\App\Models\RateRequest::latest()->first()->id) ? \App\Models\RateRequest::latest()->first()->id * 100 : '1000';
        $data['request_no']='01'. $data['request_no'];

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
        //event(new RequestEmailEvent($title, $content, $view, $item));

        flash('تم إرسال رسالتك رقم '.$data['request_no'] .' بنجاح')->success();
        return redirect()->route('website.rate-request.show');
    }
}