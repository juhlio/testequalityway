<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
                'id' => 4,
                'clientid' => 5,
                'instalationType' => 'Sistema Fotovoltaico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'clientid' => 5,
                'instalationType' => 'Sistema Fotovoltaico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'clientid' => 6,
                'instalationType' => 'Sistema Fotovoltaico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'clientid' => 7,
                'instalationType' => 'Sistema Fotovoltaico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'clientid' => 8,
                'instalationType' => 'Sistema Fotovoltaico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

