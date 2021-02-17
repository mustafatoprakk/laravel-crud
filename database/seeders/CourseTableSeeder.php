<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("course")->insert(
            [
                "course_title" => "title 1",
                "course_content" => "content 1",
                "course_must" => "1"
            ]
        );
    }
}
