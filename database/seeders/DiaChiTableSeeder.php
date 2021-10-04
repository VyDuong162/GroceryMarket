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
            ['111, Phường Thạnh An, Quận Thốt Nốt, TP.Cần Thơ'],
            ['11, Phường An Hòa, Huyện Bình Minh, Vĩnh Long']
        ];
        for($i=0; $i < count($dsDiaChi);$i++){
            array_push($list,[
                'dc_ten' => $dsDiaChi[$i][0],
                'kh_ma' => KhachHang::all()->random()->kh_ma,
                'created_at' =>$date
            ]);
        }
        DB::table('diachi')->insert($list);
    }
}
