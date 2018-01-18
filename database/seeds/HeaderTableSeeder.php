<?php

use Illuminate\Database\Seeder;

class HeaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('header')->insert([
            'about_img' => 'about',
            'product_img' => 'product',
            'product_set_img' => 'product_set',
            'gallery_img' => 'gallery',
            'blog_img' => 'blog'
        ]);
    }
}
