<?php

namespace App\Repositories\Ingredients;

use App\Models\Ingredients;
use App\Models\EnterCouponIngredients;
use App\Models\ServiceEnterCouponIngredients;
use App\Models\ExportIngredients;
use App\Models\SerivceExportIngredients;
use App\Models\RoomsCustomer;
use App\Models\Bills;
use App\Models\RoomFoods;
use App\Models\RoomServiceFood;
use App\Models\RoomServicePark;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class IngredientsRepository extends RepositoryAbstract implements IngredientsRepositoryInterface
{
    public function model()
    {
        return Ingredients::class;
    }

    public function getData($data)
    {
        try {
            $list = $this->model;
            $perPage = $data['perPage'];

            if ($data['name']) {
                $name = $data['name'];
                $list->where('name', 'LIKE', "%$name%");
            }
            return [
                'success' => true,
                'data' => $list->paginate($perPage)
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function deleteIngredients($id)
    {
        try {
            $this->model->find($id)->delete();

            return [
                'success' => true
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function createIngredients($data)
    {
        try {
            $this->model->create($data);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getInfoIngredients($id)
    {
        try {

            $data = $this->model->find($id);
            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateIngredients($data, $id)
    {
        try {
            $houseware = $this->model->where('id', $id)->update([
                'name' => $data['name'],
                'cost' => $data['cost'],
                'quantity' => $data['quantity'],
            ]);

            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function createCouponIngredients($data)
    {
        try {
            $object = $data['data'];
            $total = 0;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $total += $houseware_object->cost * $houseware_object->quantity;
            }
            $couponHouseware = new EnterCouponIngredients;
            $couponHouseware->description = $data['description'];
            $couponHouseware->user_id = $data['user_id'];
            $couponHouseware->day = $data['day'];
            $couponHouseware->discount = $data['discount'];
            $couponHouseware->cost = $total * (100 - $data['discount']) / 100;
            $couponHouseware->status = 1;
            $couponHouseware->save();
            $id = DB::table('enter_coupon_ingredients')->get()->last()->id;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $service_houseware = new ServiceEnterCouponIngredients;
                $service_houseware->enter_coupon_ingredients_id = $id;
                $service_houseware->ingredients_id = $houseware_object->houseware_id;
                $service_houseware->quantity = $houseware_object->quantity;
                $service_houseware->quantity_return = 0;
                $service_houseware->save();
            }
            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateCouponIngredients($data)
    {
        try {
            $object = $data['data'];
            $total = 0;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $total += $houseware_object->cost * $houseware_object->quantity;
            }
            $id = $data['id'];
            DB::table('enter_coupon_ingredients')->where('id', $id)->update([
                'cost' => $total*(1 - $data['discount']/100),
                'description' => $data['description'],
                'user_id' => $data['user_id'],
                'day' => $data['day'],
                'discount' => $data['discount']
            ]);
            DB::table('service_enter_coupon_ingredients')->where('enter_coupon_ingredients_id', $id)->delete();
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $service_houseware = new ServiceEnterCouponIngredients;
                $service_houseware->enter_coupon_ingredients_id = $id;
                $service_houseware->ingredients_id = $houseware_object->ingredients_id;
                $service_houseware->quantity = $houseware_object->quantity;
                $service_houseware->quantity_return = $houseware_object->quantity_return;
                $service_houseware->save();
            }
            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function completeCouponIngredients($data)
    {
        try {
            $object = $data['data'];
            $total = 0;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $total += $houseware_object->cost * ($houseware_object->quantity - $houseware_object->quantity_return);
            }
            $id = $data['id'];
            DB::table('enter_coupon_ingredients')->where('id', $id)->update([
                'cost' => $total*(1 - $data['discount']/100),
                'description' => $data['description'],
                'user_id' => $data['user_id'],
                'day' => $data['day'],
                'discount' => $data['discount'],
                'status' => 2
            ]);
            DB::table('service_enter_coupon_ingredients')->where('enter_coupon_ingredients_id', $id)->delete();
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $service_houseware = new ServiceEnterCouponIngredients;
                $service_houseware->enter_coupon_ingredients_id = $id;
                $service_houseware->ingredients_id = $houseware_object->ingredients_id;
                $service_houseware->quantity = $houseware_object->quantity;
                $service_houseware->quantity_return = $houseware_object->quantity_return;
                $service_houseware->save();
            }
            $list = DB::table('service_enter_coupon_ingredients')->where('enter_coupon_ingredients_id', $id)->get();
            foreach($list as $houseware) {
                $quantity = DB::table('ingredients')->where('id', $houseware->ingredients_id)->first()->quantity + $houseware->quantity - $houseware->quantity_return;
                DB::table('ingredients')->where('id', $houseware->ingredients_id)->update(['quantity' => $quantity]);
            };
            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function listCouponIngredients($data)
    {
        try {
            $list = DB::table('enter_coupon_ingredients');
            $perPage = $data['perPage'];
            $time_lower = $data['time_lower'];
            $time_upper = $data['time_upper'];
            if($time_lower) {
                $list = $list->where('created_at', '>', $time_lower);
            };

            if($time_upper) {
                $list = $list->where('created_at', '<', $time_upper);
            }

            return [
                'success' => 'true',
                'data' => $list->paginate($perPage),
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getInfoCouponIngredients($id)
    {
        try {
            $description = DB::table('enter_coupon_ingredients')->where('id', $id)->first()->description;
            $status = DB::table('enter_coupon_ingredients')->where('id', $id)->first()->status;
            $user_id = DB::table('enter_coupon_ingredients')->where('id', $id)->first()->user_id;
            $day = DB::table('enter_coupon_ingredients')->where('id', $id)->first()->day;
            $discount = DB::table('enter_coupon_ingredients')->where('id', $id)->first()->discount;
            $data = DB::table('ingredients')
                    ->leftJoin('service_enter_coupon_ingredients', 'ingredients.id', '=', 'service_enter_coupon_ingredients.ingredients_id')
                    ->where('service_enter_coupon_ingredients.enter_coupon_ingredients_id', $id)
                    ->get();

            return [
                'success' => true,
                'description' => $description,
                'status' => $status,
                'data' => $data,
                'user_id' => $user_id,
                'day' => $day,
                'discount' => $discount
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function createExportIngredients($data)
    {
        try {
            $object = $data['data'];
            $total = 0;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $total += $houseware_object->cost * $houseware_object->quantity;
            }
            $couponHouseware = new ExportIngredients;
            $couponHouseware->description = $data['description'];
            $couponHouseware->cost = $total;
            $couponHouseware->status = 1;
            $couponHouseware->user_id = $data['user_id'];
            $couponHouseware->save();
            $id = DB::table('export_ingredients')->get()->last()->id;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $service_houseware = new SerivceExportIngredients;
                $service_houseware->export_ingredients_id = $id;
                $service_houseware->ingredients_id = $houseware_object->houseware_id;
                $service_houseware->quantity = $houseware_object->quantity;
                $service_houseware->save();
            }
            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function listExportIngredients($data)
    {
        try {
            $list = DB::table('export_ingredients');
            $list = $list->where('user_id', $data['user_id']);
            $perPage = $data['perPage'];
            $time_lower = $data['time_lower'];
            $time_upper = $data['time_upper'];
            if ($time_lower) {
                $list = $list->where('created_at', '>', $time_lower);
            };

            if ($time_upper) {
                $list = $list->where('created_at', '<', $time_upper);
            }

            return [
                'success' => 'true',
                'data' => $list->paginate($perPage),
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getInfoExportIngredients($id)
    {
        try {
            $description = DB::table('export_ingredients')->where('id', $id)->first()->description;
            // dd($description);
            $status = DB::table('export_ingredients')->where('id', $id)->first()->status;
            $data = DB::table('ingredients')
                ->leftJoin('service_export_ingredients', 'ingredients.id', '=', 'service_export_ingredients.ingredients_id')
                ->where('service_export_ingredients.export_ingredients_id', $id)
                ->get();

            return [
                'success' => true,
                'description' => $description,
                'status' => $status,
                'data' => $data,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateExportIngredients($data)
    {
        try {
            $object = $data['data'];
            $total = 0;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $total += $houseware_object->cost * $houseware_object->quantity;
            }
            $id = $data['id'];
            DB::table('export_ingredients')->where('id', $id)->update([
                'cost' => $total,
                'description' => $data['description'],
                'status' => 1,
            ]);
            DB::table('service_export_ingredients')->where('export_ingredients_id', $id)->delete();
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $service_houseware = new SerivceExportIngredients;
                $service_houseware->export_ingredients_id = $id;
                $service_houseware->ingredients_id = $houseware_object->ingredients_id;
                $service_houseware->quantity = $houseware_object->quantity;
                $service_houseware->save();
            }
            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getListExport($data)
    {
        try {
            $list = DB::table('export_ingredients');
            $perPage = $data['perPage'];
            $time_lower = $data['time_lower'];
            $time_upper = $data['time_upper'];
            if ($time_lower) {
                $list = $list->where('created_at', '>', $time_lower);
            };

            if ($time_upper) {
                $list = $list->where('created_at', '<', $time_upper);
            }

            return [
                'success' => true,
                'data' => $list->paginate($perPage),
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function approveExportIngredients($id)
    {
        try {
            DB::table('export_ingredients')->where('id', $id)->update(['status' => 2]);
            $list = DB::table('service_export_ingredients')->where('export_ingredients_id', $id)->get();
            foreach($list as $houseware) {
                $quantity = DB::table('ingredients')->where('id', $houseware->ingredients_id)->first()->quantity - $houseware->quantity;
                DB::table('ingredients')->where('id', $houseware->ingredients_id)->update(['quantity' => $quantity]);
            };
            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function refuseExportIngredients($id) 
    {
        try {
            DB::table('export_ingredients')->where('id', $id)->update(['status' => 3]);
            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}