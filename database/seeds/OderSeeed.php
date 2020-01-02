<?php

use Illuminate\Database\Seeder;

class OderSeeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('oders')->truncate();
        \Illuminate\Support\Facades\DB::table('oders')->insert([

            [
                "id"=>1,
                "total_price"=> 20000,
                "status"=>0,
                "customer_id"=>1,
            ],
            [
            "id"=>2,
            "customer_id"=>1,
            "total_price"=> 40000,
            "status"=>0,
        ],
            [
                "id"=>3,
                "total_price"=> 20000,
                "status"=>0,
                "customer_id"=>2,
            ]

        ]);
    }
}
