<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KhachHang;
use App\Models\PhuongXa;
use DateTime;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class KhachHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        KhachHang::truncate();
        Schema::enableForeignKeyConstraints();
        $list=[];
        $faker = \Faker\Factory::create('vi_VN');
        $limit = 10;
        $date = new DateTime();
        $dsKhachHang =['Dương Thị Tường Vy','Trần Thanh Tâm','Nguyễn Anh','Ngọc Thanh Tâm','Nguyễn Lý An','Hồng Phúc Tân','Phạm Thanh Ngân',
        'Phạm Băng','Nguyễn Văn Đậu','Nguyễn Phi Thanh','Thái Ngọc Anh'];
       
        for ($i = 2; $i <= $limit; $i++) {
            if($i <= 5){
                $vt_ma = 2;
             }else{
                 $vt_ma =3;
             }
            array_push($list,[
                'kh_ma' => $faker->unique()->ean8,
                'kh_hoTen' => $dsKhachHang[$i-1],
                'kh_gioiTinh' => random_int(0,1),
                'kh_ngaySinh' => $faker->date('Y-m-d'),
                'kh_soDienThoai'=>$faker->numerify('##########'),
                'kh_email' => $faker->unique()->email,
                'kh_taiKhoan' => Str::random(8),
                'kh_matKhau' => Hash::make(12345678),
                'vt_ma' => $vt_ma,
                'px_ma'=>PhuongXa::all()->random()->px_ma,
                'created_at'=> $date
            ]);   
        }
        array_push($list,[
            'kh_ma' => '12345678',
            'kh_hoTen' => $dsKhachHang[0],
            'kh_gioiTinh' => 1,
            'kh_ngaySinh' => $faker->date('Y-m-d'),
            'kh_soDienThoai'=>$faker->numerify('##########'),
            'kh_email' =>"admin@gmail.com",
            'kh_taiKhoan' => 'admin',
            'kh_matKhau' => Hash::make(12345678),         
            'vt_ma' => 1,
            'px_ma'=>1,
            'created_at'=> $date
        ]);  
        DB::table('khachhang')->insert($list);

    }
}
