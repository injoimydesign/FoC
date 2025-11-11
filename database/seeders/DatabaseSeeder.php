<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flag;
use App\Models\FlagEvent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@flagservice.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create test customer
        User::create([
            'name' => 'John Doe',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        // Seed Flags
        $flags = [
            [
                'name' => 'American Flag',
                'description' => 'Standard U.S. flag for yard display, 3\' x 5\'',
                'base_price' => 45.00,
                'image_url' => 'https://images.unsplash.com/photo-1593352216840-1aee13f45818?w=800',
                'flag_type' => 'us_flag',
                'military_branch' => null,
                'active' => true,
            ],
            [
                'name' => 'Army Flag',
                'description' => 'United States Army flag for yard display',
                'base_price' => 50.00,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/United_States_Army_flag.svg/800px-United_States_Army_flag.svg.png',
                'flag_type' => 'military_flag',
                'military_branch' => 'Army',
                'active' => true,
            ],
            [
                'name' => 'Navy Flag',
                'description' => 'United States Navy flag for yard display',
                'base_price' => 50.00,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Flag_of_the_United_States_Navy.svg/800px-Flag_of_the_United_States_Navy.svg.png',
                'flag_type' => 'military_flag',
                'military_branch' => 'Navy',
                'active' => true,
            ],
            [
                'name' => 'Air Force Flag',
                'description' => 'United States Air Force flag for yard display',
                'base_price' => 50.00,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Flag_of_the_United_States_Air_Force.svg/800px-Flag_of_the_United_States_Air_Force.svg.png',
                'flag_type' => 'military_flag',
                'military_branch' => 'Air Force',
                'active' => true,
            ],
            [
                'name' => 'Marines Flag',
                'description' => 'United States Marine Corps flag for yard display',
                'base_price' => 50.00,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/Flag_of_the_United_States_Marine_Corps.svg/800px-Flag_of_the_United_States_Marine_Corps.svg.png',
                'flag_type' => 'military_flag',
                'military_branch' => 'Marines',
                'active' => true,
            ],
        ];

        foreach ($flags as $flag) {
            Flag::create($flag);
        }

        // Seed Flag Events
        $events = [
            [
                'name' => 'Memorial Day',
                'date' => '2025-05-26',
                'description' => 'Honor and remember military personnel who died in service',
            ],
            [
                'name' => 'Flag Day',
                'date' => '2025-06-14',
                'description' => 'Commemorates the adoption of the U.S. flag',
            ],
            [
                'name' => 'Independence Day',
                'date' => '2025-07-04',
                'description' => 'Celebration of United States independence',
            ],
            [
                'name' => 'Labor Day',
                'date' => '2025-09-01',
                'description' => 'Honors the American labor movement',
            ],
            [
                'name' => 'Veterans Day',
                'date' => '2025-11-11',
                'description' => 'Honors military veterans who served in the United States Armed Forces',
            ],
        ];

        foreach ($events as $event) {
            FlagEvent::create($event);
        }
    }
}
