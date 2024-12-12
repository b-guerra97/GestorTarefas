<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['status' => 'Criado', 'created_at' => now(), 'updated_at' => now()],
            ['status'=> 'Em Andamento', 'created_at' => now(), 'updated_at' => now()],
            ['status'=> 'Pendente', 'created_at' => now(), 'updated_at' => now()],
            ['status'=> 'Finalizado', 'created_at' => now(), 'updated_at' => now()],
            ['status'=> 'Cancelado', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
