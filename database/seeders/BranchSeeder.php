<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //country
        $state = State::active()->orderBy('id', 'asc')->first();

        $data = [
            [
                'id' => 1,
                'name_ar' => 'الفرع الاول',
                'name_en' => 'first branch',
                'state_id' => $state->id,
            ],
            [
                'id' => 2,
                'name_ar' => 'الفرع الثاني',
                'name_en' => 'second branch',
                'state_id' => $state->id,
            ],
            [
                'id' => 3,
                'name_ar' => 'الفرع الثالث',
                'name_en' => 'third branch',
                'state_id' => $state->id,
            ],
        ];
        foreach ($data as $row) {
            Branch::updateOrCreate($row);
        }
    }
}
