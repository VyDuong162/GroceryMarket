<?php

namespace Database\Seeders;

use App\Models\DonGia_MatHang;
use App\Models\CuaHangTapHoa;
use App\Models\DiaChi;
use App\Models\SanPham;
use App\Models\DonHang;
use App\Models\KhachHang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Schema;
class DonHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DonHang::truncate();
        Schema::enableForeignKeyConstraints();
        $list=[];
        $faker = \Faker\Factory::create('vi_VN');
        $date = new DateTime();
        $limit =2;
        $kh1 =KhachHang::all()->first();
        $kh2 =KhachHang::all()->last();
        $dsDiaChi =[
            ['121, Phường Thạnh An, Quận Thốt Nốt, TP.Cần Thơ'],
            ['11, Phường An Hòa, Quận Ninh Kiều, TP.Cần Thơ']
        ];
        
        array_push($list,[
            'kh_ma' => $kh1->kh_ma,
            'chth_ma' => 1,
            'dh_diaChi' => $dsDiaChi[0][0],
            'dh_giaTri' => $faker->numberBetween(200000,1000000),
            'dh_soDienThoai' =>  $kh1->kh_soDienThoai,
            'dh_email' => $kh1->kh_email,
            'dh_trangThai' => 1,
            'dh_taoMoi' => $date
        ]);
        array_push($list,[
            'kh_ma' => $kh2->kh_ma,
            'chth_ma' => 2,
            'dh_diaChi' => $dsDiaChi[1][0],
            'dh_giaTri' => $faker->numberBetween(200000,1000000),
            'dh_soDienThoai' =>  $kh2->kh_soDienThoai,
            'dh_email' => $kh2->kh_email,
            'dh_trangThai' => 2,
            'dh_taoMoi' => $date
        ]);
        DB::table('donhang')->insert($list);
    }
}
