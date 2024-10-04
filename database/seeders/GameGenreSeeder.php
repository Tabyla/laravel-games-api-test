<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameGenreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('genres')->insert([
            ['name' => 'Приключения'],
            ['name' => 'Экшн'],
            ['name' => 'Ролевая игра'],
            ['name' => 'Стратегия'],
            ['name' => 'Спорт'],
        ]);
    }
}
