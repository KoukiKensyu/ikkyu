<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the databas
     * e seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            $administrator = new \App\Models\Administrator([
                'name' => '管理者' . $i,
                'password' => 1111111 . $i,
            ]);
           $administrator->save();
        }
    }
}
