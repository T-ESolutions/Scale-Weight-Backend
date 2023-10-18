<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //country
        $country = Country::active()->orderBy('id','asc')->first();

        $data = [
            [
                'id' => 1,
                'name_ar' => 'منطقة الرياض',
                'name_en' => 'Riyadh region',
                'country_id' => $country->id,

            ],
            [
                'id' => 2,
                'name_ar' => 'منطقة القصيم',
                'name_en' => 'Qassim region',
                'country_id' => $country->id,

            ],
            [
                'id' => 3,
                'name_ar' => 'منطقة مكة المكرمة',
                'name_en' => 'Mecca area',
                'country_id' => $country->id,

            ],
        ];
        foreach ($data as $row){
            State::updateOrCreate($row);
        }
    }
}
