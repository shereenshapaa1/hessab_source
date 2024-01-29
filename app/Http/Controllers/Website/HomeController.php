<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ContentRepositoryInterface;
use App\Models\Privacy;
use App\Models\Contactus;
use App\Models\User;
use App\Models\Article;
use App\Models\Newsletter;
use App\Models\Rating;
use App\Models\Sub_services;
use App\Models\Content;








class HomeController extends Controller
{
    private ContentRepositoryInterface $contentRepository;

    public function __construct(
        ContentRepositoryInterface $contentRepository
    ) {
        $this->contentRepository = $contentRepository;
    }
    public function index(Request $request)
    {
        $result = [];

        $result['counters'] = $this->contentRepository->getPublishContents('Counter', 20);
        $result['objectives'] = $this->contentRepository->getPublishContents('Objective', 15);
        $result['services'] = $this->contentRepository->getPublishContents('Service', 15);
        $result['clients'] = $this->contentRepository->getPublishContents('Client', 15);
        $result['about'] = $this->contentRepository->getPublishContents('About', 15);
        $result['companyServices'] = $this->contentRepository->getPublishContents('CompanyService', 15);
        $result['Rating']=Rating::where('is_publish',1)->orderBy('id','desc')->paginate(15);



        return view('website.home.index', compact('result'));
    }
       public function services_detail ($id)
    {
        $service=Content::find($id);
        $sub_services=Sub_services::where('service_id',$id)->orderBy('id','desc')->where('is_publish',1)->paginate(15);
        return view('website.pages.sub_services',compact('sub_services','service'));

    }
      public function blog()
    {
        $Articales=Article::where('is_publish',1)->orderBy('id','DESC')->paginate('9');
        return view('website.pages.blog',compact('Articales'));

    }
    public function blog_details($id)
    {
        $Articale=Article::find($id);
        return view('website.pages.blog_details',compact('Articale'));
    }
      public function contactUs()
    {
        return view('website.pages.contact');


    }
    public function contactUs_store(request $request)
    {
        $Contactus=new Contactus();
        $Contactus->name=$request->username;
        $Contactus->email=$request->email;
        $Contactus->message=$request->message;
        $Contactus->save();
        return redirect()->back()
        ->with('message', __('admin.AddedMessage'));



    }
    public function newsletter(request $request)
    {
        $Newsletter=new Newsletter();
        $Newsletter->email=$request->email;
        $Newsletter->save();
         return redirect()->back()
        ->with('message', __('تم الأشتراك فى نشرة الأخبار بنجاح'));
        
        // return view('website.pages.thankyou')->with('message', __('admin.AddedMessage'));

    }
    
    
    public function about()
    {
        $result = [];

        $result['counters'] = $this->contentRepository->getPublishContents('Counter', 20);
        $result['objectives'] = $this->contentRepository->getPublishContents('Objective', 15);
        $result['services'] = $this->contentRepository->getPublishContents('Service', 15);
        $result['clients'] = $this->contentRepository->getPublishContents('Client', 15);
        $result['about'] = $this->contentRepository->getPublishContents('About', 15);
        $result['standards'] = $this->contentRepository->getPublishContents('standards', 1);
        $result['reliability'] = $this->contentRepository->getPublishContents('reliability', 1);
        $result['employee'] = user::where('id','!=','1')->paginate(6);
          $result['ourseen']= $this->contentRepository->getPublishContents('Ourseen', 1)->first();
        $result['OurMassage']= $this->contentRepository->getPublishContents('OurMassage', 1)->first();

        $result['companyServices'] = $this->contentRepository->getPublishContents('CompanyService', 15);


        return view('website.pages.about', compact('result'));


    }
 
    public function services()
    {
        $result = [];

        $result['counters'] = $this->contentRepository->getPublishContents('Counter', 20);
        $result['objectives'] = $this->contentRepository->getPublishContents('Objective', 15);
        $result['services'] = $this->contentRepository->getPublishContents('Service', 15);
        $result['clients'] = $this->contentRepository->getPublishContents('Client', 15);
        $result['about'] = $this->contentRepository->getPublishContents('About', 15);
        $result['companyServices'] = $this->contentRepository->getPublishContents('CompanyService', 15);
        return view('website.pages.services', compact('result'));


    }
         public function Prviacyploice()
    {
        $Prviacyploice=Privacy::first();
               return view('website.pages.Prviacyploice', compact('Prviacyploice'));


    }
    
}