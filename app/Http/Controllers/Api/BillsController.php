<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Bills\BillsRepositoryInterface;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    private $billsRepository;

    public function __construct(BillsRepositoryInterface $billsRepository)
    {
        $this->billsRepository = $billsRepository;
    }

    //get all doanh thu
    public function getRevenue() 
    {
        $result = $this->billsRepository->getRevenue();
        return $result;
    }

    //get doanh thu theo thang
    public function getRevenueByMonth(Request $request) 
    {
        $result = $this->billsRepository->getRevenueByMonth($request->all());
        return $result;
    }

    //get list bills
    public function getListBills()
    {
        $result = $this->billsRepository->getListBills();
        return $result;
    }

}
