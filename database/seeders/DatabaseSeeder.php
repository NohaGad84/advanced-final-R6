<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Log; 

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

            foreach ($users as $user) {
                Message::factory(10)->create([
                    'user_id' => $user->id,
                    'is_read' => false,
                ]);
            }
        
    }

        // Category::factory(10)->create();
        // Topic::factory(10)->create();
        // Message::factory(10)->create();

        // Contact::factory()->count(10)->create();
        // Testimonial::factory(10)->create();


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    
}   
