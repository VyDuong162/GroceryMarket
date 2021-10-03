<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PhuongXaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];
        $types =[
           ['Xã Trung An',1],
           ['Xã Trung Thạnh',1],
           ['Thị trấn cờ đỏ',1],
           ['Phường Thuận An',2],
           ['Phường Trung Kiên',2],
           ['Phường An Hòa',3],
           ['Phường An Khánh',3],
           ['Phường An Phú',3],
           ['Phường Hưng Phú',4],
           ['Phường Hưng Thạnh',4],
           ['Phường An Phú',4],
           ['Xã Đông Thạnh',5],
           ['Xã Phú Hữu',5],
           ['Bảy Ngàn',6],
           ['Thị trấn Cái Tắc',6],
           ['Xã Hòa An',7],
           ['Xã Thạnh Hòa',7],
           ['Thị trấn Mỹ Tho',8],
           ['Xã An Bình',8],
           ['Xã Phú Trung',9],
           ['Xã Long Hậu',10],
           ['Xã Phong Hòa',10],
           ['Xã Hòa Phú',11],
           ['Xã Long An',11],
           ['Xã Thiện Mỹ',12],
           ['Xã Vĩnh Xuân',12],
           ['Phường Bình Khánh',13],
           ['Phường Mỹ Long',13]
        ];
        for($i=0; $i < count($types); $i++){
            array_push($list,[
                'px_ten' => $types[$i][0],
                'qh_ma' => $types[$i][1]
            ]);
        }
        DB::table('phuongxa')->insert($list);
    }
}
