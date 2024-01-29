<?php

namespace App\Repositories;

use App\Models\RequestRateMachine;
use App\Interfaces\RateMachinesRequestRepositoryInterface;

class RateMachinesRequestRepository implements RateMachinesRequestRepositoryInterface
{
    public function getAllRateRequests()
    {
        return RequestRateMachine::all();
    }

    public function getImagesSettings()
    {
        return ['OwnerID_image','CustomerID_image','Instrument_image','Planners_image','Determine_the_heirs_image','Technical_Inspection_image','Lease_contracts_image','Financial_Statements_image','Feasibility_study_image','Other_documents_image',
               ];
    }

    public function getPaginateRateRequests($data)
    {
        $items = RequestRateMachine::Recent();
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
        return RequestRateMachine::count();
    }

    public function getRateRequestById($rateRequestId)
    {
        return RequestRateMachine::findOrFail($rateRequestId);
    }

    public function deleteRateRequest($rateRequestId)
    {
        RequestRateMachine::destroy($rateRequestId);
    }

    public function createRateRequest($rateRequestDetails)
    {
        return RequestRateMachine::create($rateRequestDetails);
    }

    public function updateRateRequest($rateRequestId, $newDetails)
    {
        return RequestRateMachine::find($rateRequestId)->update($newDetails);
    }
}