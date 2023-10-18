<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
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
                'name_ar' => 'الشركه ألماس السيراميك',
                'name_en' => 'Ceramic diamond company',
            ],
            [
                'id' => 2,
                'name_ar' => 'شركه الجوهرة',
                'name_en' => 'Jewel company',
            ],
            [
                'id' => 3,
                'name_ar' => 'العماني',
                'name_en' => 'Omani',
            ],
        ];
        foreach ($data as $row){
            Company::updateOrCreate($row);
        }

    }
}
