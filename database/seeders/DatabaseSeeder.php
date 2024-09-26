<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TestLevel;
use App\Models\TestCourse;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Users
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'ashish@test.com',
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
        $testCourseIds = []; // Initialize the array
        for ($j = 0; $j < 10; $j++) { // Assuming you want to create 50 courses
            $courseName = $faker->sentence(3);
            $courseSlug = Str::slug($courseName, '-');

            $testCourse = TestCourse::create([
                'name' => $courseName,
                'slug' => $courseSlug,
                'test_levels_id' => $faker->randomElement($testLevelIds), // Assign random TestLevel ID
            ]);

            $testCourseIds[] = $testCourse->id;
        }

        // Seed Questions
        $questionCount = 1000; // Define how many questions you want

        for ($k = 0; $k < $questionCount; $k++) {
            // Generate options
            $options = [
                'A' => $faker->sentence(5),
                'B' => $faker->sentence(5),
                'C' => $faker->sentence(5),
                'D' => $faker->sentence(5),
            ];

            // Randomly select the correct answer
            $answer = $faker->randomElement(['A', 'B', 'C', 'D']);

            // Create the Question record
            Question::create([
                'test_levels_id'   => $faker->randomElement($testLevelIds),  // Always select a TestLevel ID
                'test_courses_id'  => $faker->randomElement($testCourseIds), // Always select a TestCourse ID
                'question'         => $faker->sentence(10),
                'options'          => $options, // Automatically cast to JSON
                'answer'           => $answer,
                'reason'           => $faker->paragraph,
            ]);
        }

        // Optionally, you can add progress indicators or chunk inserts for large datasets
    }
}
