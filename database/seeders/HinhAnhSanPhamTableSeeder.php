<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HinhAnhSanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list =[];
        $date =new DateTime();
        $dsHinhAnhSP=[
            [ 'thung-sua-tuoi-co-duong-vinamilk-100-sua-tuoi-180ml_300x300.jpg',1,1], 
            [ 'thung-sua-dinh-duong-socola-vinamilk-adm-gold-180ml_300x300.jpg',2,1], 
            [ 'thung-sua-dinh-duong-it-duong-vinamilk-220ml_300x300.jpg',3,1], 
            [ 'thung-sua-tuoi-tach-beo-khong-duong-vinamilk-100-sua-tuoi-180ml_300x300.jpg',4,1], 
            [ 'sua-dinh-duong-co-duong-vinamilk-happy-star-bich-220ml_300x300.jpg',5,1], 
            [ 'loc-sua-tuoi-tiet-trung-co-duong-th-true-milk-180ml_300x300.jpg',6,1], 
            [ 'thung-sua-tuoi-tiet-trung-co-duong-th-true-milk-110ml_300x300.jpg',7,1], 
            [ 'thung-sua-tuoi-tiet-trung-it-duong-th-true-milk-180ml_300x300.jpg',8,1], 
            [ 'thung-sua-dinh-duong-huong-dau-vinamilk-adm-gold-180ml_300x300.jpg',9,1], 
            [ 'loc-sua-dau-nanh-oc-cho-vinamilk-180ml_300x300.jpg',10,1], 
            [ 'loc-sua-chua-uong-huong-viet-quat-th-true-yogurt-180ml_300x300.jpg',11,2], 
            [ 'thung-sua-chua-uong-huong-viet-quat-th-true-yogurt-180ml_300x300.jpg',12,2], 
            [ 'loc-sua-trai-cay-vi-dau-vinamilk-hero-hop-110ml_300x300.jpg',13,2], 
            [ 'thung-sua-trai-cay-vi-dau-vinamilk-hero-hop-110ml_300x300.jpg',14,2], 
            [ 'snack-khoai-tay-vi-tao-bien-nori-lays-goi-52g_300x300.jpg',15,2], 
            [ 'snack-khoai-tay-vi-tu-nhien-classic-lays-goi-52g_300x300.jpg',16,2], 
            [ 'loc-nuoc-ngot-coca-cola-600m_300x300.jpg',17,2], 
            [ 'thung-nuoc-ngot-coca-cola-600ml_300x300.jpg',18,2], 
            [ 'nuoc-ngot-coca-cola-600ml_300x300.jpg',19,2], 
            [ 'nuoc-ngot-pepsi-khong-calo-vi-chanh-320ml.jpg',20,2], 
            [ 'loc-nuoc-ngot-pepsi-khong-calo-vi-chanh-320ml-300x300.jpg',21,2], 
            [ 'thung-nuoc-ngot-pepsi-khong-calo-vi-chanh-320ml_300x300.jpg',22,2], 
            [ 'thung-nuoc-ngot-pepsi-khong-calo-320ml_300x300.jpg',23,3], 
            [ 'loc-nuoc-ngot-pepsi-khong-calo-320ml-300x300.jpg',24,3], 
            [ 'nuoc-ngot-pepsi-khong-calo-330ml_300x300.jpg',25,3], 
            [ 'tra-atiso-lama-hop-50g_300x300.jpg',26,3], 
            [ 'ca-phe-sua-vinacafe-gold-original-800g_300x300.jpg',27,3], 
            [ 'thung-mi-hao-hao-tom-chua-cay-75g_300x300.jpg',28,3], 
            [ 'mi-hao-hao-tom-chua-cay-goi-75g_300x300.jpg',29,3], 
            [ 'mi-hao-hao-sa-te-hanh_300x300.jpg',30,3], 
            [ 'thung-mi-hao-hao-sa-te-hanh_300x300.jpg',31,3], 
            [ 'thung-mi-3-mien-tom-chua-cay-65g_300x300.jpg',32,3], 
            [ 'thung-mi-3-mien-tom-chua-cay-65g-2.jpg',33,3], 
            ['thung-mi-hao-hao-tom-chua-cay-75g-1.jpg',28,3],
            ['thung-mi-hao-hao-tom-chua-cay-75g-2.jpg',28,3],
            ['thung-mi-hao-hao-tom-chua-cay-75g-3.jpg',28,3],
            ['thung-mi-hao-hao-tom-chua-cay-75g-2.jpg',29,3],
            ['thung-mi-hao-hao-tom-chua-cay-75g-3.jpg',29,3],
        ];
        for($i=0 ;$i < count($dsHinhAnhSP);$i++){
            array_push($list,[
                'hasp_hinhAnh'=> $dsHinhAnhSP[$i][0],
                'sp_ma' =>  $dsHinhAnhSP[$i][1],
                'chth_ma' =>  $dsHinhAnhSP[$i][2],
                'created_at' => $date
                
            ]);
        }
        DB::table('hinhanhsanpham')->insert($list);
    }
}
