<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ski;
use App\Models\User;
use App\Models\Type;
use App\Models\Brand;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Ski::truncate();
        User::truncate();
        Brand::truncate();
        Type::truncate();

        $this->call([
            TypeSeeder::class
        ]);
        Ski::factory(10)->create();
    }
}
