<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        [
            'company_id' => 1,
            'product_name' => 'ドリップコーヒーSB',
            'price' => 380,
            'stock' => 20,
            'comment' => 'shot size',
            'img_path' => '',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
            
      ],
        [
            'company_id' => 2,
            'product_name' => 'ドリップコーヒーDT',
            'price' => 360,
            'stock' => 20,
            'comment' => 'shot size',
            'img_path' => '',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
      ],
    ]);

    }
}
