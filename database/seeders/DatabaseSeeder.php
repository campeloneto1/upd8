<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Cidade;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        Cliente::factory(100)->create();
        Estado::factory(20)->create();
        Cidade::factory(100)->create();
    }
}
