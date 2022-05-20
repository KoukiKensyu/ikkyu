<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
        $reservation = new \App\Models\Reservation([
            'user_id'=> $i,
            'plan_id'=> $i,
            'reserved_date'=>  '2022-10-1' . $i,
            'checkin_date'=> '2022-11-0' . $i, 
            'checkout_date'=> '2022-12-0'. $i,
            'rooms' => rand(1,2),
        ]);
       $reservation->save();
        }
    }
}
