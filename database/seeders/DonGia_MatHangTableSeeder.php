<?php

namespace Database\Seeders;

use App\Models\DonGia_MatHang;
use App\Models\CuaHangTapHoa;
use App\Models\SanPham;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;
class DonGia_MatHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DonGia_MatHang::truncate();
        Schema::enableForeignKeyConstraints();
        $list=[];
        $faker = \Faker\Factory::create('vi_VN');
        $date = new DateTime();
        $types =SanPham::all('sp_ma');
        $arr =[1,4,24,48];
        for($i=0; $i < 10; $i++){
            $gia =0;
            if($i%2==0){
                $gia = 10000;
            }else{
                $gia = 15000;
            }
            array_push($list,[
                'chth_ma' => 1,
                'sp_ma' => $types[$i]['sp_ma'],
                'dgmh_gia' => $gia,
                'dgmh_ghiChu' => Arr::random($arr),
                'dgmh_ngayCapNhat' => $date,
                'created_at' => $date,
            ]);
        }
        for($i=10; $i < 22; $i++){
            $gia =0;
            if($i%2==0){
                $gia = 10000;
            }else{
                $gia = 15000;
            }
            array_push($list,[
                'chth_ma' => 2,
                'sp_ma' => $types[$i]['sp_ma'],
                'dgmh_gia' => $gia,
                'dgmh_ghiChu' => Arr::random($arr),
                'dgmh_ngayCapNhat' => $date,
                'created_at' => $date,
            ]);
        }
        for($i=22; $i < 33; $i++){
            $gia =0;
            if($i%2==0){
                $gia = 10000;
            }else{
                $gia = 15000;
            }
            array_push($list,[
                'chth_ma' => 3,
                'sp_ma' => $types[$i]['sp_ma'],
                'dgmh_gia' => $gia,
                'dgmh_ghiChu' => Arr::random($arr),
                'dgmh_ngayCapNhat' => $date,
                'created_at' => $date,
            ]);
        }
        DB::table('dongia_mathang')->insert($list);
    }
}
