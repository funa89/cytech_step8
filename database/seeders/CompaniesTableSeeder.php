<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
           [
            'company_name' => '企業A',
            'street_address' => '東京都',
            'representative_name' => 'テスト',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
                
           ],
           [
            'company_name' => '企業B',
            'street_address' => '東京都',
            'representative_name' => 'テスト',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
                
           ],
           [
            'company_name' => '企業C',
            'street_address' => '東京都',
            'representative_name' => 'テスト',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
                
           ],
           [
            'company_name' => '企業D',
            'street_address' => '東京都',
            'representative_name' => 'テスト',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
                
           ],
           [
            'company_name' => '企業E',
            'street_address' => '東京都',
            'representative_name' => 'テスト',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
                
           ],
           [
            'company_name' => '企業F',
            'street_address' => '東京都',
            'representative_name' => 'テスト',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
                
           ],
           [
            'company_name' => '企業G',
            'street_address' => '東京都',
            'representative_name' => 'テスト',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
                
           ],
          ]);
    }
}
