<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Listing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email'=> 'john@gmail.com'
        ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel,javascript',
        //     'company' => 'Acme Crop',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque deleniti, aut non optio veritatis reiciendis tempora, alias soluta in accusantium iure autem perspiciatis odit id quibusdam incidunt rerum eius hic.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque deleniti, aut non optio veritatis reiciendis tempora, alias soluta in accusantium iure autem perspiciatis odit id quibusdam incidunt rerum eius hic.'
        // ]);
        // Listing::create([
        //     'title' => 'React Senior Developer',
        //     'tags' => 'react,javascript',
        //     'company' => 'Acme Crop',
        //     'location' => 'Boston, MA',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque deleniti, aut non optio veritatis reiciendis tempora, alias soluta in accusantium iure autem perspiciatis odit id quibusdam incidunt rerum eius hic.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque deleniti, aut non optio veritatis reiciendis tempora, alias soluta in accusantium iure autem perspiciatis odit id quibusdam incidunt rerum eius hic.'
        // ]);
        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
    }
}
