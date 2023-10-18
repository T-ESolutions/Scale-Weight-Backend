<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
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
                'name_ar' => 'داخل المملكة العربية السعودية',
                'name_en' => 'inside the Kingdom of Saudi Arabia',
            ],
            [
                'id' => 2,
                'name_ar' => 'خارج المملكة العربية السعودية',
                'name_en' => 'outside the Kingdom of Saudi Arabia',
            ],
        ];
        foreach ($data as $row){
            Country::updateOrCreate($row);
        }
    }
}
