<?php

namespace App\Http\Services\PaymentServices;

use App\Models\FailedPayment;
use App\Repositories\FailedPaymentRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\SuccessfulPaymentRepository;

Class PaymentHistoryService {

    private $allPaymentRepository;
    private $failedPaymentRepository;
    private $successfulPaymentRepository;

    public function __construct(
        PaymentRepository $allPaymentRepository,
        FailedPaymentRepository $failedPaymentRepository,
        SuccessfulPaymentRepository $successfulPaymentRepository,
    )
    {
        $this->allPaymentRepository = $allPaymentRepository;
        $this->failedPaymentRepository = $failedPaymentRepository;
        $this->successfulPaymentRepository = $successfulPaymentRepository;
    }

    public function allPayments(int|string|null $userId = null) 
    {
        if(is_null($userId)) {
            
        }
    }

    public function successfulPayments(int|string|null $userId = null) 
    {
        if(is_null($userId)) {

        }
    }

    public function failedPayments(int|string|null $userId = null) 
    {
        if(is_null($userId)) {

        }
    }
}