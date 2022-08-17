<?php

namespace Database\Seeders;

use App\Models\teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('teachers')->truncate();
        teacher::create([
            'name' => 'Katie',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        teacher::create([
            'name' => 'Max',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
    }
}
