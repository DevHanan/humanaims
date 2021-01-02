<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            [
                'id'=>'1',
                'name'=>'list_users',
                'title_ar'=>'عرض المستخدمين',
                'title_en'=>'List users',
                'guard_name' => 'web' 
            ],
            [
                'id'=>'2',
                'name'=>'add_users',
                'title_ar'=>'إضافة المستخدمين',
                'title_en'=>'Add users',
                                'guard_name' => 'web' 

            ],
             [
                'id'=>'3',
                'name'=>'edit_users',
                'title_ar'=>'تعديل المستخدمين',
                'title_en'=>'Edit users',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'4',
                'name'=>'delete_users',
                'title_ar'=>'حذف المستخدمين',
                'title_en'=>'Delete users',
                                'guard_name' => 'web' 

            ],
             [
                'id'=>'5',
                'name'=>'list_roles',
                'title_ar'=>'عرض المناصب',
                'title_en'=>'List roles',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'6',
                'name'=>'add_roles',
                'title_ar'=>'إضافة منصب',
                'title_en'=>'Add roles',        
                'guard_name' => 'web' 

            ],
             [
                'id'=>'7',
                'name'=>'edit_roles',
                'title_ar'=>'تعديل المناصب',
                'title_en'=>'Edit roles',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'8',
                'name'=>'delete_roles',
                'title_ar'=>'حذف المناصب',
                'title_en'=>'Delete roles',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'9',
                'name'=>'list_specializations',
                'title_ar'=>'عرض التخصصات',
                'title_en'=>'List specializations',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'10',
                'name'=>'add_specializations',
                'title_ar'=>'إضافة التخصصات',
                'title_en'=>'Add specializations',
                                'guard_name' => 'web' 

            ],
             [
                'id'=>'11',
                'name'=>'edit_specializations',
                'title_ar'=>'تعديل التخصصات',
                'title_en'=>'Edit specializations',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'12',
                'name'=>'delete_specializations',
                'title_ar'=>'حذف التخصصات',
                'title_en'=>'Delete specializations',
                                'guard_name' => 'web' 

            ],
             [
                'id'=>'13',
                'name'=>'list_countries',
                'title_ar'=>'عرض الدول',
                'title_en'=>'List countries',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'14',
                'name'=>'add_countries',
                'title_ar'=>'إضافة الدول',
                'title_en'=>'Add countries',
                                'guard_name' => 'web' 

            ],
             [
                'id'=>'15',
                'name'=>'edit_countries',
                'title_ar'=>'تعديل الدول',
                'title_en'=>'Edit countries',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'16',
                'name'=>'delete_countries',
                'title_ar'=>'حذف الدول',
                'title_en'=>'Delete countries',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'17',
                'name'=>'list_categories',
                'title_ar'=>'عرض التصنيفات',
                'title_en'=>'List categories',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'18',
                'name'=>'add_categories',
                'title_ar'=>'إضافة تصنيف',
                'title_en'=>'Add categories',
                                'guard_name' => 'web' 

            ],
             [
                'id'=>'19',
                'name'=>'edit_categories',
                'title_ar'=>'تعديل تصنيف',
                'title_en'=>'Edit categories',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'20',
                'name'=>'delete_categories',
                'title_ar'=>'حذف تصنيف',
                'title_en'=>'Delete categories',
                'guard_name' => 'web' 

            ],
            [
                'id'=>'21',
                'name'=>'update_settings',
                'title_ar'=>'إعدادت الموقع',
                'title_en'=>'Settings',
                'guard_name' => 'web' 

            ],
             [
                'id'=>'22',
                'name'=>'waiting_users',
                'title_ar'=>'مستخدمين قيد التحقق',
                'title_en'=>'Waitng Verification Users',
                'guard_name' => 'web' 

            ],
             [
                'id'=>'23',
                'name'=>'list_pages',
                'title_ar'=>'عرض صفحات الموقع',
                'title_en'=>'List pages',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'24',
                'name'=>'add_حشلثس',
                'title_ar'=>'إضافة صفحة',
                'title_en'=>'Add pages',
                                'guard_name' => 'web' 

            ],
             [
                'id'=>'25',
                'name'=>'edit_pages',
                'title_ar'=>'تعديل صفحة',
                'title_en'=>'Edit pages',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'26',
                'name'=>'delete_pages',
                'title_ar'=>'حذف صفحة',
                'title_en'=>'Delete pages',
                'guard_name' => 'web' 

            ],
            [
                'id'=>'27',
                'name'=>'list_doctors',
                'title_ar'=>'عرض الأطباء والمؤسسات',
                'title_en'=>'List Doctors',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'28',
                'name'=>'show_doctor',
                'title_ar'=>'عرض تفاصيل طبيب/مؤسسة',
                'title_en'=>'show doctor',
                'guard_name' => 'web' 

            ],
              [
                'id'=>'29',
                'name'=>'list_members',
                'title_ar'=>'عرض  المستخدمين',
                'title_en'=>'List Members',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'30',
                'name'=>'show_member',
                'title_ar'=>'عرض تفاصيل مستخدم',
                'title_en'=>'show member',
                'guard_name' => 'web' 

            ],
              [
                'id'=>'31',
                'name'=>'list_subjects',
                'title_ar'=>'عرض  الموضوعات',
                'title_en'=>'List subjects',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'32',
                'name'=>'show_subject',
                'title_ar'=>'عرض تفاصيل موضوع',
                'title_en'=>'show sbject',
                'guard_name' => 'web' 

            ],
            [
                'id'=>'33',
                'name'=>'list_activity_log',
                'title_ar'=>'عرض تفاصيل النشاطات',
                'title_en'=>'List Logs',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'34',
                'name'=>'show_log',
                'title_ar'=>'عرض تفاصيل النشاطٍ',
                'title_en'=>'show Log',
                                'guard_name' => 'web' 

            ],
             [
                'id'=>'35',
                'name'=>'delete_log',
                'title_ar'=>'حذف النشاط',
                'title_en'=>'Delete Log',
                                'guard_name' => 'web' 

            ],
             [
                'id'=>'36',
                'name'=>'list_visits',
                'title_ar'=>'عرض الزيارات',
                'title_en'=>'List Visits',
                                'guard_name' => 'web' 

            ],
            [
                'id'=>'37',
                'name'=>'show_visit',
                'title_ar'=>'عرض تفاصيل الزيارة',
                'title_en'=>'show Visit',
                                'guard_name' => 'web' 

            ],
             [
                'id'=>'38',
                'name'=>'delete_visit',
                'title_ar'=>'حذف الزيارة ',
                'title_en'=>'Delete Visit',
                                'guard_name' => 'web' 

            ],
              [
                'id'=>'39',
                'name'=>'Website Translation',
                'title_ar'=>'ترجمة الموقع',
                'title_en'=>'Website Translation',
                                'guard_name' => 'web' 

            ],
              [
                'id'=>'40',
                'name'=>'control panel Translation',
                'title_ar'=>'ترجمة لوحة التحكم',
                'title_en'=>'Control Panel Translation',
                                'guard_name' => 'web' 

            ],



            
            
            
            
        ];
        DB::table('permissions')->insert($permissions);
    }
}
