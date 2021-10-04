<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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
        $this->call(HinhAnhSanPhamTableSeeder::class);
        $this->call(TinhTpTableSeeder::class);
        $this->call(QuanHuyenTableSeeder::class);
        $this->call(PhuongXaTableSeeder::class);
        $this->call(VaiTroTableSeeder::class);
        $this->call(KhachHangTableSeeder::class);
        $this->call(DiaChiTableSeeder::class);
        $this->call(CuaHangTapHoaTableSeeder::class);
        $this->call(PhuongThucThanhToanTableSeeder::class);
        Model::unguard();
        $this->call(DonGia_MatHangTableSeeder::class);
        Model::reguard();
        $this->call(DonHangTableSeeder::class);
        $this->call(ChiTiet_DonHangTableSeeder::class);
        $this->call(HoaDonTableSeeder::class);
        $this->call(DanhGiaTableSeeder::class);
        $this->call(TrangThaiTableSeeder::class);
    }
}
