<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
class VaiTroTableSeeder extends Seeder
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
          ['admin'],
          ['chucuahang'],
          ['khachang']
        ];
        for($i=0; $i < count($types);$i++){
            array_push($list,[
                'vt_ten' => $types[$i][0],
                'created_at' =>$date
            ]);
        }
        DB::table('vaitro')->insert($list);
    }
}
