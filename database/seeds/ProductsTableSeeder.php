<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 20; $i++) {
            $name =  Str::random(10).$i;
            DB::table('products')->insert([
                'name'  => $name,
                'slug'  => $name,
                'sku'   => rand(5,5),
                'price' => rand(1,3),
                'state' => 'active',
                'stock' => 100,
                'user_id' => rand(1,5),

            ]);
        }
    }
}
