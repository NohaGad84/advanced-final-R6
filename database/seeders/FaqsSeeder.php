<?php

use Illuminate\Database\Seeder;
use App\Models\FAQ;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FAQ::create([
            'question' => 'What is your company\'s mission?',
            'answer' => 'Our mission is to provide exceptional customer service.',
        ]);

    }
}
