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
            'product_name' => '商品A',
            'price' => 100,
            'stock' => 20,
            'comment' => 'テスト',
            'img_path' => '',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
            
        ],
        [
            'company_id' => 2,
            'product_name' => '商品B',
            'price' => 100,
            'stock' => 20,
            'comment' => 'テスト',
            'img_path' => '',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ],
        [
            'company_id' => 3,
            'product_name' => '商品C',
            'price' => 100,
            'stock' => 20,
            'comment' => 'テスト',
            'img_path' => '',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ],
        [
            'company_id' => 4,
            'product_name' => '商品D',
            'price' => 100,
            'stock' => 20,
            'comment' => 'テスト',
            'img_path' => '',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ],
        [
            'company_id' => 5,
            'product_name' => '商品E',
            'price' => 100,
            'stock' => 20,
            'comment' => 'テスト',
            'img_path' => '',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ],
        [
            'company_id' => 6,
            'product_name' => '商品F',
            'price' => 100,
            'stock' => 20,
            'comment' => 'テスト',
            'img_path' => '',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ],
        [
            'company_id' => 7,
            'product_name' => '商品G',
            'price' => 100,
            'stock' => 20,
            'comment' => 'テスト',
            'img_path' => '',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ],
    ]);

    }
}
