<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Level;
use App\Models\User;

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
        
        Level::create(['name' => 'ADPCS']);
        Level::create(['name' => 'BSCS']);
        Level::create(['name' => 'MCS']);
        
        Subject::create(['name' => 'OOP']);
        Subject::create(['name' => 'DBS']);
        Subject::create(['name' => 'COAL']);
        
        User::create(['name' => 'abbas','phone'=>'03424930066','password'=>'123']);
        User::create(['name' => 'umair','phone'=>'03464428505','password'=>'123']);
        User::create(['name' => 'admin','phone'=>'ahmad','password'=>'admin1','type'=>'admin']);
        // Quiz::factory(50)->create();
        // Question::factory(300)->create();
        // Result::factory(1)->create();
        
    }
}
