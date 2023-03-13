<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'name' => 'Thắng',
            ],
            [
                'name' => 'Nhân',
            ],
            [
                'name' => 'Tâm',
            ],
            [
                'name' => 'Phi',
            ],
            [
                'name' => 'Ngọc',
            ],

        ]);
    }
}
