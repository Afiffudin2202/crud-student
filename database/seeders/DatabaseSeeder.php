<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;

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

        Student::create([
            'name' => 'afif',
            'email' =>'afiffudin359@gmail.com',
            'gender' => 'M',
            'address' => 'Pamulang',
            'phone' => 82127021230
        ]);

        Subject::create([
            'id_subject' => 'MTK',
            'name' => 'Matematika',
            'department' => 'TKJ'
        ]);
        
    }
}
