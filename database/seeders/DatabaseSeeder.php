<?php
namespace Database\Seeders;

use App\Models\TestLevel;
use App\Models\TestCourse;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed users
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $faker = \Faker\Factory::create();

        // Seed TestLevels
        $testLevelIds = [];
        for ($i = 0; $i < 5; $i++) {
            $levelName = $faker->sentence(3);
            $levelSlug = Str::slug($levelName, '-');
            
            $testLevel = TestLevel::create([
                'name' => $levelName,
                'description' => $faker->paragraph,
                'slug' => $levelSlug,
            ]);

            $testLevelIds[] = $testLevel->id; // Store the ID for later use
        }

        // Seed TestCourses with random TestLevel IDs
        for ($j = 0; $j < 10; $j++) { // Assuming you want to create 50 courses
            $courseName = $faker->sentence(3);
            $courseSlug = Str::slug($courseName, '-');

            TestCourse::create([
                'name' => $courseName,
                'slug' => $courseSlug,
                'test_levels_id' => $faker->randomElement($testLevelIds), // Assign random TestLevel ID
            ]);
        }
    }
}
