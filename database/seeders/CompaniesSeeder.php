<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_companies')->insert([
            'comp_name' => 'ThisCompNames',
            'comp_phone' => '+62811223344',
            'comp_email' => 'comp@mail.com',
            'comp_address' => 'Companies Address',
            'comp_about' => 'About This Companies',
        ]);
    }
}
