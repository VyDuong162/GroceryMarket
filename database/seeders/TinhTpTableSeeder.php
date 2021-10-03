<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TinhTpTableSeeder extends Seeder
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
           ['Cần Thơ'],
           ['Hậu Giang'],
           ['Đồng Tháp'],
           ['Vĩnh Long'],
           ['An Giang']
        ];
        for($i=0; $i < count($types); $i++){
            array_push($list,[
                'ttp_ten' => $types[$i][0]
            ]);
        }
        DB::table('tinhtp')->insert($list);
    }
}
