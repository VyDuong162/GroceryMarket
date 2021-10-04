<?php

namespace Database\Seeders;

use App\Models\HoaDon;
use App\Models\CuaHangTapHoa;
use App\Models\DonHang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
class HoaDonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        HoaDon::truncate();
        Schema::enableForeignKeyConstraints();
        $list=[];
        $faker = \Faker\Factory::create('vi_VN');
      
        $date = new DateTime();
        $today = $date->format('YmdHis');
        array_push($list,[
            'hd_ma' => $today,
            'hd_giaTri' =>  DonHang::all()->last()->dh_giaTri,
            'hd_ngayLap' =>  new DateTime(),
            'dh_ma' =>  DonHang::all()->last()->dh_ma,
            'created_at' => $date
        ]);
        DB::table('hoadon')->insert($list);
    }
}
