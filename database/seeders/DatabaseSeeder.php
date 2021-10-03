<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(LoaiSanPhamTableSeeder::class);
        $this->call(NhaSanXuatTableSeeder::class);
        $this->call(DonViTinhTableSeeder::class);
        $this->call(SanPhamTableSeeder::class);
        $this->call(TinhTpTableSeeder::class);
        $this->call(QuanHuyenTableSeeder::class);
        $this->call(PhuongXaTableSeeder::class);
        $this->call(VaiTroTableSeeder::class);
        $this->call(KhachHangTableSeeder::class);
        $this->call(CuaHangTapHoaTableSeeder::class);
        $this->call(PhuongThucThanhToanTableSeeder::class);
    }
}
