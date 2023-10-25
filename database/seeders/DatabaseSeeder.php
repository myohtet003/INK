<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //user
        \App\Models\User::factory()->create([
            'name'  =>'MTN',
            'email' =>'mtn@gmail.com',
            'password'=>Hash::make('12345678')

        ]);

        \App\Models\User::factory()->create([
            'name'  =>'Sayar',
            'email' =>'sayar@gmail.com',
            'password'=>Hash::make('87654321')

        ]);

        //category
        \App\Models\Category::factory()->create([
            'name'  =>'Computer',
            'photo' =>'1.jpg',
            'remark'=>''

        ]);

        \App\Models\Category::factory()->create([
            'name'  =>'Phone',
            'photo' =>'2.jpg',
            'remark'=>''

        ]);

        //item
        \App\Models\Item::factory()->create([
            'category_id'=>1,
            'name'  =>'Dell',
            'photo' =>'dell.jpg',
            'remark'=>''

        ]);

        \App\Models\Item::factory()->create([
            'category_id'=>1,
            'name'  =>'Acer',
            'photo' =>'acer.jpg',
            'remark'=>''

        ]);

        \App\Models\Item::factory()->create([
            'category_id'=>2,
            'name'  =>'Samsung',
            'photo' =>'samsung.jpg',
            'remark'=>''

        ]);

        \App\Models\Item::factory()->create([
            'category_id'=>2,
            'name'  =>'iPhone',
            'photo' =>'iphone.jpg',
            'remark'=>''

        ]);

        //products
        \App\Models\Product::factory()->create([
            'category_id'=>1,
            'item_id'=>1,
            'name'  =>'Dell i5',
            'photo' =>'delli5.jpg',
            'price' =>5000000,
            'qty' =>10,
            'remark'=>''

        ]);

         \App\Models\Product::factory()->create([
            'category_id'=>1,
            'item_id'=>1,
            'name'  =>'Dell i7',
            'photo' =>'delli7.jpg',
            'price' =>7000000,
            'qty' =>5,
            'remark'=>''

        ]);

         \App\Models\Product::factory()->create([
            'category_id'=>1,
            'item_id'=>2,
            'name'  =>'Acer i5',
            'photo' =>'aceri5.jpg',
            'price' =>4000000,
            'qty' =>15,
            'remark'=>''

        ]);

         \App\Models\Product::factory()->create([
            'category_id'=>1,
            'item_id'=>2,
            'name'  =>'Acer i7',
            'photo' =>'aceri7.jpg',
            'price' =>6000000,
            'qty' =>8,
            'remark'=>''

        ]);

         \App\Models\Product::factory()->create([
            'category_id'=>2,
            'item_id'=>3,
            'name'  =>'Samsung 4/64',
            'photo' =>'samsung.jpg',
            'price' =>200000,
            'qty' =>18,
            'remark'=>''

        ]);

         \App\Models\Product::factory()->create([
            'category_id'=>2,
            'item_id'=>3,
            'name'  =>'Samsung 8/64',
            'photo' =>'samsung.jpg',
            'price' =>400000,
            'qty' =>3,
            'remark'=>''

        ]);

         \App\Models\Product::factory()->create([
            'category_id'=>2,
            'item_id'=>4,
            'name'  =>'iPhone 4/64',
            'photo' =>'iphone.jpg',
            'price' =>3000000,
            'qty' =>8,
            'remark'=>''

        ]);

         \App\Models\Product::factory()->create([
            'category_id'=>2,
            'item_id'=>4,
            'name'  =>'iPhone 8/64',
            'photo' =>'iphone.jpg',
            'price' =>4000000,
            'qty' =>4,
            'remark'=>''

        ]);
    }
}
