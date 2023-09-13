<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'Article'],
            ['id' => 2, 'name' => 'Story'],
            ['id' => 3, 'name' => 'Poetry'],
        ];

        foreach ($categories as $nilai) {
            CategoryModel::insert([
                'id' => $nilai['id'],
                'name' => $nilai['name'],
            ]);
        }
    }
}
