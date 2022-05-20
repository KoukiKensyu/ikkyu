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
                'name' => 'プラン' . $i,
                'hotel_id'=> rand(1,5),
                'price'=> rand(10,50) *1000,
                'rooms'=> rand(1,10),
            ]);
           $plan->save();
        }
    }
}
