<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipaments')->insert([
            ['id' => 1, 'project_id' => 4, 'equipament' => 'Módulo', 'quantity' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'project_id' => 4, 'equipament' => 'Inversor', 'quantity' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'project_id' => 4, 'equipament' => 'Microinversor', 'quantity' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'project_id' => 5, 'equipament' => 'Módulo', 'quantity' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'project_id' => 5, 'equipament' => 'Microinversor', 'quantity' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'project_id' => 5, 'equipament' => 'Estrutura', 'quantity' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'project_id' => 5, 'equipament' => 'String Box', 'quantity' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'project_id' => 5, 'equipament' => 'Endcap', 'quantity' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'project_id' => 6, 'equipament' => 'Módulo', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'project_id' => 6, 'equipament' => 'Inversor', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'project_id' => 6, 'equipament' => 'Microinversor', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'project_id' => 8, 'equipament' => 'Módulo', 'quantity' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'project_id' => 8, 'equipament' => 'Microinversor', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'project_id' => 8, 'equipament' => 'Estrutura', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'project_id' => 8, 'equipament' => 'Cabo vermelho', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31, 'project_id' => 8, 'equipament' => 'String Box', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 32, 'project_id' => 8, 'equipament' => 'Cabo Tronco', 'quantity' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 40, 'project_id' => 7, 'equipament' => 'Módulo', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 41, 'project_id' => 7, 'equipament' => 'Inversor', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 42, 'project_id' => 7, 'equipament' => 'Estrutura', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 43, 'project_id' => 7, 'equipament' => 'Cabo vermelho', 'quantity' => 88, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 44, 'project_id' => 7, 'equipament' => 'Cabo preto', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 45, 'project_id' => 7, 'equipament' => 'String Box', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
