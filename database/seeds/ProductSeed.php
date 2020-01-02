<?php

use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        DB::table('products')->insert([
        [
           "id" => 1,
           "name" =>"Giày Gucci1",
           "price"=> "20000",
           "status"=> 1 ,

        ],
        [
        "id" => 2,
            "name" =>"Giày Gucci2",
            "price"=> "20000",
            "status"=> 1 ,

        ],
        [
        "id" => 3,
           "name" =>"Giày Gucci3",
            "price"=> "20000",
           "status"=> 1 ,

        ],
        ]);
    }
}
