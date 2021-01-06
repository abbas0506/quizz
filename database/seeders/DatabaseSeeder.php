<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Level;
use App\Models\Subject;

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
        
        User::create(['name' => 'admin','phone'=>'admin','password'=>'123','type'=>'admin']);
        User::create(['name' => 'abbas','phone'=>'03424930066','password'=>'123','type'=>'teacher']);
        Teacher::create(['userId' => '2']);

        Level::create(['name' => 'ADPCS','numOfSemesters'=>'4']);
        Level::create(['name' => 'BSCS','numOfSemesters'=>'8']);
       
        Subject::create(['name' => 'OOP']);
        Subject::create(['name' => 'DBS']);
        Subject::create(['name' => 'COAL']);
    }
}
