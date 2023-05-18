<?php

use Database\Seeders\GradeSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ClassroomSeeder;
use Database\Seeders\SectionsSeeder;
use Database\Seeders\ParentsSeeder;
use Database\Seeders\StudentsSeeder;
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
        $this->call(BloodTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(religionTableSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(SectionsSeeder::class);
        $this->call(ParentsSeeder::class);
        $this->call(StudentsSeeder::class);
    }
}
