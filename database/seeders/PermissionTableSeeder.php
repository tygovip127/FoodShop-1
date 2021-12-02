<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'User', 'display_name' => 'User', 'parent_id' => '0'],
            ['name' => 'List user', 'display_name' => 'List user', 'parent_id' => '1', 'key_code' => 'list_user'],
            ['name' => 'Create user', 'display_name' => 'Create user', 'parent_id' => '1', 'key_code' => 'create_user'],
            ['name' => 'Edit user', 'display_name' => 'Edit user', 'parent_id' => '1', 'key_code' => 'edit_user'],
            ['name' => 'Delete user', 'display_name' => 'Delete user', 'parent_id' => '1', 'key_code' => 'delete_user'],

            ['name' => 'Product', 'display_name' => 'Product', 'parent_id' => '0'],
            ['name' => 'List product', 'display_name' => 'List product', 'parent_id' => '6', 'key_code' => 'list_product'],
            ['name' => 'Create product', 'display_name' => 'Create product', 'parent_id' => '6', 'key_code' => 'create_product'],
            ['name' => 'Edit product', 'display_name' => 'Edit product', 'parent_id' => '6', 'key_code' => 'edit_product'],
            ['name' => 'Delete product', 'display_name' => 'Delete product', 'parent_id' => '6', 'key_code' => 'delete_product'],

            ['name' => 'Banner', 'display_name' => 'Banner', 'parent_id' => '0'],
            ['name' => 'List banner', 'display_name' => 'List banner', 'parent_id' => '11', 'key_code' => 'list_banner'],
            ['name' => 'Create banner', 'display_name' => 'Create banner', 'parent_id' => '11', 'key_code' => 'create_banner'],
            ['name' => 'Edit banner', 'display_name' => 'Edit banner', 'parent_id' => '11', 'key_code' => 'edit_banner'],
            ['name' => 'Delete banner', 'display_name' => 'Delete banner', 'parent_id' => '11', 'key_code' => 'delete_banner'],

            ['name' => 'Category', 'display_name' => 'Category', 'parent_id' => '0'],
            ['name' => 'List category', 'display_name' => 'List category', 'parent_id' => '16', 'key_code' => 'list_category'],
            ['name' => 'Create category', 'display_name' => 'Create category', 'parent_id' => '16', 'key_code' => 'create_category'],
            ['name' => 'Edit category', 'display_name' => 'Edit category', 'parent_id' => '16', 'key_code' => 'edit_category'],
            ['name' => 'Delete category', 'display_name' => 'Delete category', 'parent_id' => '16', 'key_code' => 'delete_category'],

            ['name' => 'Role', 'display_name' => 'Role', 'parent_id' => '0'],
            ['name' => 'List role', 'display_name' => 'List role', 'parent_id' => '21', 'key_code' => 'list_role'],
            ['name' => 'Create role', 'display_name' => 'Create role', 'parent_id' => '21', 'key_code' => 'create_role'],
            ['name' => 'Edit role', 'display_name' => 'Edit role', 'parent_id' => '21', 'key_code' => 'edit_role'],
            ['name' => 'Delete role', 'display_name' => 'Delete role', 'parent_id' => '21', 'key_code' => 'delete_role'],
        ]);
    }
}
