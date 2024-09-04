<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'id' => 5,
                'name' => 'Julio',
                'email' => 'julio@julio.com',
                'phone' => '11972083773',
                'doc' => '332.911.388-05',
                'uf' => 'SP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
