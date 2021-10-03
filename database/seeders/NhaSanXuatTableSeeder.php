<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
class NhaSanXuatTableSeeder extends Seeder
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
        $types =[
            ['Việt Nam'],
            ['Simply (Việt Nam)'],
            ['Trường An (Việt Nam)'],
            ['Vinamilk (Việt Nam)'],
            ['TH true MILK (Việt Nam)'],
            ['Coca Cola (Mỹ)- tại Việt Nam'],
            ['Pepsi (Mỹ)- tại Việt Nam'],
            ['Nam Ngư(Việt Nam)'],
            ['Thiên Hương(Việt Nam)'],
            ['Maggi (Việt Nam)'],
            ['Tam Thái Tử (Việt Nam)'],
            ['Chinsu (Việt Nam)'],
            ['Vua Gạo (Việt Nam)'],
            ['Hảo Hảo (Việt Nam)'],
            ['3 Miền (Việt Nam)'],
            ['Yến Việt (Việt Nam)'],
            ['Pink Rocket Topokki (Hàn Quốc)'],
            ['NutiFood (Việt Nam)'],
            ['Bobby (Nhật Bản)'],
            ['Jomi (Nhật Bản)'],
            ['Johnsons (Mỹ)'],
            ['Bless You (Việt Nam)'],
            ['Comfort (Việt Nam)'],
            ['IZI HOME (Thái Lan) - Tại Việt Nam'],
            ['Pedigree (Thái Lan)'],
            ['Scotch Brite (Mỹ) - Tại Việt Nam'],
            ['Thiên Long (Việt Nam)'],
            ['Cầu Tre (Việt Nam)'],
            ['Fami (Việt Nam)'],
        ];
        for($i=0; $i < count($types); $i++){
            array_push($list,[
                'nsx_ten' => $types[$i][0],
                'created_at' => $date,
            ]);
        }
        DB::table('nhasanxuat')->insert($list);
    }
}
