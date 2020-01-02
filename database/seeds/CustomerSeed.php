<?php

use Illuminate\Database\Seeder;

class CustomerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('customers')->truncate();
        \Illuminate\Support\Facades\DB::table('customers')->insert([

            [
              "id"=>1,
              "name"=>"Hồ Khải",

              "address"=>"Hà Nội",
              "note"  =>"giao hàng tốc độ"
            ],
            [
                "id"=>2,
                "name"=>"Hồ Hùng",

                "address"=>"Hà Nội",
                "note"  =>"giao hàng tốc độ"
            ],

            ]);

    }
}
