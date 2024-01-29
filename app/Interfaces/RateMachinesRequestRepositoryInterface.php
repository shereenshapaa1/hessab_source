<?php

namespace App\Interfaces;

interface RateMachinesRequestRepositoryInterface

{
    public function getAllRateRequests();
    public function getPaginateRateRequests($data);
    public function getRateRequestById($rateRequestId);
    public function deleteRateRequest($rateRequestId);
    public function createRateRequest($rateRequestDetails);
    public function updateRateRequest($rateRequestId, $newDetails);
    public function getCount();
    public function getImagesSettings();
}