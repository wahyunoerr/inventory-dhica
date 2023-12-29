<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            'name' => 'aaa',
            'category_id' => 2,
            'harga' => 2000,
            'image' => 'ada',
            'stock' => 20
        ]);
    }
}
