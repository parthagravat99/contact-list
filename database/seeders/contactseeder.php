<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use Illuminate\Support\Facades\DB;

class contactseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=faker::create();
        for($count=0;$count<100;$count++){
            DB::table('contacts')->insert([
                'name' => $faker->firstname(),
                'number'  => $faker->phoneNumber(),
            ]);
                
    }
    }
}
