<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use App\Models\ProjectAges;
use App\Models\ProjectArea;
use App\Models\ProjectDuration;
use App\Models\ProjectKnowUs;
use App\Models\ProjectType;
use App\Models\Service;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Services
        $data = [
            [
                'id' => 1,
                'name_ar' => 'تصميم',
                'name_en' => 'Design',
            ],
            [
                'id' => 2,
                'name_ar' => 'تصميم و إشراف',
                'name_en' => 'Design and supervision',
            ],
        ];
        foreach ($data as $row) {
            Service::updateOrCreate($row);
        }

//        ProjectKnowUs
        $data = [
            [
                'id' => 1,
                'name_ar' => 'الانستجرام',
                'name_en' => 'instagram',
            ],
            [
                'id' => 2,
                'name_ar' => 'تويتر',
                'name_en' => 'twitter',
            ],
            [
                'id' => 3,
                'name_ar' => 'سناب شات',
                'name_en' => 'snapchat',
            ],
            [
                'id' => 4,
                'name_ar' => 'صديق',
                'name_en' => 'friend',
            ],
            [
                'id' => 5,
                'name_ar' => 'اخرى',
                'name_en' => 'other',
            ],
        ];
        foreach ($data as $row) {
            ProjectKnowUs::updateOrCreate($row);
        }


        //        ProjectType
        $types = [
            [
                'id' => 1,
                'name_ar' => 'فيلا سكنية',
                'name_en' => 'Residential villa',
            ],
            [
                'id' => 2,
                'name_ar' => 'شالية',
                'name_en' => 'Chalet',
            ],
            [
                'id' => 3,
                'name_ar' => 'عمارة سكنية',
                'name_en' => 'Residential Building',
            ],
        ];
        foreach ($types as $row) {
            ProjectType::updateOrCreate($row);
        }
        //        ProjectArea
        $areas = [
            [
                'id' => 1,
                'name_ar' => 'اكبر من 250 م',
                'name_en' => 'more than 250 m',
            ],
            [
                'id' => 2,
                'name_ar' => 'اكبر من 500 م',
                'name_en' => 'more than 500 m',
            ],
            [
                'id' => 3,
                'name_ar' => 'اكبر من 1000 م',
                'name_en' => 'more than 1000 m',
            ],
        ];
        foreach ($areas as $row) {
            ProjectArea::updateOrCreate($row);
        }

        //        ProjectDuration
        $durations = [
            [
                'id' => 1,
                'name_ar' => 'من شهر إلى شهرين',
                'name_en' => 'From month to 2 months',
            ],
            [
                'id' => 2,
                'name_ar' => 'من 3 أشهر إلى 6 أشهر',
                'name_en' => 'From 3 months to 6 months',
            ],
        ];
        foreach ($durations as $row) {
            ProjectDuration::updateOrCreate($row);
        }

        //        ProjectAges
        $ages = [
            [
                'id' => 1,
                'name_ar' => 'بين 20 و 30 سنة',
                'name_en' => 'Between 20 and 30 years old',
            ],
            [
                'id' => 2,
                'name_ar' => 'بين 30 و 40 سنة',
                'name_en' => 'Between 30 and 40 years old',
            ],
            [
                'id' => 3,
                'name_ar' => 'بين 40 و 50 سنة',
                'name_en' => 'Between 40 and 50 years old',
            ],
            [
                'id' => 4,
                'name_ar' => 'فوق 50 سنة',
                'name_en' => 'over 50 years old',
            ],
        ];
        foreach ($ages as $row) {
            ProjectAges::updateOrCreate($row);
        }

        //        statuses
        $statuses = [
            [
                'id' => 1,
                'name_ar' => 'في الانتظار',
                'name_en' => 'pending',
            ],
            [
                'id' => 2,
                'name_ar' => 'مؤكد',
                'name_en' => 'confirmed',
            ],
            [
                'id' => 3,
                'name_ar' => 'مقبول',
                'name_en' => 'accepted',
            ],
            [
                'id' => 4,
                'name_ar' => 'سلم',
                'name_en' => 'delivered',
            ],
            [
                'id' => 5,
                'name_ar' => 'انتهى',
                'name_en' => 'finished',
            ],
        ];
        foreach ($statuses as $row) {
            Status::updateOrCreate($row);
        }

        //        payments_types
        $payment_types = [
            [
                'id' => 1,
                'name_ar' => 'نقدي',
                'name_en' => 'cash',
            ],
            [
                'id' => 2,
                'name_ar' => 'تحويل بنكي',
                'name_en' => 'Bank transfer',
            ],
        ];
        foreach ($payment_types as $row) {
            PaymentType::updateOrCreate($row);
        }
    }
}
