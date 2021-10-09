<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HinhAnhSanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list =[];
        $date =new DateTime();
        $dsHinhAnhSP=[
            [1,28,'thung-mi-hao-hao-tom-chua-cay-75g-1.jpg'],
            [2,28,'thung-mi-hao-hao-tom-chua-cay-75g-2.jpg'],
            [3,28,'thung-mi-hao-hao-tom-chua-cay-75g-3.jpg'],
            [1,29,'thung-mi-hao-hao-tom-chua-cay-75g-2.jpg'],
            [2,29,'thung-mi-hao-hao-tom-chua-cay-75g-3.jpg'],
        ];
        for($i=0 ;$i < count($dsHinhAnhSP);$i++){
            array_push($list,[
                'hasp_ma' =>  $dsHinhAnhSP[$i][0],
                'sp_ma' =>  $dsHinhAnhSP[$i][1],
                'hasp_hinhAnh'=> $dsHinhAnhSP[$i][2],
                'created_at' => $date
                
            ]);
        }
        DB::table('hinhanhsanpham')->insert($list);
    }
}
