<?php

namespace App\Repositories\Ingredients;

use App\Repositories\RepositoryInterface;

interface IngredientsRepositoryInterface extends RepositoryInterface
{
    public function getData($data);
    public function deleteIngredients($id);
    public function createIngredients($data);
    public function getInfoIngredients($id);
    public function updateIngredients($data, $id);
    public function createCouponIngredients($data);
    public function updateCouponIngredients($data);
    public function listCouponIngredients($data);
    public function getInfoCouponIngredients($id);
    public function completeCouponIngredients($data);
    public function createExportIngredients($data);
    public function listExportIngredients($data);
    public function updateExportIngredients($data);
    public function getInfoExportIngredients($id);
    public function getListExport($data);
    public function approveExportIngredients($id);
    public function refuseExportIngredients($id);
}