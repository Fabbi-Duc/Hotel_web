<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Models\Foods;
use App\Models\Parks;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Facades\DB;

class UserRepository extends RepositoryAbstract implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }

    public function getListUsers($data)
    {
        try {
            $list = $this->model;
            $perPage = $data['perPage'];
            $lastname = $data['lastname'];
            $firstname = $data['firstname'];
            $position = $data['position'];

            if($data['lastname'] && $data->has('lastname')) {
                $list->where('lastname', 'LIKE', "%$lastname%");
            }

            if($data['firstname'] && $data->has('firstname')) {
                $list->where('firstname', 'LIKE', "%$firstname%");
            }

            if($data['position'] && $data->has('position')) {
                
                $list->where('position', 'LIKE', "%$position%");
            }
                              
            return [
                'success' => true,
                'listUser' => $list->paginate($perPage)
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getInfoUser($id)
    {
        try {
            //code...
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

    public function updateUser($data, $id)
    {
        try {
            //code...
            DB::table('users')->where('id', $id['id'])->update(
                [
                    'lastname' => $data['last_name'], 
                    'firstname' => $data['first_name'], 
                    'phone' => $data['phone'], 
                    'position' => $data['position'], 
                    'gender' => $data['gender'],
                    'email' => $data['email'],
                    'birthday' => $data['birthday'],
                    'image_user' => $data['image_url']
                ]
            );

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

    public function createUser($data)
    {
        try {
            //code...
            $user = new User;
            $user->lastname = $data['last_name'];
            $user->firstname = $data['first_name'];
            $user->gender = $data['gender'];
            $user->phone = $data['phone'];
            $user->image_user = $data['image_url'];
            $user->position = $data['position'];
            $user->email = $data['email'];
            $user->birthday = $data['birthday'];
            $user->password = bcrypt($data['password']);
            $user->save();

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

    public function deleteUser($id)
    {
        $this->model->find($id)->delete();
    }

    public function createFood($data)
    {
        try {
            $food = new Foods;
            $food->name = $data['name'];
            $food->cost = $data['cost'];
            $food->type = $data['type'];
            $food->image_url = $data['image_url'];
            $food->save();
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

    public function updateFood($data)
    {
        try {
            $food = DB::table('foods')->where('id', $data['food_id'])->update([
                'name' => $data['name'],
                'cost' => $data['cost'],
                'type' => $data['type'],
                'image_url' => $data['image_url'],
            ]);

            return [
                'success' =>true
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function deleteFood($id)
    {
        try {
            //code...
            $food = DB::table('foods')->where('id', $id)->delete();

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

    public function listFood($data)
    {
        try {
            //code...
            $list = DB::table('foods');
            if (!empty($data['name'])) {
                $name = $data['name'];
                $list = $list->where('name', 'LIKE', "%$name%");
            }
            if (!empty($data['type'])) {
                $list = $list->where('type', $data['type']);
            }

            return [
                'success' => true,
                'data' => $list->paginate(5)
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getInfoFood($id)
    {
        try {
            //code...
            $food = DB::table('foods')->find($id);

            return [
                'success' => true,
                'data' => $food
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function createPark($data)
    {
        try {
            $park = new Parks;
            $park->name = $data['name'];
            $park->floor = $data['floor'];
            $park->type = $data['type'];
            $park->status = "1";
            $park->save();
            
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
