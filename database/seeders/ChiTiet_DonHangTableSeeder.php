<?php

namespace Database\Seeders;

use App\Models\DonGia_MatHang;
use App\Models\DonHang;
use App\Models\ChiTiet_DonHang;
use App\Models\SanPham;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Schema;

class ChiTiet_DonHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        ChiTiet_DonHang::truncate();
        Schema::enableForeignKeyConstraints();
        $list=[];
        $faker = \Faker\Factory::create('vi_VN');
        $date = new DateTime();
        $limit =2;
        $dsSanPham =SanPham::all('sp_ma');
        $dsDonGia =DonGia_MatHang::all();
        $dsDH =DonHang::all('dh_ma');
        for($i=0; $i < $limit; $i++){
                array_push($list,[
                    'dh_ma' => $dsDH->first()->dh_ma,
                    'sp_ma' => DonGia_MatHang::all()->random()->sp_ma,
                    'ctdh_soLuong' =>1,
                    'ctdh_giaBan' => 15000,
                    'created_at' => $date
                ]);
           
        }
        for($i=0; $i < $limit; $i++){
            array_push($list,[
                'dh_ma' =>  $dsDH->last()->dh_ma,
                'sp_ma' => DonGia_MatHang::all()->random()->sp_ma,
                'ctdh_soLuong' =>1,
                'ctdh_giaBan' =>15000,
                'created_at' => $date
            ]);
       
        }
         
        DB::table('chitiet_donhang')->insert($list);
    }
}
