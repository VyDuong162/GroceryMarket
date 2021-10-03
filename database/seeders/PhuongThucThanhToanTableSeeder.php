<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
class PhuongThucThanhToanTableSeeder extends Seeder
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
         ['Thanh toán qua Vn Pay'],
         ['Thanh toán qua Payoo'],
         ['Thanh toán trực tiếp']
        ];
        for($i=0; $i < count($types);$i++){
            array_push($list,[
                'pttt_ten' => $types[$i][0],
                'created_at' =>$date
            ]);
        }
        DB::table('phuongthucthanhtoan')->insert($list);
    }
}
