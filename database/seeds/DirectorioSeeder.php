<?php

use Illuminate\Database\Seeder;
use App\Models\Directorio;

class DirectorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('directorio')->truncate();
        factory(Directorio::class)->times(100)->create();
    }
}
