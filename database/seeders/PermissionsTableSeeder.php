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
                'title' => 'annoucement_create',
            ],
            [
                'id'    => 18,
                'title' => 'annoucement_edit',
            ],
            [
                'id'    => 19,
                'title' => 'annoucement_show',
            ],
            [
                'id'    => 20,
                'title' => 'annoucement_delete',
            ],
            [
                'id'    => 21,
                'title' => 'annoucement_access',
            ],
            [
                'id'    => 22,
                'title' => 'policy_create',
            ],
            [
                'id'    => 23,
                'title' => 'policy_edit',
            ],
            [
                'id'    => 24,
                'title' => 'policy_show',
            ],
            [
                'id'    => 25,
                'title' => 'policy_delete',
            ],
            [
                'id'    => 26,
                'title' => 'policy_access',
            ],
            [
                'id'    => 27,
                'title' => 'download_access',
            ],
            [
                'id'    => 28,
                'title' => 'textbook_create',
            ],
            [
                'id'    => 29,
                'title' => 'textbook_edit',
            ],
            [
                'id'    => 30,
                'title' => 'textbook_show',
            ],
            [
                'id'    => 31,
                'title' => 'textbook_delete',
            ],
            [
                'id'    => 32,
                'title' => 'textbook_access',
            ],
            [
                'id'    => 33,
                'title' => 'manual_create',
            ],
            [
                'id'    => 34,
                'title' => 'manual_edit',
            ],
            [
                'id'    => 35,
                'title' => 'manual_show',
            ],
            [
                'id'    => 36,
                'title' => 'manual_delete',
            ],
            [
                'id'    => 37,
                'title' => 'manual_access',
            ],
            [
                'id'    => 38,
                'title' => 'template_create',
            ],
            [
                'id'    => 39,
                'title' => 'template_edit',
            ],
            [
                'id'    => 40,
                'title' => 'template_show',
            ],
            [
                'id'    => 41,
                'title' => 'template_delete',
            ],
            [
                'id'    => 42,
                'title' => 'template_access',
            ],
            [
                'id'    => 43,
                'title' => 'book_management_access',
            ],
            [
                'id'    => 44,
                'title' => 'category_create',
            ],
            [
                'id'    => 45,
                'title' => 'category_edit',
            ],
            [
                'id'    => 46,
                'title' => 'category_show',
            ],
            [
                'id'    => 47,
                'title' => 'category_delete',
            ],
            [
                'id'    => 48,
                'title' => 'category_access',
            ],
            [
                'id'    => 49,
                'title' => 'book_create',
            ],
            [
                'id'    => 50,
                'title' => 'book_edit',
            ],
            [
                'id'    => 51,
                'title' => 'book_show',
            ],
            [
                'id'    => 52,
                'title' => 'book_delete',
            ],
            [
                'id'    => 53,
                'title' => 'book_access',
            ],
            [
                'id'    => 54,
                'title' => 'school_management_access',
            ],
            [
                'id'    => 55,
                'title' => 'school_create',
            ],
            [
                'id'    => 56,
                'title' => 'school_edit',
            ],
            [
                'id'    => 57,
                'title' => 'school_show',
            ],
            [
                'id'    => 58,
                'title' => 'school_delete',
            ],
            [
                'id'    => 59,
                'title' => 'school_access',
            ],
            [
                'id'    => 60,
                'title' => 'class_room_create',
            ],
            [
                'id'    => 61,
                'title' => 'class_room_edit',
            ],
            [
                'id'    => 62,
                'title' => 'class_room_show',
            ],
            [
                'id'    => 63,
                'title' => 'class_room_delete',
            ],
            [
                'id'    => 64,
                'title' => 'class_room_access',
            ],
            [
                'id'    => 65,
                'title' => 'subject_create',
            ],
            [
                'id'    => 66,
                'title' => 'subject_edit',
            ],
            [
                'id'    => 67,
                'title' => 'subject_show',
            ],
            [
                'id'    => 68,
                'title' => 'subject_delete',
            ],
            [
                'id'    => 69,
                'title' => 'subject_access',
            ],
            [
                'id'    => 70,
                'title' => 'academic_year_create',
            ],
            [
                'id'    => 71,
                'title' => 'academic_year_edit',
            ],
            [
                'id'    => 72,
                'title' => 'academic_year_show',
            ],
            [
                'id'    => 73,
                'title' => 'academic_year_delete',
            ],
            [
                'id'    => 74,
                'title' => 'academic_year_access',
            ],
            [
                'id'    => 75,
                'title' => 'student_create',
            ],
            [
                'id'    => 76,
                'title' => 'student_edit',
            ],
            [
                'id'    => 77,
                'title' => 'student_show',
            ],
            [
                'id'    => 78,
                'title' => 'student_delete',
            ],
            [
                'id'    => 79,
                'title' => 'student_access',
            ],
            [
                'id'    => 80,
                'title' => 'history_admin_teacher_create',
            ],
            [
                'id'    => 81,
                'title' => 'history_admin_teacher_edit',
            ],
            [
                'id'    => 82,
                'title' => 'history_admin_teacher_show',
            ],
            [
                'id'    => 83,
                'title' => 'history_admin_teacher_delete',
            ],
            [
                'id'    => 84,
                'title' => 'history_admin_teacher_access',
            ],
            [
                'id'    => 85,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 86,
                'title' => 'content_create',
            ],
            [
                'id'    => 87,
                'title' => 'content_edit',
            ],
            [
                'id'    => 88,
                'title' => 'content_show',
            ],
            [
                'id'    => 89,
                'title' => 'content_delete',
            ],
            [
                'id'    => 90,
                'title' => 'content_access',
            ],
            [
                'id'    => 91,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 92,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 93,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 94,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 95,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 96,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 97,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 98,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 99,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 100,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 101,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 102,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 103,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 104,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 105,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 106,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 107,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 108,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 109,
                'title' => 'faq_question_access',
            ],


        ];

        Permission::insert($permissions);
    }
}
