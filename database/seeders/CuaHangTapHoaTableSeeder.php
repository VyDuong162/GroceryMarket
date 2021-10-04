<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CuaHangTapHoa;
use App\Models\PhuongXa;
use App\Models\KhachHang;
use DateTime;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Illuminate\Support\Facades\DB;

class CuaHangTapHoaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CuaHangTapHoa::truncate();
        Schema::enableForeignKeyConstraints();
        $faker = \Faker\Factory::create('vi_VN');
        $list=[];
        $limit = 3;
        $date = new DateTime();
        $dsCHTH =['Tập Hóa Thanh','Tập Hóa Thủy','Tập Hóa Ngọc Anh','Tập Hóa Tuấn'];
        $dsSo =['123','456','354'];
        $dsTinh =['Cần Thơ'];
        $dsQH =['Huyện Cờ Đỏ','Quận Thốt Nốt','Quận Ninh Kiều'];
        $dsPX =['Xã Trung Thạnh','Phường Thuận An','Phường An Hòa'];
        for ($i = 0; $i < $limit; $i++) {
            array_push($list,[
                'chth_ma' => $i+2,
                'kh_ma' => KhachHang::all()->random()->kh_ma,
                'chth_ten' => $dsCHTH[$i],
                'chth_anhDaiDien'=>$i."chth.jpg",
                'chth_soDienThoai'=>$faker->numerify('##########'),
                'chth_email' => $faker->unique()->safeEmail,
                'chth_diaChi' =>"$dsSo[$i],$dsPX[$i],$dsQH[$i],$dsTinh[0]",
                'chth_taiKhoanNganHang' => $faker->creditCardNumber(),
                'px_ma'=> PhuongXa::all()->random()->px_ma,
                'chth_moTa' => $faker->paragraph(2),
                'created_at'=> $date
            ]);   
        }
        array_push($list,[
            'chth_ma' => 1,
            'kh_ma' => KhachHang::all()->random()->kh_ma,
            'chth_ten' => $dsCHTH[$i],
            'chth_anhDaiDien'=>"chth5.jpg",
            'chth_soDienThoai'=>$faker->numerify('##########'),
            'chth_email' => "chth5@gmail.com",
            'chth_diaChi' =>"678,Xã Trung An,Huyện Cờ Đỏ,Cần Thơ",
            'chth_taiKhoanNganHang' => $faker->numerify('##########'),
            'px_ma'=> PhuongXa::all()->random()->px_ma,
            'chth_moTa' => $faker->paragraph(2),
            'created_at'=> $date
        ]);   
        DB::table('cuahangtaphoa')->insert($list);
    }
}
