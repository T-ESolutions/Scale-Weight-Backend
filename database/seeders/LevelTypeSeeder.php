<?php

namespace Database\Seeders;

use App\Models\LevelType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelTypeSeeder extends Seeder
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
                'name_ar' => 'مرحلة تفاصيل داخلية',
                'name_en' => 'Interior detail stage',
            ],
            [
                'id' => 2,
                'name_ar' => 'مرحلة استبيان',
                'name_en' => 'questionnaire stage',
            ],
            [
                'id' => 3,
                'name_ar' => 'مرحلة مرفقات المشروع',
                'name_en' => 'Project attachment stage',
            ],
        ];
        foreach ($data as $row){
            LevelType::updateOrCreate($row);
        }
    }
}
