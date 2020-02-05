<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $timestamps = false;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; ++$i) {
            \App\contaDados::create([
                'n_conta'     => '123'+$i,
                'valor'    => '100'+$i
            ]);
     
        }
    }
}
