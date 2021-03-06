<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
class DonViTinhTableSeeder extends Seeder
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
            ['gam'],
            ['lít'],
            ['hộp'],
            ['chai'],
            ['cái'],
            ['kg'],
            ['ml'],
            ['bịch'],
        ];
        for($i=0; $i < count($types);$i++){
            array_push($list,[
                'dvt_ten' => $types[$i][0],
                'created_at' =>$date
            ]);
        }
        DB::table('donvitinh')->insert($list);
    }
}
