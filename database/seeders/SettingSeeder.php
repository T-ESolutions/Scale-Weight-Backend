<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
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
                'key' => 'name_ar',
                'value' => 'مجموعة الخليل',
                'image' => null,
            ],
            [
                'key' => 'name_en',
                'value' => 'Elkhalel group',
                'image' => null,
            ],
            [
                'key' => 'logo_ar',
                'value' => null,
                'image' => 'logo_ar.png',

            ],
            [
                'key' => 'logo_en',
                'value' => null,
                'image' => 'logo_en.png',
            ],
            [
                'key' => 'description_ar',
                'value' => 'الوصف بالعربية',
                'image' => null,
            ],
            [
                'key' => 'description_en',
                'value' => 'description english',
                'image' => null,
            ],
            [
                'key' => 'phone',
                'value' => '+96650505500',
                'image' => null,
            ],
            [
                'key' => 'email',
                'value' => 'info@elkhalel.com',
                'image' => null,
            ],
            [
                'key' => 'address_ar',
                'value' => 'الرياض',
                'image' => null,
            ],
            [
                'key' => 'address_en',
                'value' => 'Alriad',
                'image' => null,
            ],
            [
                'key' => 'twitter',
                'value' => 'https://twitter.com/home?lang=ar',
                'image' => null,
            ],
            [
                'key' => 'snapchat',
                'value' => 'https://snapchat.com/home?lang=ar',
                'image' => null,
            ],
            [
                'key' => 'facebook',
                'value' => 'https://facebook.com/home?lang=ar',
                'image' => null,
            ],
            [
                'key' => 'instagram',
                'value' => 'https://instagram.com/home?lang=ar',
                'image' => null,
            ],
            [
                'key' => 'currency_ar',
                'value' => 'ر.س',
                'image' => null,
            ],
            [
                'key' => 'currency_en',
                'value' => 'SAR',
                'image' => null,
            ],
        ];
        foreach ($data as $row) {
            Setting::updateOrCreate($row);
        }
    }
}
