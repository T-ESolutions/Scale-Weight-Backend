<?php

namespace Database\Seeders;

use App\Models\QuestionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
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
                'name_ar' => 'كتابة نص',
                'name_en' => 'write text',
                'have_options' => 0,
            ],
            [
                'id' => 2,
                'name_ar' => 'اختياري',
                'name_en' => 'choice',
                'have_options' => 1,
            ],
            [
                'id' => 3,
                'name_ar' => 'اختياري متعدد',
                'name_en' => 'Multiple optional',
                'have_options' => 1,
            ],
            [
                'id' => 4,
                'name_ar' => 'صورة',
                'name_en' => 'image',
                'have_options' => 0,
            ],
            [
                'id' => 5,
                'name_ar' => 'اختياري نص',
                'name_en' => 'Optional text',
                'have_options' => 1,
            ],
        ];
        foreach ($data as $row) {
            QuestionType::updateOrCreate($row);
        }
    }
}
