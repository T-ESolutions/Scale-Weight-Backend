<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $data = [
            [
                'id' => 1,
                'name_ar' => 'شركات السيراميك',
                'name_en' => 'ceramic companies',
            ],
            [
                'id' => 2,
                'name_ar' => 'شركات الكهرباء',
                'name_en' => 'Electricity companies',
            ],
            [
                'id' => 3,
                'name_ar' => 'شركات النجارة',
                'name_en' => 'Woodworking companies',
            ],
        ];
        foreach ($data as $row){
            Category::updateOrCreate($row);
        }
    }
}
