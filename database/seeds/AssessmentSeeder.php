<?php

use Illuminate\Database\Seeder;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assesment')->insert([
            [
                'title' => 'cpp'
            ],
            [
                'title' => 'ceiq'
            ],
            [
                'title' => 'ceta'
            ],
            [
                'title' => 'lcpa'
            ],
            [
                'title' => 'iae'
            ],
            [
                'title' => 'apa'
            ],
            [
                'title' => 'hots'
            ],
        ]);
    }
}
