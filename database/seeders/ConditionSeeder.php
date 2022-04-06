<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('conditions')->delete();

        \DB::table('conditions')->insert([
                ['id' => '1', 'name' => 'New'],
                ['id' => '2', 'name' => 'Like-New'],
                ['id' => '3', 'name' => 'Used'],
                ['id' => '4', 'name' => 'Broken'],
                ['id' => '5', 'name' => 'Unknown'],
        ]);
    }
}
