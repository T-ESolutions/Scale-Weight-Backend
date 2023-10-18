<?php

namespace Database\Seeders;

use App\Models\QuestionnaireCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (QuestionnaireCategory::get()->count() == 0) {
            $path = public_path('sql/questionnaires.sql');
            $sql = file_get_contents($path);
            DB::unprepared($sql);
        }
    }
}
