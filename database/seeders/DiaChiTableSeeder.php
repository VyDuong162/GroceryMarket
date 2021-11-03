<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DateTime;
use App\Models\KhachHang;
use Illuminate\Support\Facades\DB;
class DiaChiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];
        $date = new DateTime();
        $dsDiaChi =[
            ['111, Xã Trung An,Huyện Cờ Đỏ,Cần Thơ'],
            ['11, Xã Phú Hữu,Huyện Châu Thành,Hậu Giang'],
            ['12, Phường Thuận An,Quận Thốt Nốt,Cần Thơ'],
            ['13, Xã Hòa Phú,Huyện Bình Tân,Vĩnh Long'],
            ['14, Phường Hưng Phú,Quận Cái Răng,Cần Thơ'],
            ['15, Xã Hòa An,Huyện Phụng Hiệp,Hậu Giang'],
            ['16, Xã Phú Trung,Huyện Châu Thành,Đồng Tháp'],
            ['174,Phường Thuận An,Quận Thốt Nốt,Cần Thơ'],
            ['18, Phường Trung Kiên,Quận Thốt Nốt,Cần Thơ'],
            ['15,Thị trấn Cái Tắc,Huyện Châu Thành A,Hậu Giang']
           
        ];
        for($i=0; $i < count($dsDiaChi);$i++){
            array_push($list,[
                'dc_ten' => $dsDiaChi[$i][0],
                'kh_ma' => $i+1,
                'created_at' =>$date
            ]);
        }
        DB::table('diachi')->insert($list);
    }
}
