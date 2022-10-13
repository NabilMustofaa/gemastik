<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Partner;
use App\Models\TagPartner;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Partner::factory(10)->create();
        TagPartner::factory(20)->create();
        User::create([
            'name'=>'nabil',
            'email'=>'nabilmustofa6@gmail.com',
            'password'=>bcrypt('nabil123')
        ]);
        
        
        Category::create([
            'name'=>'Model',
            'emojiCode'=>'1F469',
        ]);
        Category::create([
            'name'=>'Artist',
            'emojiCode'=>'1F469'
        ]);
        Category::create([
            'name'=>'Content Creator',
            'emojiCode'=>'1F469'
        ]);
        Category::create([
            'name'=>'Reviewer',
            'emojiCode'=>'1F469'
        ]);
        Category::create([
            'name'=>'Ilustrator',
            'emojiCode'=>'1F469'
        ]);
        Category::create([
            'name'=>'Food n Beverage',
            'emojiCode'=>'1F469'
        ]);
        Category::create([
            'name'=>'Cosmetic',
            'emojiCode'=>'1F469'
        ]);
        Category::create([
            'name'=>'Fashion',
            'emojiCode'=>'1F469'
        ]);
        Category::create([
            'name'=>'Technology',
            'emojiCode'=>'1F469'
        ]);
        Category::create([
            'name'=>'Travel',
            'emojiCode'=>'1F469'
        ]);

        

        

       

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
