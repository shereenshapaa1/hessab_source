<?php

namespace App\Repositories;

use App\Models\RateRequest;
use App\Interfaces\RateRequestRepositoryInterface;

class RateRequestRepository implements RateRequestRepositoryInterface
{
    public function getAllRateRequests()
    {
        return RateRequest::all();
    }

    public function getImagesSettings()
    {
        return ['OwnerID_image','CustomerID_image','Instrument_image','Planners_image','Determine_the_heirs_image','Technical_Inspection_image','Lease_contracts_image','Financial_Statements_image','Feasibility_study_image','Other_documents_image',
               ];
    }

    public function getPaginateRateRequests($data)
    {
        $items = RateRequest::Recent();
        $status = $data['status'] ?? '-1';
        $search = $data['search'] ?? '';
        $from_date = $data['from_date'] ?? '';
        $to_date = $data['to_date'] ?? '';
        if (isset($search) && $search != '') {
            $items = $items->where(
                function ($q) use ($search) {
                    $q->where('id', 'like', '%' . $search . '%');
                    $q->orWhere('request_no', 'like', '%' . $search . '%');
                }
            );

        }
        if (isset($from_date) && $from_date != '') {
            $items = $items->whereDate('created_at', '>=', $from_date);
        }
        if (isset($to_date) && $to_date != '') {
            $items = $items->whereDate('created_at', '<=', $to_date);
        }
        if (isset($status) &&$status != '' && $status != '-1') {
            $items = $items->where('status', $status);
        }

        $items = $items->paginate(25);

        return $items;
    }

    public function getCount()
    {
        return RateRequest::count();
    }

    public function getRateRequestById($rateRequestId)
    {
        return RateRequest::findOrFail($rateRequestId);
    }

    public function deleteRateRequest($rateRequestId)
    {
        RateRequest::destroy($rateRequestId);
    }

    public function createRateRequest($rateRequestDetails)
    {
        return RateRequest::create($rateRequestDetails);
    }

    public function updateRateRequest($rateRequestId, $newDetails)
    {
        return RateRequest::find($rateRequestId)->update($newDetails);
    }
}