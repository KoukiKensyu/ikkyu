<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            $plan = new \App\Models\Plan([
                'name' => '素泊まりプラン：ホテル' . $i,
                'hotel_id'=> $i,
                'price'=> rand(10,50) *1000,
                'rooms'=> 1,
            ]);
           $plan->save();
        }
    }
}
