<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            ['name' => 'logo'],
            ['name' => 'introduction'],
            ['name' => 'location'],
            ['name' => 'hotline'],
            ['name' => 'twitter link'],
            ['name' => 'facebook link'],
            ['name' => 'gmail link'],
            ['name' => 'instagram link'],
            ['name' => 'youtube link'],
        ]);
    }
}
