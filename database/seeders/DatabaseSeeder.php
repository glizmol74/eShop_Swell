<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(Menu::class);
        $this->call(Init::class);
        $this->call(Sliders::class);
        $this->call(Productos::class);
    }
}
