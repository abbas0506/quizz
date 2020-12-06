<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Level;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Result;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        Level::create(['name' => 'Part I']);
        Level::create(['name' => 'Part II']);

        Subject::create(['name' => 'Islamiat']);
        Subject::create(['name' => 'Pak Studies']);
        Subject::create(['name' => 'Computer Sc.']);
        
        User::create(['name' => 'abbas','phone'=>'03424930066','password'=>'123']);
        User::create(['name' => 'umair','phone'=>'03464428505','password'=>'123']);
        
        // Quiz::factory(50)->create();
        // Question::factory(300)->create();
        // Result::factory(1)->create();
        
    }
}
