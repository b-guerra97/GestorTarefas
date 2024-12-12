<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            ['tag'=>'Prioridade Elevada', 'created_at'=>now(), 'updated_at'=>now()],
            ['tag'=>'Prioridade Média', 'created_at'=>now(), 'updated_at'=>now()],
            ['tag'=>'Prioridade Baixa', 'created_at'=>now(), 'updated_at'=>now()],
            ['tag'=>'Urgente', 'created_at'=>now(), 'updated_at'=>now()],
        ]);
    }
}
