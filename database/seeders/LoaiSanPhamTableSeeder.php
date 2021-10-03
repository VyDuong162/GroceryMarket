<?php

namespace Database\Seeders;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LoaiSanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list =[];
        $date = new DateTime();
        $types=[
            ['Đồ uống'],
            ['Trứng'],
            ['Sữa'],
            ['Mì, cháo, phở, Bún'],
            ['Bánh kẹo'],
            ['Dầu ăn, gia vị'],
            ['Gạo, bột, đồ khô,đồ hộp'],
            ['Đồ mát, đông lạnh'],
            ['Chăm sóc cá nhân'],
            ['Vệ sinh nhà cửa'],
            ['Đồ dùng gia đình'],
            ['Chăm sóc thú cưng'],
        ];
        for($i=0; $i < count($types);$i++){
            array_push($list,[
                'lsp_ten' => $types[$i][0],
                'created_at' =>$date
            ]);
        }
        DB::table('loaisanpham')->insert($list);
    }
    
}
