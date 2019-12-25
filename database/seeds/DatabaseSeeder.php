<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(AssessmentSeeder::class);
        DB::table('users')->insert([

            [
                'name' => 'Admin 1',
                'email' => 'admin@test.com',
                'password' => bcrypt('test1234'),
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@test.com',
                'password' => bcrypt('test1234'),
            ],
            [
                'name' => 'Admin 3',
                'email' => 'admin3@test.com',
                'password' => bcrypt('test1234'),
            ]

        ]);
    }
}
