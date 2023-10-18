<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::find(1)) {
            User::updateOrCreate([
                'id' => 1,
                'name' => 'admin',
                'country_code' => '+966',
                'phone' => '555555555',
                'email' => 'admin@admin.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => '123456',
                'type' => 'admin',
                'job_type_id' => 3,
                'role_id' => 1,
            ]);



        }
        // Assign Role To Admins
        $role = Role::whereId(1)->first();
        $roleUsers = [
            [
                'role_id' => $role->id,
                'model_id' => 1,
                'model_type' => 'app\Models\User',
            ]
        ];
        foreach ($roleUsers as $get) {
            DB::table('model_has_roles')->updateOrInsert($get);
        }

    }
}
