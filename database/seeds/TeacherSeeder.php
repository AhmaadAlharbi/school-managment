<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            [
                'email' => 'teacheer1@example.com',
                'password' => Hash::make('password123'),
                'name' => json_encode(['en' => 'Hamdy', 'ar' => 'حمدي']),
                'Specialization_id' => 1, // Assuming gender ID
                'Gender_id' => 1, // Assuming nationality ID
                'Joining_Date' => '2005-06-15', // Assuming blood type ID
                'Address' => 'Kuwait',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'teacheer2@example.com',
                'password' => Hash::make('password123'),
                'name' => json_encode(['en' => 'alaa', 'ar' => 'علاء']),
                'Specialization_id' => 2, // Assuming gender ID
                'Gender_id' => 1, // Assuming nationality ID
                'Joining_Date' => '2005-06-15', // Assuming blood type ID
                'Address' => 'Kuwait',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
