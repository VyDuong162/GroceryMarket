<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
class TrangThaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list =[];
        $date = new DateTime();
        $types=[
         ['Chờ xác nhận'],
         ['Đang xử lý'],
         ['Đang vận chuyển'],
         ['Giao thành công']
        ];
        for($i=0; $i < count($types);$i++){
            array_push($list,[
                'tt_ten' => $types[$i][0],
                'created_at' =>$date
            ]);
        }
        DB::table('trangthai')->insert($list);
    }
}
