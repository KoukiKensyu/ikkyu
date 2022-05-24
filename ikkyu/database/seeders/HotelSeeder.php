<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            $hotel = new \App\Models\Hotel([
                'name' => 'ホテル' . $i,
                'hotel_type' => rand(1,5),
                'address' => $i . '県' . $i . '市' . $i .'町',
                'checkin_time' => '15:00',
                'checkout_time' => '12:00',
                'max_rooms' => rand(5,10),
                'comment' => 'テストコメント'. $i,
            ]);
           $hotel->save();
        }
    }
}
