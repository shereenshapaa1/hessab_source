<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use Illuminate\Http\Request;
use App\Http\Requests\RequestRate;
use App\Http\Requests\PriceRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Models\RateRequest;
use App\Models\Rateprice;
use App\Models\Bank;
use PDF;
use Storage;
use App\Interfaces\RateRequestRepositoryInterface;

class RateRequestsController extends Controller
{
    private RateRequestRepositoryInterface $rateRepository;

    public function __construct(RateRequestRepositoryInterface $rateRepository)
    {
        $this->rateRepository = $rateRepository;
        $this->middleware('auth');
        $this->middleware('checkPermission:rates.index')->only(['index']);
        $this->middleware('checkPermission:rates.show')->only(['show']);
        $this->middleware('checkPermission:rates.edit')->only(['edit']);
        $this->middleware('checkPermission:rates.delete')->only(['destroy']);
        $this->middleware('checkPermission:rates.create')->only(['create']);
        $this->middleware('checkPermission:rates.changeStatus')->only(['change-status']);
    }

    public function index(Request $request)
    {
        $result = [];
        $data = $request->all();
        $status = $data['status'] ?? '-1';
        $search = $data['search'] ?? '';
        $from_date = $data['from_date'] ?? '';
        $to_date = $data['to_date'] ?? '';
        $counts = $this->rateRepository->getCount();
        $items = $this->rateRepository->getPaginateRateRequests($data);
        $statuses = Constants::Statuses;

        $result = [
            'from_date' => $from_date,
            'to_date' => $to_date,
            'items' => $items,
            'counts' => $counts,
            'status' => $status,
            'search' => $search,
            'statuses' => $statuses
        ];
        return view(
            'admin.rates.index',
            compact('result')
        );
    }

    public function show($id)
    {
        $item = $this->rateRepository->getRateRequestById($id);
        $prices=Rateprice::where('rate_id',$id)->where('type','0')->get();
        return view('admin.rates.show', compact('item','prices'));
    }

    public function edit($id)
    {
        $item = $this->rateRepository->getRateRequestById($id);
        $statuses = Constants::Statuses;
        return view('admin.rates.create_and_edit', compact('item', 'statuses'));
    }
    public function peaper($id)
    {
        $item = $this->rateRepository->getRateRequestById($id);
        return view('admin.rates.peaper', compact('item'));
    }
    public function updatepeaper(request $request, $id)
    {
        $data = $request->except(['_token', '_method' ]);

        $this->rateRepository->updateRateRequest($id, $data);

        return redirect()->route('admin.rates.index')
            ->with('message', __('admin.UpdatedMessage'));
    }

    public function update(RequestRate $request, $id)
    {
        $data = $request->except(['_token', '_method' ]);

        $this->rateRepository->updateRateRequest($id, $data);

        return redirect()->route('admin.rates.index')
            ->with('message', __('admin.UpdatedMessage'));
    }
 

    public function destroy($id)
    {
        $this->rateRepository->deleteRateRequest($id);

        return redirect()->route('admin.rates.index')
            ->with('message', __('admin.DeletedMessage'));
    }

    public function changeStatus(ChangeStatusRequest $request, $id)
    {
        $data = ['status' => $request->status];
        $this->rateRepository->updateRateRequest($id, $data);

        return redirect()->route('admin.rates.index')
            ->with('message', __('admin.UpdatedMessage'));
    }
      public function addprice($id)
    {
        $item=RateRequest::find($id);
        $banks=Bank::get();
        return view('admin.rates.price', compact('item','banks'));
    }

    public function showprice($id)
    {
        $price=Rateprice::find($id);
        $item=RateRequest::find($price->rate_id);
        $banks=Bank::get();


        return view('admin.rates.price', compact('item','price','banks'));
    }
    

    public function storeaddprice(PriceRequest $request)
    {
        $Rateprice=new Rateprice();
        $Rateprice->rate_id=$request->id;

        $Rateprice->price=$request->price;
        $Rateprice->discount=$request->discount;
        $Rateprice->price_discount=$request->price_discount;

        $Rateprice->notes=$request->notes;
        $Rateprice->discount_type=$request->discount_type;
        $Rateprice->total_price=$request->total_price;
        $Rateprice->price_tax=$request->price_tax;
        $Rateprice->payment_option=$request->payment_option;
        $Rateprice->bank_id=$request->bank_id;


        $Rateprice->type='0';
        $Rateprice->save();
        return redirect()->route('admin.rates.index')
        ->with('message', __('admin.AddMessage'));
    }
    public function  generate_pdf(request $request) {
        
        $item=RateRequest::find($request->id);
        $bank=Bank::find($request->bank_id);

        // Generate a unique filename.
        $fileName =$item->name . '_'.$item->request_no.'.pdf';

        //Generate the pdf file
        $pdf = PDF::loadView('pdf.price', compact('item','bank','request'));


        //return $pdf->stream( $filename);

         //Save the pdf file in the public storage
        $pdf->download($fileName);
       

       //Get the file url
        $urlToDownload =  Storage::disk('public')->url($fileName);


        return response()->json([
            'success' => true,
            'url' => $urlToDownload,
        ]);
    }

    public function  generate_pdf_price(request $request,$id) {
        $dateTime = now();

        $item=RateRequest::find($request->id);
        $price=Rateprice::find($id);
        $bank=Bank::find($price->bank_id);

        // Generate a unique filename.
        $fileName =$item->name . '_'.$item->request_no.'.pdf';

        //Generate the pdf file
        $pdf = PDF::loadView('pdf.price', compact('item','bank','price'));


        //return $pdf->stream( $filename);

         //Save the pdf file in the public storage
        $pdf->download($fileName);
        // return $pdf->stream($fileName);
   


       

       //Get the file url
        // $urlToDownload =  Storage::disk('public')->url($fileName);


       
    }

}