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
            ['thung-mi-hao-hao-tom-chua-cay-75g-1.jpg',28],
            ['thung-mi-hao-hao-tom-chua-cay-75g-2.jpg',28],
            ['thung-mi-hao-hao-tom-chua-cay-75g-3.jpg',28],
            ['thung-mi-hao-hao-tom-chua-cay-75g-2.jpg',29],
            ['thung-mi-hao-hao-tom-chua-cay-75g-3.jpg',29],
        ];
        for($i=0 ;$i < count($dsHinhAnhSP);$i++){
            array_push($list,[
                'hasp_hinhAnh'=> $dsHinhAnhSP[$i][0],
                'sp_ma' =>  $dsHinhAnhSP[$i][1],
                'created_at' => $date
                
            ]);
        }
        DB::table('hinhanhsanpham')->insert($list);
    }
}
