<?php

use Illuminate\Database\Seeder;
use App\Models\Postback;

class PostbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $p = Postback::firstOrNew(['name' => 'Maxbounty', 'ch_slot' => 's1']);
        $p->veri_slot = '1e4a3d92d8de85c89d378a0448e6115c';
        $p->save();

        $p = Postback::firstOrNew(['name' => 'Adscend', 'ch_slot' => 'sub1']);
        $p->reverse_var = 'sts';
        $p->reverse_key = 2;
        $p->veri_slot = 'fc016c5c4514594dd8ebaaae27476ed1';
        $p->save();

        $p = Postback::firstOrNew(['name' => 'yeahmobi', 'ch_slot' => 'aff_sub']);
        $p->veri_slot = '756ee1d8e103e106cd7b2c48c4dca5d1';
        $p->save();

        $p = Postback::firstOrNew(['name' => 'cpalead', 'ch_slot' => 's1']);
        $p->veri_slot = '0404729b3ab3916257f0092305c14441';
        $p->save();

        $p = Postback::firstOrNew(['name' => 'Adwork', 'ch_slot' => 'sid']);
        $p->reverse_var = 'status';
        $p->reverse_key = 2;
        $p->veri_slot = 'bec04f3a1c2a1ab4eadf14115c8ff4d2';
        $p->save();

        $p = Postback::firstOrNew(['name' => 'Cpalead', 'ch_slot' => 's1']);
        $p->veri_slot = '801efd4dd25314be20dc365a18ac2569';
        $p->save();

        $p = Postback::firstOrNew(['name' => 'tapgerine', 'ch_slot' => 'aff_sub']);
        $p->veri_slot = 'd1d8c3cd9139e83d89244d7f9b28e6bf';
        $p->save();

        $p = Postback::firstOrNew(['name' => 'offerseven', 'ch_slot' => 's1']);
        $p->reverse_var = 'sts';
        $p->reverse_key = 2;
        $p->veri_slot = 'aa6b35d5c472ce5a86e747d051b042a7';
        $p->save();

        $p = Postback::firstOrNew(['name' => 'mobaloo', 'ch_slot' => 'aff_sub']);
        $p->veri_slot = 'ee6cdc1578ecf38704fd556e369502aa';
        $p->save();

        $p = Postback::firstOrNew(['name' => 'cpaway', 'ch_slot' => 's1']);
        $p->veri_slot = 'd4d4469c726855c2739a2b628382f3a3';
        $p->save();

        $p = Postback::firstOrNew(['name' => 'AdAction', 'ch_slot' => 'aff_sub']);
        $p->veri_slot = '375abfae07f97515b583dfcf3ded8f79';
        $p->save();

        $p = Postback::firstOrNew(['name' => 'ogmobi', 'ch_slot' => 'aff_sub']);
        $p->veri_slot = '9ffe05528bec12f591ea727790358b4a';
        $p->save();

    }
}
