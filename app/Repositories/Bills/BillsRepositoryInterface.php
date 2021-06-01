<?php

namespace App\Repositories\Bills;

use App\Repositories\RepositoryInterface;

interface BillsRepositoryInterface extends RepositoryInterface
{
   public function getRevenue();

   public function getRevenueByMonth($dt);

   public function getListBills();
}
