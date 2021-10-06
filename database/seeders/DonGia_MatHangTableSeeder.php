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
            array_push($list,[
                'chth_ma' => 1,
                'sp_ma' => $types[$i]['sp_ma'],
                'dgmh_gia' => $faker->numberBetween($min = 20000, $max = 600000),
                'dgmh_ghiChu' => Arr::random($arr),
                'dgmh_ngayCapNhat' => $date,
                'created_at' => $date,
            ]);
        }
        for($i=10; $i < 22; $i++){
            array_push($list,[
                'chth_ma' => 2,
                'sp_ma' => $types[$i]['sp_ma'],
                'dgmh_gia' => $faker->numberBetween($min = 20000, $max = 600000),
                'dgmh_ghiChu' => Arr::random($arr),
                'dgmh_ngayCapNhat' => $date,
                'created_at' => $date,
            ]);
        }
        for($i=22; $i < 33; $i++){
            array_push($list,[
                'chth_ma' => 3,
                'sp_ma' => $types[$i]['sp_ma'],
                'dgmh_gia' => $faker->numberBetween($min = 20000, $max = 600000),
                'dgmh_ghiChu' => Arr::random($arr),
                'dgmh_ngayCapNhat' => $date,
                'created_at' => $date,
            ]);
        }
        DB::table('dongia_mathang')->insert($list);
    }
}
