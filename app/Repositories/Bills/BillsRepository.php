<?php

namespace App\Repositories\Bills;

use App\Models\Customers;
use App\Models\RoomsCustomer;
use App\Models\Bills;
use App\Models\RoomFoods;
use App\Models\RoomServiceFood;
use App\Models\RoomServicePark;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class BillsRepository extends RepositoryAbstract implements BillsRepositoryInterface
{
    public function model()
    {
        return Bills::class;
    }

    public function getRevenue() 
    {
        try {
            $list = DB::table("bills");
            return [
                'success' => true,
                'Revenue' => $list->where('status', '=', 3)->sum('price')
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getRevenueByMonth($dt) {
        try {
            // $dt = "2021-04-12";
            // dd($dt['dt']);
            $start_month = date("Y-m-01 00:00:00", strtotime($dt['dt']));
            $end_month = date("Y-m-t 23:59:59", strtotime($dt['dt']));
            $revenues = DB::table("bills")
            ->where('status', '=', 3)
            ->where('start_time', '>=', $start_month)
            ->where('start_time', '<=', $end_month)
            ->where('end_time', '>=', $start_month)
            ->where('end_time', '<=', $end_month)
            ->sum('price'); 
            return [
                'success' => true,
                'revenue' => $revenues
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getListBills()
    {
        try {
            $list = DB::table("bills");
            return [
                'success' => true,
                'data' => $list->get()
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
