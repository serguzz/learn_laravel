<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<11; $i++) {
          \Illuminate\Support\Facades\DB::table('products')->insert([
              'title' => 'Product '.$i,
              'price' => rand(200, 1500),
              'in_stock' => 1,
              'description' => 'Lorem ipsum dolor ... Заглушка для описания',
           ]);
        }
    }
}
