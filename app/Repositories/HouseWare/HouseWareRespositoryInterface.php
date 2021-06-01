<?php

namespace App\Repositories\HouseWare;

use App\Repositories\RepositoryInterface;

interface HouseWareRespositoryInterface extends RepositoryInterface
{
    public function getData($data);
    public function deleteHouseWare($id);
    public function createHouseware($data);
    public function getInfoHouseware($id);
    public function updateHouseware($data, $id);
    public function createCouponHouseware($data);
    public function updateCouponHouseware($data);
    public function listCouponHouseware($data);
    public function getInfoCouponHouseware($id);
    public function createExportHouseware($data);
    public function listExportHouseware($data);
    public function updateExportHouseware($data);
    public function getInfoExportHouseware($id);
    public function getListExport($data);
    public function completeCouponHouseware($data);
    public function approveExportHouseware($id);
    public function refuseExportHouseware($id);
}