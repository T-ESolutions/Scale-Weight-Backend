<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

//            Dashboard
            [
                'name' => "Dashboard",
                'name_ar' => "لوحة القيادة",
                'type' => 'dashboard',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Revenues and expenses",
                'name_ar' => "الايرادات والمصروفات",
                'type' => 'dashboard',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Total project income according to contracts",
                'name_ar' => "اجمالي دخل المشاريع حسب العقود",
                'type' => 'dashboard',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Summary of projects by stages",
                'name_ar' => "ملخص المشاريع حسب المراحل",
                'type' => 'dashboard',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Summary of projects by areas",
                'name_ar' => "ملخص المشاريع حسب المناطق",
                'type' => 'dashboard',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Calendar",
                'name_ar' => "التقويم",
                'type' => 'dashboard',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Add event",
                'name_ar' => "انشاء حدث",
                'type' => 'dashboard',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Update event",
                'name_ar' => "تعديل حدث",
                'type' => 'dashboard',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Delete event",
                'name_ar' => "حذف حدث",
                'type' => 'dashboard',
                'guard_name' => 'admin',
            ],
//            mail
            [
                'name' => "Incoming mail",
                'name_ar' => "البريد الوارد",
                'type' => 'mail',
                'guard_name' => 'admin',
            ],
//            new requests
            [
                'name' => "New customer requests",
                'name_ar' => "طلبات العملاء الجدد",
                'type' => 'new requests',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Show new customer request",
                'name_ar' => "اظهار طلب العميل الجديد",
                'type' => 'new requests',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Update information",
                'name_ar' => "تعديل البيانات",
                'type' => 'new requests',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Add explanation",
                'name_ar' => "اضافة شرح",
                'type' => 'new requests',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Project approval",
                'name_ar' => "الموافقة على المشروع",
                'type' => 'new requests',
                'guard_name' => 'admin',
            ],
//            project contracts
            [
                'name' => "Contracts and follow-up",
                'name_ar' => "التعاقدات والمتابعه",
                'type' => 'project contracts',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Show contracts and follow-up",
                'name_ar' => "عرض التعاقدات والمتابعه",
                'type' => 'project contracts',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Send revision",
                'name_ar' => "اشعار مراجعه",
                'type' => 'project contracts',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Update price offer and contract",
                'name_ar' => "تحديث عرض السعر و العقد",
                'type' => 'project contracts',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Financial information",
                'name_ar' => "المعلومات المالية",
                'type' => 'project contracts',
                'guard_name' => 'admin',
            ],

            [
                'name' => "Confirm project",
                'name_ar' => "تأكيد المشروع",
                'type' => 'project contracts',
                'guard_name' => 'admin',
            ],
//            projects
            [
                'name' => "Projects list",
                'name_ar' => "قائمة المشاريع",
                'type' => 'projects',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Add project",
                'name_ar' => "اضافة مشروع",
                'type' => 'projects',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Delete project",
                'name_ar' => "حذف مشروع",
                'type' => 'projects',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Show Project",
                'name_ar' => "عرض المشروع",
                'type' => 'projects',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Add a general supervisor",
                'name_ar' => "اضافة مشرف عام",
                'type' => 'projects',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Add new project level",
                'name_ar' => "اضافة مرحلة",
                'type' => 'projects',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Archive project",
                'name_ar' => "ارشيف المشروع",
                'type' => 'projects',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Show deleted projects",
                'name_ar' => "عرض المشاريع المحذوفة",
                'type' => 'projects',
                'guard_name' => 'admin',
            ],
//            reports
            [
                'name' => "Reports and statistics",
                'name_ar' => "التقارير والإحصائيات",
                'type' => 'reports',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Archive projects",
                'name_ar' => "ارشيف المشاريع",
                'type' => 'reports',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Payments",
                'name_ar' => "المدفوعات",
                'type' => 'reports',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Tasks and achievements",
                'name_ar' => "المهام و الانجازات",
                'type' => 'reports',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Projects by employee",
                'name_ar' => "المشاريع حسب الموظف",
                'type' => 'reports',
                'guard_name' => 'admin',
            ],
//            financial
            [
                'name' => "Financial accounts",
                'name_ar' => "الحسابات المالية",
                'type' => 'financial',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Receipt Bills",
                'name_ar' => "سندات القبض",
                'type' => 'financial',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Exchange Bills",
                'name_ar' => "سندات الصرف",
                'type' => 'financial',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Customer account statement",
                'name_ar' => "كشف حساب عميل",
                'type' => 'financial',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Project expense statement",
                'name_ar' => "كشف حساب مصروفات المشروع",
                'type' => 'financial',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Financial request",
                'name_ar' => "مطالبة مالية",
                'type' => 'financial',
                'guard_name' => 'admin',
            ],
//            settings
            [
                'name' => "Settings",
                'name_ar' => "الاعدادات",
                'type' => 'settings',
                'guard_name' => 'admin',
            ],
            [
                'name' => "General settings",
                'name_ar' => "الاعدادات العامة",
                'type' => 'settings',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Employees",
                'name_ar' => "الموظفين",
                'type' => 'settings',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Roles",
                'name_ar' => "الصلاحيات",
                'type' => 'settings',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Contracts",
                'name_ar' => "التعاقدات",
                'type' => 'settings',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Customers",
                'name_ar' => "العملاء",
                'type' => 'settings',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Companies",
                'name_ar' => "الشركات",
                'type' => 'settings',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Corporate discounts",
                'name_ar' => "خصومات الشركات",
                'type' => 'settings',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Basic information",
                'name_ar' => "البيانات الاساسية",
                'type' => 'settings',
                'guard_name' => 'admin',
            ],
            [
                'name' => "Questionnaire data",
                'name_ar' => "بيانات الاستبيان",
                'type' => 'settings',
                'guard_name' => 'admin',
            ],
        ];
        foreach ($data as $get) {
            Permission::updateOrCreate($get);
        }


        $data = [
            [
                'id' => 1,
                'name' => 'manager role',
                'name_ar' => 'صلاحية المدير',
                'guard_name' => 'admin',
            ]
        ];

        foreach ($data as $get) {
            Role::updateOrCreate($get);
        }


        $role = Role::whereId(1)->first();


        // Assign Role to Permissions

        if ($role) {
            $permissions = Permission::all();
            foreach ($permissions as $get) {
                $item = [
                    'permission_id' => $get->id,
                    'role_id' => $role->id
                ];
                DB::table('role_has_permissions')->updateOrInsert($item);
            }
        }
    }
}
