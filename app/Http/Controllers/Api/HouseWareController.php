<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\HouseWare\HouseWareRespositoryInterface;
use Illuminate\Http\Request;
use App\Mail\SendMailPark;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\RoomServiceClean;

class HouseWareController extends Controller
{
    private $housewareRepository;

    public function __construct(HouseWareRespositoryInterface $housewareRepository)
    {
        $this->housewareRepository = $housewareRepository;
    }

    public function getData(Request $request)
    {
        $result = $this->housewareRepository->getData($request->all());

        return $result;
    }

    public function deleteData($id)
    {
        $result = $this->housewareRepository->deleteHouseWare($id);

        return $result;
    }

    public function createHouseware(Request $request)
    {
        $result = $this->housewareRepository->createHouseware($request->all());

        return $result;
    }

    public function getInfoHouseware($id)
    {
        $result = $this->housewareRepository->getInfoHouseware($id);

        return $result;
    }

    public function updateHouseware(Request $request)
    {
        $data = $request->only('name', 'cost', 'quantity', 'quantity_broken');
        $id = $request->only('id');

        $result = $this->housewareRepository->updateHouseware($data, $id);
        return $result;
    }

    public function getAllHouseware() 
    {
        $result = DB::table('houseware')->get();

        return $result;
    }

    public function createCouponHouseware(Request $request)
    {
        $result = $this->housewareRepository->createCouponHouseware($request->all());
        return $result;
    }

    public function listCouponHouseware(Request $request)
    {
        $result = $this->housewareRepository->listCouponHouseware($request->all());

        return $result;
    }

    public function deleteCouponHouseware($id)
    {
        DB::table('enter_coupon_houseware')->where('id', $id)->delete();
        DB::table('service_enter_coupon_houseware')->where('enter_coupon_houseware_id', $id)->delete();
    }

    public function getInfoCouponHouseware($id)
    {
        $result = $this->housewareRepository->getInfoCouponHouseware($id);

        return $result;
    }

    public function updateCouponHouseware(Request $request)
    {
        $result = $this->housewareRepository->updateCouponHouseware($request->all());

        return $result;
    }

    public function createExportHouseware(Request $request)
    {
        $result = $this->housewareRepository->createExportHouseware($request->all());

        return $result;
    }

    public function listExportHouseware(Request $request)
    {
        $result = $this->housewareRepository->listExportHouseware($request->all());

        return $result;
    }

    public function deleteExportHouseware($id)
    {
        DB::table('export_houseware')->where('id', $id)->delete();
        DB::table('service_export_houseware')->where('export_houseware_id', $id)->delete();
    }

    public function updateExportHouseware(Request $request)
    {
        $result = $this->housewareRepository->updateExportHouseware($request->all());

        return $result;
    }

    public function getInfoExportHouseware($id)
    {
        $result = $this->housewareRepository->getInfoExportHouseware($id);
        return $result;
    }

    public function getListExport(Request $request)
    {
        $result = $this->housewareRepository->getListExport($request->all());
        return $result;
    }

    public function completeCouponHouseware(Request $request)
    {
        $result = $this->housewareRepository->completeCouponHouseware($request->all());
        return $result;
    }

    public function approveExportHouseware($id)
    {
        $result = $this->housewareRepository->approveExportHouseware($id);
        return $result;
    }

    public function refuseExportHouseware($id)
    {
        $result = $this->housewareRepository->refuseExportHouseware($id);
        return $result;
    }
}