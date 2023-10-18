<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){

        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(JobTypesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(LevelTypeSeeder::class);
        $this->call(QuestionTypeSeeder::class);
        $this->call(ClintSeeder::class);
        $this->call(ProjectInfoSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(QuestionnaireSeeder::class);

    }
}
