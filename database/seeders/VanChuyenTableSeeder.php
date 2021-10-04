<?php

namespace Database\Seeders;

use App\Models\VanChuyen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\TrangThai;
use App\Models\DonHang;
use Datetime;
use Illuminate\Support\Facades\DB;
class VanChuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        VanChuyen::truncate();
        Schema::enableForeignKeyConstraints();
        $list=[];
        $faker = \Faker\Factory::create('vi_VN');
      
        $date = new DateTime();
        $today = $date->format('Y-m-d H:i:s');
        $dsTrangThai = TrangThai::all('tt_ma');
        for($i=0; $i < count($dsTrangThai);$i++){
            array_push($list,[
                'dh_ma' => 2,
                'tt_ma' =>  $dsTrangThai[$i]['tt_ma'],
                'vc_ngay' =>  date('Y-m-d H:i:s',strtotime('-1 hour',strtotime($today))),
                'created_at' => date('Y-m-d H:i:s',strtotime('-1 hour',strtotime($today)))
            ]);
        }
        array_push($list,[
            'dh_ma' => 1,
            'tt_ma' => 2,
            'vc_ngay' =>  date('Y-m-d H:i:s',strtotime('-30 minutes',strtotime($today))),
            'created_at' => date('Y-m-d H:i:s',strtotime('-30 minutes',strtotime($today)))
        ]);
        DB::table('vanchuyen')->insert($list);
    }
}
