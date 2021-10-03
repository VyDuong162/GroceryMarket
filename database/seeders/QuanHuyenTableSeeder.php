<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class QuanHuyenTableSeeder extends Seeder
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
           ['Huyện Cờ Đỏ',1],
           ['Quận Thốt Nốt',1],
           ['Quận Ninh Kiều',1],
           ['Quận Cái Răng',1],
           ['Huyện Châu Thành',2],
           ['Huyện Châu Thành A',2],
           ['Huyện Phụng Hiệp',2],
           ['Huyện Cao Lãnh',3],
           ['Huyện Châu Thành',3],
           ['Huyện Lai Vung',3],
           ['Huyện Bình Tân',4],
           ['Huyện Long Hồ',4],
           ['Huyện Trà Ôn',4],
           ['Tp.Long Xuyên',5]
        ];
        for($i=0; $i < count($types); $i++){
            array_push($list,[
                'qh_ten' => $types[$i][0],
                'ttp_ma' => $types[$i][1]
            ]);
        }
        DB::table('quanhuyen')->insert($list);
    }
}
