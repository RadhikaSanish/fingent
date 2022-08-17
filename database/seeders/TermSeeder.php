<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Term;
use Illuminate\Support\Facades\DB;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('term')->truncate();
        Term::create([
            'name' => 'First Term',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Term::create([
            'name' => 'Second Term',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Term::create([
            'name' => 'Third Term',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
