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
        Level::create(['name' => 'BSCS','numOfSemesters'=>'8']);
       
        Subject::create(['name' => 'OOP']);
        Subject::create(['name' => 'DBS']);
        Subject::create(['name' => 'COAL']);
        
        User::create(['name' => 'admin','phone'=>'admin','password'=>'123','type'=>'admin']);
        User::create(['name' => 'teacher','phone'=>'03424930066','password'=>'123','type'=>'teacher']);
        
    }
}
