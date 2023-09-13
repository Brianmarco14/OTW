<?php

namespace Database\Seeders;

use App\Models\GenreModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre = [
            ['id' => 1, 'name' => 'Horror'],
            ['id' => 2, 'name' => 'Romance'],
        ];

        foreach ($genre as $nilai) {
            GenreModel::insert([
                'id' => $nilai['id'],
                'name' => $nilai['name'],
            ]);
        }
    }
}
