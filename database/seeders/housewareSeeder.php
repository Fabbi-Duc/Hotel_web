<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class housewareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('houseware')->truncate();
        DB::table('houseware')->insert(
            [
                'name' => 'Giường đơn',
                'quantity' => '100',
                'quantity_broken' => '20',
                'cost' => '2500000',
            ]
        );

        DB::table('houseware')->insert([
            'name' => 'Giường đôi',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '3000000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Chăn',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Đệm',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Gối',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Tủ',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '1500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Đèn ngủ',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Điện thoại bàn',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '1500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Rèm cửa sổ',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Tivi',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '2500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Thiết bị phát hiện khói báo cháy',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '2500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Bàn ghế uống nước',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '2500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Bàn làm việc',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '1500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Bồn rửa mặt',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Gương',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Đèn trần nhà tắm',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Đèn trên gương soi',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Vòi nước',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Bình nước nóng',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Vòi hoa sen',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Đệm',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Móc treo quần áo',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Bồn cầu',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Chuông gọi cửa',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Hệ thống quét mã vạch',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '1500000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Ổ cắm điện',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '50000',
        ]);

        DB::table('houseware')->insert([
            'name' => 'Bồn cầu',
            'quantity' => '100',
            'quantity_broken' => '20',
            'cost' => '500000',
        ]);
    }
}
