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
        $user = new \App\Models\User([
            'name' => '雨宮愛里',
            'address'=> '福井県敦賀市羽織町4-6-15',
            'tel'=> '0770675888',
            'email'=> 'Airi_Amemiya@kybzmdcct.bly',
            'birthday'=> '1964/05/07',
            'password'=> bcrypt(00000000),
        ]);
        $user->save();
    
        $user = new \App\Models\User([
            'name' => '奈良昭夫',
            'address'=> '和歌山県和歌山市植松丁3-6',
            'tel'=> '0737798981',
            'email'=> 'akionara@wzzwwafzyt.lem',
            'birthday'=> '1968/08/16',
            'password'=> bcrypt(00000000),
        ]);
        $user->save();

        $user = new \App\Models\User([
            'name' => '清田萌恵',
            'address'=> '東京都新宿区二十騎町',
            'tel'=> '0301690697',
            'email'=> 'moe_kiyota@mdibonn.alv',
            'birthday'=> '1992/09/27',
            'password'=> bcrypt(00000000),
        ]);
        $user->save();

        $user = new \App\Models\User([
            'name' => '小平浩一	',
            'address'=> '佐賀県伊万里市黒川町立目',
            'tel'=> '0942596504',
            'email'=> 'Kouichi_Kodaira@fshkqlmmhx.om',
            'birthday'=> '1966/09/22',
            'password'=> bcrypt(00000000),
        ]);
        $user->save();

        $user = new \App\Models\User([
            'name' => '大野亜沙美',
            'address'=> '東京都足立区足立1-15-10',
            'tel'=> '0374764975',
            'email'=> 'asami19303@exisi.ga',
            'birthday'=> '1986/03/16',
            'password'=> bcrypt(00000000),
        ]);
        $user->save();

        $user = new \App\Models\User([
            'name' => '中川孝宏',
            'address'=> '新潟県上越市米町2-16コート米町413',
            'tel'=> '0254753377',
            'email'=> 'awxydnnrhuaetakahiro84549@whqrrrxuff.qco',
            'birthday'=> '1977/11/21',
            'password'=> bcrypt(00000000),
        ]);
        $user->save();

        $user = new \App\Models\User([
            'name' => '福沢洋子',
            'address'=> '静岡県静岡市駿河区光陽町4-11-15',
            'tel'=> '0531433046',
            'email'=> 'youko088@yzwcqn.tx',
            'birthday'=> '1972/12/24',
            'password'=> bcrypt(00000000),
        ]);
        $user->save();
    }
}
