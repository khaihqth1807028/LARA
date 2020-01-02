<?php

use Illuminate\Database\Seeder;

class OderDetailSeeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \Illuminate\Support\Facades\DB::table('oder_details')->delete();
        \Illuminate\Support\Facades\DB::table('oder_details')->truncate();
        \Illuminate\Support\Facades\DB::table('oder_details')->insert([

            [
                "product_id"=>1,
                "order_id"=> 1,
                "quantity"=> 1,
                "unit_price" => \App\Products::find(1)->price,
            ],
            [
                "product_id"=>2,
                "order_id"=> 2,
                "quantity"=> 2,
                "unit_price" => \App\Products::find(2)->price,
            ],
            [
                "product_id"=>3,
                "order_id"=> 3,
                "quantity"=> 1,
                "unit_price" => \App\Products::find(3)->price,
            ],

        ]);
    }
}
