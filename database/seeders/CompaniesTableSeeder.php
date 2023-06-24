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
                'company_name' => 'Starbucks Coffee Japan',
                'street_address' => '東京都品川区上大崎',
                'representative_name' => '水口貴文',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
                
            ],
          [
            'company_name' => '株式会社ドトールコーヒー',
            'street_address' => '東京都渋谷区神南',
            'representative_name' => '星野正則',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
            
      ]
          ]);
    }
}
