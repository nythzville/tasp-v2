<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
      	// Default Admin
        DB::table('users')->insert([
    		'id'					=>	1,
            'name' 					=>	'admin',
            'email' 				=>	'admin@ea-english.com',
            'password' 				=> 	bcrypt('123qwe'),
            'user_type'				=> 'ADMIN',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Default Agent
        DB::table('users')->insert([
            'id'                    =>  2,
            'name'                  =>  'eaenglish_agent',
            'email'                 =>  'agent@ea-english.com',
            'password'              =>  bcrypt('123qwe'),
            'user_type'             => 'AGENT',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('agents')->insert([
            'id'                        =>  1,
            'user_id'                   =>  2,
            'agent_id'                  =>  'eaenglish',

            'lastname'                  =>  'English',
            'firstname'                 =>  'EA',
            'gender'                    =>  'female',
            'dob'                       => '1990-01-01',
            'skype'                     =>  '',
            'qq'                        =>  '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Student account
        DB::table('users')->insert([
            'id'                    =>  10,
            'name'                  =>  'macgrover',
            'email'                 =>  'macgrover@mail.com',
            'password'              =>  bcrypt('123456'),
            'user_type'             => 'STUDENT',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('students')->insert([
            'id'                        =>  1,
            'user_id'                   =>  10,
            'student_id'                =>  'std0001',
            'agent_id'                  =>  1,
            'lastname'                  =>  'Grover',
            'firstname'                 =>  'Mac',
            'gender'                    =>  'male',
            'dob'                       =>  '1992-12-12',
            'skype'                     =>  '',
            'qq'                        =>  '',
            'available_class'           => 20,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('courses')->insert([
            'id'                        =>  1,
            'student_id'                =>  1,
            'name'                      =>  'english_course',
            'description'               =>  'english_course',
            'status'                    =>  'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
    
        ]);
        

        // Teacher account
        DB::table('users')->insert([
            'id'                    =>  5,
            'name'                  =>  'teacher1',
            'email'                 =>  'teacher1@mail.com',
            'password'              =>  bcrypt('123qwe'),
            'user_type'             => 'TEACHER',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('teachers')->insert([
            'id'                        =>  1,
            'user_id'                   =>  5,
            'teacher_id'                =>  'tch001',
            'lastname'                  =>  'Siosan',
            'firstname'                 =>  'Ken',
            'gender'                    =>  'male',
            'dob'                       => '1989-11-01 00:00:00',
            'skype'                     =>  '',
            'qq'                        =>  '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        // Teacher account
        DB::table('users')->insert([
            'id'                    =>  6,
            'name'                  =>  'teacher2',
            'email'                 =>  'teacher2@mail.com',
            'password'              =>  bcrypt('123qwe'),
            'user_type'             => 'TEACHER',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('teachers')->insert([
            'id'                        =>  2,
            'user_id'                   =>  6,
            'teacher_id'                =>  'tch002',

            'lastname'                  =>  'Jodert',
            'firstname'                 =>  'Bulaklak',
            'gender'                    =>  'male',
            'dob'                       => '1989-11-01 00:00:00',
            'skype'                     =>  '',
            'qq'                        =>  '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        // Teacher account
        DB::table('users')->insert([
            'id'                    =>  7,
            'name'                  =>  'teacher3',
            'email'                 =>  'teacher3@mail.com',
            'password'              =>  bcrypt('123qwe'),
            'user_type'             => 'TEACHER',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('teachers')->insert([
            'id'                        =>  3,
            'user_id'                   =>  7,
            'teacher_id'                =>  'tch003',

            'lastname'                  =>  'Ricardo',
            'firstname'                 =>  'Dalisay',
            'gender'                    =>  'male',
            'dob'                       => '1989-11-01 00:00:00',
            'skype'                     =>  '',
            'qq'                        =>  '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);


        // Teacher account
        DB::table('users')->insert([
            'id'                    =>  89,
            'name'                  =>  'peter',
            'email'                 =>  'peter@mail.com',
            'password'              =>  bcrypt('123qwe'),
            'user_type'             => 'TEACHER',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('teachers')->insert([
            'id'                        =>  56,
            'user_id'                   =>  89,
            'teacher_id'                =>  'tch056',

            'lastname'                  =>  'Thomas',
            'firstname'                 =>  'Peter',
            'gender'                    =>  'male',
            'dob'                       => '1988-11-01 00:00:00',
            'skype'                     =>  '',
            'qq'                        =>  '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        // Teacher account
        DB::table('users')->insert([
            'id'                    =>  67,
            'name'                  =>  'james',
            'email'                 =>  'james@mail.com',
            'password'              =>  bcrypt('123qwe'),
            'user_type'             => 'TEACHER',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('teachers')->insert([
            'id'                        =>  89,
            'user_id'                   =>  67,
            'teacher_id'                =>  'tch089',

            'lastname'                  =>  'James',
            'firstname'                 =>  'JOnes',
            'gender'                    =>  'male',
            'dob'                       => '1988-11-01 00:00:00',
            'skype'                     =>  '',
            'qq'                        =>  '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);


        // Teacher account
        DB::table('users')->insert([
            'id'                    =>  589,
            'name'                  =>  'howard',
            'email'                 =>  'howard@mail.com',
            'password'              =>  bcrypt('123qwe'),
            'user_type'             => 'TEACHER',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('teachers')->insert([
            'id'                        =>  23,
            'user_id'                   =>  589,
            'teacher_id'                =>  'tch023',

            'lastname'                  =>  'Howard',
            'firstname'                 =>  'Paul',
            'gender'                    =>  'male',
            'dob'                       => '1988-11-01 00:00:00',
            'skype'                     =>  '',
            'qq'                        =>  '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);


        DB::table('news')->insert([
            'id'                        =>  1,
            'author'                    =>  1,
            'title'                     =>  'No Classes From September 30 to October 4',
            'content'                   =>  'Hello 123',
            'setting'                   => '{}',
            'status'                    =>  'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
