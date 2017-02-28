<?php

use Illuminate\Database\Seeder;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Day::class, 50)->create()->each(function ($u) {
            $u->files()->save(factory(App\File::class)->make());
            $u->files()->save(factory(App\File::class)->make());
        });
    }
}
