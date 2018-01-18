<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
//            settings
            'website_name' => 'Furniture Design',
            'website_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus cum dignissimos eum eveniet molestiae, nulla officiis quo repellendus. Ab dicta eum velit? Aliquam consequatur odio perferendis placeat quis similique voluptatibus!',
            'maintenance' => 'disable',
            'maintenance_message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus cum dignissimos eum eveniet molestiae, nulla officiis quo repellendus. Ab dicta eum velit? Aliquam consequatur odio perferendis placeat quis similique voluptatibus!',
//            contact
            'address' => 'Krian',
            'email' => 'email@email.com',
            'phone' => '+6285708535297',
//            maps
            'gmaps' => 'gmaps',
            'gmaps_query' => 'gmaps_query',
//            images
            'favicon' => 'favicon',
            'icon' => 'icon',
            'not_found' => 'not found',
            'login' => 'login',
            'website_image' => 'website image'
        ]);
    }
}
