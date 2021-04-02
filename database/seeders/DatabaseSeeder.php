<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Grade;
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
        
        User::create(['loginid' => 'admin','password'=>'admin','usertype'=>'admin']);
        User::create(['loginid' => 'abbas','password'=>'123','usertype'=>'teacher']);
        Teacher::create(['name' => 'abbas','phone'=>'03424930066','user_id'=>'2']);

        Grade::create(['name' => 'XI-A']);
        Grade::create(['name' => 'XI-B']);
       
        Subject::create(['name' => 'OOP']);
        Subject::create(['name' => 'DBS']);
        Subject::create(['name' => 'COAL']);
        Subject::create(['name' => 'CSA']);
    }
}
