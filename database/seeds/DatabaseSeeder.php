<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Fest;
use App\Presen;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(FestsTableSeeder::class);
        $this->call(PresensTableSeeder::class);

        Model::reguard();
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('users')->delete();

        $users = collect(['tsukimura@kronos-jp.net', 'yoshida@kronos-jp.net', 'abiru@kronos-jp.net', 'yamano@kronos-jp.net', 'kita@kronos-jp.net', 'takimoto@kronos-jp.net', 'onishi@kronos-jp.net', 'otomo@kronos-jp.net', 'tanaka@kronos-jp.net', 'motoyama@kronos-jp.net', 'murayama@kronos-jp.net', 'fujiwara@kronos-jp.net', 'oishi@kronos-jp.net', 'hiromi_funamoto@kronos-jp.net', 'takafumi_ota@kronos-jp.net', 'koji_kameno@kronos-jp.net', 'hironori_yabuuchi@kronos-jp.net', 'yasuhiro_hosokawa@kronos-jp.net', 'naoki_nishitani@kronos-jp.net', 'tomofumi_takayama@kronos-jp.net', 'masashi_miyamoto@kronos-jp.net', 'takeshi_koizumi@kronos-jp.net', 'norihiko_yoshida@kronos-jp.net', 'takeo_suzuki@kronos-jp.net', 'ayako_ezura@kronos-jp.net', 'kenji_kojima@kronos-jp.net', 'yuka_nitsuma@kronos-jp.net', 'takashi_hiroshima@kronos-jp.net', 'yunosuke_hiratsuka@kronos-jp.net', 'masanori_sugiura@kronos-jp.net', 'toshiki_takahashi@kronos-jp.net', 'tatsuya_sumihara@kronos-jp.net', 'takashi_shindou@kronos-jp.net', 'toshihisa_inoue@kronos-jp.net', 'koya_ohira@kronos-jp.net', 'tomoya_yoshimoto@kronos-jp.net', 'tatsuya_tanimoto@kronos-jp.net', 'taro_matsubara@kronos-jp.net', 'shiori_nishijima@kronos-jp.net', 'nobuaki_suzuki@kronos-jp.net', 'yukiko_chiwaki@kronos-jp.net', 'hitomi_tashiro@kronos-jp.net', 'kaie_okayama@kronos-jp.net', 'taishi_sano@kronos-jp.net', 'masaki_tono@kronos-jp.net', 'taiki_sano@kronos-jp.net', 'takuto_arima@kronos-jp.net', 'maiko_ohashi@kronos-jp.net', 'mayuka_kasahara@kronos-jp.net', 'mana_kawano@kronos-jp.net', 'shino_kondo@kronos-jp.net', 'mina_saito@kronos-jp.net', 'akinori_noguchi@kronos-jp.net', 'hideki_hara@kronos-jp.net', 'munehisa_fujimoto@kronos-jp.net']);


        $id = 1;
        $users->each(function($user, $key) use ($id){

            $items = explode("@", $user);
            echo $key+1;
            User::create([
                'id' => ($key+1),
                'name' => $items[0],
                'email' => $user,
                'password' => bcrypt('jsaiten15')
            ]);
            $id++;
        });
    }
}

class FestsTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('fests')->delete();
        Fest::create([
            'id' => 1,
            'title' => '9月度エンジニア会',
            'date' => '2015-09-18'
        ]);
    }
}

class PresensTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('presens')->delete();

        // 村山
        Presen::create([
            'id' => 1,
            'fest_id' => 1,
            'user_id' => 11,
            'status' => 0,
            'title' => 'エンジニア会について'
        ]);

        // 田代
        Presen::create([
            'id' => 2,
            'fest_id' => 1,
            'user_id' => 42,
            'status' => 0,
            'title' => '未定'
        ]);


        // 義元
        Presen::create([
            'id' => 3,
            'fest_id' => 1,
            'user_id' => 36,
            'status' => 0,
            'title' => '未定'
        ]);

        // 鈴木（伸）
        Presen::create([
            'id' => 4,
            'fest_id' => 1,
            'user_id' => 40,
            'status' => 0,
            'title' => '未定'
        ]);

        // 吉田法
        Presen::create([
            'id' => 5,
            'fest_id' => 1,
            'user_id' => 23,
            'status' => 0,
            'title' => '未定'
        ]);

        // 高山
        Presen::create([
            'id' => 6,
            'fest_id' => 1,
            'user_id' => 20,
            'status' => 0,
            'title' => '未定'
        ]);

        // 宮本
        Presen::create([
            'id' => 7,
            'fest_id' => 1,
            'user_id' => 21,
            'status' => 0,
            'title' => '未定'
        ]);

        DB::table('likes')->delete();
        DB::table('feedbacks')->delete();
    }
}
