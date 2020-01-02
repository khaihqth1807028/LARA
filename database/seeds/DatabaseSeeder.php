<?php

use Illuminate\Database\Eloquent\Model;
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

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');



//        Model::reguard();
//         $this->call(UsersTableSeeder::class);
        $this->call(ProductSeed::class);
        $this->call(OderSeeed::class);
        $this->call(OderDetailSeeed::class);
        $this->call(CustomerSeed::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
