<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTypesSeeder extends Seeder
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
                'name_ar' => 'مشروع محدد',
                'name_en' => 'Specific project',
            ],
            [
                'id' => 2,
                'name_ar' => 'فرع محدد',
                'name_en' => 'Specific branch',
            ],
            [
                'id' => 3,
                'name_ar' => 'كل الفروع',
                'name_en' => 'All branches',
            ],
        ];
        foreach ($data as $row){
            JobType::updateOrCreate($row);
        }
    }
}
