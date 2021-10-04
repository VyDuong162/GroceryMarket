<?php

namespace Database\Seeders;

use App\Models\ChiTiet_DonHang;
use App\Models\HoaDon;
use App\Models\CuaHangTapHoa;
use App\Models\DonHang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Schema;
class DanhGiaTableSeeder extends Seeder
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
        array_push($list,[
            'sp_ma' =>  ChiTiet_DonHang::all()->last()->sp_ma,
            'chth_ma' =>  DonHang::all()->last()->chth_ma,
            'dg_soDiem' =>  5,
            'dg_noiDung' =>  $faker->sentence(3),
            'dg_thoiGian' =>  $date,
            'dg_trangThai' => 2
        ]);
        DB::table('danhgia')->insert($list);
    }
}
