<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run()
    {
        $users = \App\Models\User::all();
    
        \App\Models\Event::factory(5)->create()->each(function ($event) use ($users) {
            $invited = $users->random(3);
            foreach ($invited as $user) {
                \App\Models\Invitation::create([
                    'event_id' => $event->id,
                    'user_id' => $user->id,
                    'status' => 'pending',
                ]);
            }
        });
    }
    
}
