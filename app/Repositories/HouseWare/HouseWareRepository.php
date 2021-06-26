<?php

namespace App\Repositories\HouseWare;

use App\Models\Houseware;
use App\Models\EnterCouponHouseware;
use App\Models\ServiceEnterCouponHouseware;
use App\Models\ExportHouseware;
use App\Models\ServiceExportHouseware;
use App\Models\RoomsCustomer;
use App\Models\Bills;
use App\Models\RoomFoods;
use App\Models\RoomServiceFood;
use App\Models\RoomServicePark;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class HouseWareRepository extends RepositoryAbstract implements HouseWareRespositoryInterface
{
    public function model()
    {
        return Houseware::class;
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

    public function deleteHouseWare($id)
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

    public function createHouseware($data)
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

    public function getInfoHouseware($id)
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

    public function updateHouseware($data, $id)
    {
        try {
            $houseware = $this->model->where('id', $id)->update([
                'name' => $data['name'],
                'cost' => $data['cost'],
                'quantity' => $data['quantity'],
                'quantity_broken' => $data['quantity_broken'],
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

    public function createCouponHouseware($data)
    {
        try {
            $object = $data['data'];
            $total = 0;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $total += $houseware_object->cost * $houseware_object->quantity;
            }
            $couponHouseware = new EnterCouponHouseware;
            $couponHouseware->description = $data['description'];
            $couponHouseware->user_id = $data['user_id'];
            $couponHouseware->day = $data['day'];
            $couponHouseware->discount = $data['discount'];
            $couponHouseware->cost = $total * (100 - $data['discount']) / 100;
            $couponHouseware->status = 1;
            $couponHouseware->save();
            $id = DB::table('enter_coupon_houseware')->get()->last()->id;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $service_houseware = new ServiceEnterCouponHouseware;
                $service_houseware->enter_coupon_houseware_id = $id;
                $service_houseware->houseware_id = $houseware_object->houseware_id;
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

    public function updateCouponHouseware($data)
    {
        try {
            $object = $data['data'];
            $total = 0;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $total += $houseware_object->cost * $houseware_object->quantity;
            }
            $id = $data['id'];
            DB::table('enter_coupon_houseware')->where('id', $id)->update([
                'cost' => $total*(1 - $data['discount']/100),
                'description' => $data['description'],
                'user_id' => $data['user_id'],
                'day' => $data['day'],
                'discount' => $data['discount']
            ]);
            DB::table('service_enter_coupon_houseware')->where('enter_coupon_houseware_id', $id)->delete();
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $service_houseware = new ServiceEnterCouponHouseware;
                $service_houseware->enter_coupon_houseware_id = $id;
                $service_houseware->houseware_id = $houseware_object->houseware_id;
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

    public function completeCouponHouseware($data)
    {
        try {
            $object = $data['data'];
            $total = 0;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $total += $houseware_object->cost * ($houseware_object->quantity - $houseware_object->quantity_return);
            }
            $id = $data['id'];
            DB::table('enter_coupon_houseware')->where('id', $id)->update([
                'cost' => $total*(1 - $data['discount']/100),
                'description' => $data['description'],
                'user_id' => $data['user_id'],
                'day' => $data['day'],
                'discount' => $data['discount'],
                'status' => 2
            ]);
            DB::table('service_enter_coupon_houseware')->where('enter_coupon_houseware_id', $id)->delete();
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $service_houseware = new ServiceEnterCouponHouseware;
                $service_houseware->enter_coupon_houseware_id = $id;
                $service_houseware->houseware_id = $houseware_object->houseware_id;
                $service_houseware->quantity = $houseware_object->quantity;
                $service_houseware->quantity_return = $houseware_object->quantity_return;
                $service_houseware->save();
            }
            $list = DB::table('service_enter_coupon_houseware')->where('enter_coupon_houseware_id', $id)->get();
            foreach ($list as $houseware) {
                $quantity = DB::table('houseware')->where('id', $houseware->houseware_id)->first()->quantity + $houseware->quantity - $houseware->quantity_return;
                DB::table('houseware')->where('id', $houseware->houseware_id)->update(['quantity' => $quantity]);
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

    public function listCouponHouseware($data)
    {
        try {
            $list = DB::table('enter_coupon_houseware');
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

    public function getInfoCouponHouseware($id)
    {
        try {
            $description = DB::table('enter_coupon_houseware')->where('id', $id)->first()->description;
            $status = DB::table('enter_coupon_houseware')->where('id', $id)->first()->status;
            $user_id = DB::table('enter_coupon_houseware')->where('id', $id)->first()->user_id;
            $day = DB::table('enter_coupon_houseware')->where('id', $id)->first()->day;
            $discount = DB::table('enter_coupon_houseware')->where('id', $id)->first()->discount;
            $data = DB::table('houseware')
                ->leftJoin('service_enter_coupon_houseware', 'houseware.id', '=', 'service_enter_coupon_houseware.houseware_id')
                ->where('service_enter_coupon_houseware.enter_coupon_houseware_id', $id)
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

    public function createExportHouseware($data)
    {
        try {
            $object = $data['data'];
            $total = 0;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $total += $houseware_object->cost * $houseware_object->quantity;
            }
            $couponHouseware = new ExportHouseware;
            $couponHouseware->description = $data['description'];
            $couponHouseware->cost = $total;
            $couponHouseware->status = 1;
            $couponHouseware->user_id = $data['user_id'];
            $couponHouseware->save();
            $id = DB::table('export_houseware')->get()->last()->id;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $service_houseware = new ServiceExportHouseware;
                $service_houseware->export_houseware_id = $id;
                $service_houseware->houseware_id = $houseware_object->houseware_id;
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

    public function listExportHouseware($data)
    {
        try {
            $list = DB::table('export_houseware');
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

    public function getInfoExportHouseware($id)
    {
        try {
            $description = DB::table('export_houseware')->where('id', $id)->first()->description;
            $status = DB::table('export_houseware')->where('id', $id)->first()->status;
            $user_id = DB::table('export_houseware')->where('id', $id)->first()->user_id;
            $data = DB::table('houseware')
                ->leftJoin('service_export_houseware', 'houseware.id', '=', 'service_export_houseware.houseware_id')
                ->where('service_export_houseware.export_houseware_id', $id)
                ->get();

            return [
                'success' => true,
                'description' => $description,
                'status' => $status,
                'id' => $user_id,
                'data' => $data,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateExportHouseware($data)
    {
        try {
            $object = $data['data'];
            $total = 0;
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $total += $houseware_object->cost * $houseware_object->quantity;
            }
            $id = $data['id'];
            DB::table('export_houseware')->where('id', $id)->update([
                'cost' => $total,
                'description' => $data['description'],
                'status' => 1,
            ]);
            DB::table('service_export_houseware')->where('export_houseware_id', $id)->delete();
            foreach ($object as $houseware) {
                $houseware_object = json_decode($houseware);
                $service_houseware = new ServiceExportHouseware;
                $service_houseware->export_houseware_id = $id;
                $service_houseware->houseware_id = $houseware_object->houseware_id;
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
            $list = DB::table('export_houseware');
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

    public function approveExportHouseware($id)
    {
        try {
            DB::table('export_houseware')->where('id', $id)->update(['status' => 2]);
            $list = DB::table('service_export_houseware')->where('export_houseware_id', $id)->get();
            foreach ($list as $houseware) {
                $quantity = DB::table('houseware')->where('id', $houseware->houseware_id)->first()->quantity - $houseware->quantity;
                DB::table('houseware')->where('id', $houseware->houseware_id)->update(['quantity' => $quantity]);
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

    public function refuseExportHouseware($id)
    {
        try {
            DB::table('export_houseware')->where('id', $id)->update(['status' => 3]);
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
