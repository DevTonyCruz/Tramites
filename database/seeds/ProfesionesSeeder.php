<?php

use Illuminate\Database\Seeder;
use App\Models\Profesiones;

class ProfesionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profesiones')->truncate();
        factory(Profesiones::class)->times(20)->create();
    }
}
