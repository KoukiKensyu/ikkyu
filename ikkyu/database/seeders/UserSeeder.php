<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            $user = new \App\Models\User([
                'name' => 'ユーザー' . $i,
                'address'=> '東京都' . $i . '市' . $i .'丁目' ,
                'tel'=> '080-0000-000' . '$i',
                'email'=> $i . '@gmail.com',
                'birthday'=> '2000-12-01',
                'password'=> 1000000 . $i,
            ]);
           $user->save();
        }
    }
}
