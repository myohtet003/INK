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
            'password'=>Hash::make('12345678'),
            'type' => 'admin'

        ]);

        \App\Models\User::factory()->create([
            'name'  =>'Sayar',
            'email' =>'sayar@gmail.com',
            'password'=>Hash::make('87654321'),
            'type' => 'admin'
        ]);

        //Artists
        \App\Models\Artist::factory()->create([
            'name' =>'Johnny',
            'position' =>'Founder',
            'photo' =>'jonny.jpg',
            'fb_link' =>'www.facebook.com',
            'viber_link' =>'www.viber.com',
            'phone' =>'09564324656',
            'status' =>'',
            'remark' =>''
        ]);

        \App\Models\Artist::factory()->create([
            'name' =>'Richard',
            'position' =>'Co-Founder',
            'photo' =>'richard.jpg',
            'fb_link' =>'www.facebook.com',
            'viber_link' =>'www.viber.com',
            'phone' =>'09785433222',
            'status' =>'',
            'remark' =>''
        ]);

        //Artwork
        \App\Models\Artwork::factory()->create([
            'artist_id' => 1,
            'title' =>'aotet foerotew',
            'photo' =>'tattoo.jpg',
            'remark' =>'good'
        ]);

        //Blog
        \App\Models\Blog::factory()->create([
            'artist_id' => 1,
            'title' =>'Tattoo Blog',
            'photo' =>'blog.jpg',
            'description' =>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, consectetur pariatur debitis voluptatem omnis nisi? Facere ducimus id doloribus rerum sit maxime voluptate animi, officia sapiente quod reprehenderit, fugit repellendus.',
            'remark' =>'good'
        ]);


    }
}
