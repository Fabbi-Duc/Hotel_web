<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Ingredients\IngredientsRepositoryInterface;
use Illuminate\Http\Request;
use App\Mail\SendMailPark;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\RoomServiceClean;

class IngredientsController extends Controller
{
    private $housewareRepository;

    public function __construct(IngredientsRepositoryInterface $housewareRepository)
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
        $result = $this->housewareRepository->deleteIngredients($id);

        return $result;
    }

    public function createHouseware(Request $request)
    {
        $result = $this->housewareRepository->createIngredients($request->all());

        return $result;
    }

    public function getInfoHouseware($id)
    {
        $result = $this->housewareRepository->getInfoIngredients($id);

        return $result;
    }

    public function updateHouseware(Request $request)
    {
        $data = $request->only('name', 'cost', 'quantity', 'quantity_broken');
        $id = $request->only('id');

        $result = $this->housewareRepository->updateIngredients($data, $id);
        return $result;
    }

    public function getAllHouseware() 
    {
        $result = DB::table('ingredients')->get();

        return $result;
    }

    public function createCouponHouseware(Request $request)
    {
        $result = $this->housewareRepository->createCouponIngredients($request->all());
        return $result;
    }

    public function listCouponHouseware(Request $request)
    {
        $result = $this->housewareRepository->listCouponIngredients($request->all());

        return $result;
    }

    public function deleteCouponHouseware($id)
    {
        DB::table('enter_coupon_ingredients')->where('id', $id)->delete();
        DB::table('service_enter_coupon_ingredients')->where('enter_coupon_ingredients_id', $id)->delete();
    }

    public function getInfoCouponHouseware($id)
    {
        $result = $this->housewareRepository->getInfoCouponIngredients($id);

        return $result;
    }

    public function updateCouponHouseware(Request $request)
    {
        $result = $this->housewareRepository->updateCouponIngredients($request->all());

        return $result;
    }

    public function completeCouponIngredients(Request $request)
    {
        $result = $this->housewareRepository->completeCouponIngredients($request->all());

        return $result;
    }

    public function createExportHouseware(Request $request)
    {
        $result = $this->housewareRepository->createExportIngredients($request->all());

        return $result;
    }

    public function listExportHouseware(Request $request)
    {
        $result = $this->housewareRepository->listExportIngredients($request->all());

        return $result;
    }

    public function deleteExportHouseware($id)
    {
        DB::table('export_ingredients')->where('id', $id)->delete();
        DB::table('service_export_ingredients')->where('export_ingredients_id', $id)->delete();
    }

    public function updateExportHouseware(Request $request)
    {
        $result = $this->housewareRepository->updateExportIngredients($request->all());

        return $result;
    }

    public function getInfoExportHouseware($id)
    {
        $result = $this->housewareRepository->getInfoExportIngredients($id);
        return $result;
    }

    public function getListExport(Request $request)
    {
        $result = $this->housewareRepository->getListExport($request->all());
        return $result;
    }

    public function approveExportHouseware($id)
    {
        $result = $this->housewareRepository->approveExportIngredients($id);
        return $result;
    }

    public function refuseExportHouseware($id)
    {
        $result = $this->housewareRepository->refuseExportIngredients($id);
        return $result;
    }
}