<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_create',
            ],
            [
                'id'    => 18,
                'title' => 'category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'category_show',
            ],
            [
                'id'    => 20,
                'title' => 'category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'category_access',
            ],
            [
                'id'    => 22,
                'title' => 'house_create',
            ],
            [
                'id'    => 23,
                'title' => 'house_edit',
            ],
            [
                'id'    => 24,
                'title' => 'house_show',
            ],
            [
                'id'    => 25,
                'title' => 'house_delete',
            ],
            [
                'id'    => 26,
                'title' => 'house_access',
            ],
            [
                'id'    => 27,
                'title' => 'address_create',
            ],
            [
                'id'    => 28,
                'title' => 'address_edit',
            ],
            [
                'id'    => 29,
                'title' => 'address_show',
            ],
            [
                'id'    => 30,
                'title' => 'address_delete',
            ],
            [
                'id'    => 31,
                'title' => 'address_access',
            ],
            [
                'id'    => 32,
                'title' => 'booking_create',
            ],
            [
                'id'    => 33,
                'title' => 'booking_edit',
            ],
            [
                'id'    => 34,
                'title' => 'booking_show',
            ],
            [
                'id'    => 35,
                'title' => 'booking_delete',
            ],
            [
                'id'    => 36,
                'title' => 'booking_access',
            ],
            [
                'id'    => 37,
                'title' => 'day_create',
            ],
            [
                'id'    => 38,
                'title' => 'day_edit',
            ],
            [
                'id'    => 39,
                'title' => 'day_show',
            ],
            [
                'id'    => 40,
                'title' => 'day_delete',
            ],
            [
                'id'    => 41,
                'title' => 'day_access',
            ],
            [
                'id'    => 42,
                'title' => 'infrastructure_create',
            ],
            [
                'id'    => 43,
                'title' => 'infrastructure_edit',
            ],
            [
                'id'    => 44,
                'title' => 'infrastructure_show',
            ],
            [
                'id'    => 45,
                'title' => 'infrastructure_delete',
            ],
            [
                'id'    => 46,
                'title' => 'infrastructure_access',
            ],
            [
                'id'    => 47,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 48,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 49,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 50,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 51,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 52,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 53,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 54,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 55,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 56,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 57,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 58,
                'title' => 'task_create',
            ],
            [
                'id'    => 59,
                'title' => 'task_edit',
            ],
            [
                'id'    => 60,
                'title' => 'task_show',
            ],
            [
                'id'    => 61,
                'title' => 'task_delete',
            ],
            [
                'id'    => 62,
                'title' => 'task_access',
            ],
            [
                'id'    => 63,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 64,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 65,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 66,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 67,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 68,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 69,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 70,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 71,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 72,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 73,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 74,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 75,
                'title' => 'subscriber_create',
            ],
            [
                'id'    => 76,
                'title' => 'subscriber_edit',
            ],
            [
                'id'    => 77,
                'title' => 'subscriber_show',
            ],
            [
                'id'    => 78,
                'title' => 'subscriber_delete',
            ],
            [
                'id'    => 79,
                'title' => 'subscriber_access',
            ],
            [
                'id'    => 80,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
