<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Cruz Antonio',
                'rol_id' => 1,
                'first_last_name' => 'Tenorio',
                'second_last_name' => 'Diaz',
                'phone' => '3321542658',
                'email' => 'tony@adrlabs.com',
                'password' => bcrypt('admin123'),
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => 1
            ],
            /*[
                'name' => 'Juan',
                'rol_id' => 1,
                'first_last_name' => 'Perez',
                'second_last_name' => 'Hernandez',
                'phone' => '332514265',
                'email' => 'juan@estrasol.com.mx',
                'password' => bcrypt('admin123'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => 1
            ],
            [
                'name' => 'Matilde',
                'rol_id' => 2,
                'first_last_name' => 'Sanchez',
                'second_last_name' => 'Martinez',
                'phone' => '3325142652',
                'email' => 'mati@customer.com',
                'password' => bcrypt('custom123'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => 1
            ],
            [
                'name' => 'Guadalupe',
                'rol_id' => 2,
                'first_last_name' => 'Castillo',
                'second_last_name' => 'Morales',
                'phone' => '3333625147891542658',
                'email' => 'lupe@customer.com',
                'password' => bcrypt('custom123'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => 1
            ]*/
        ];

        DB::table('users')->truncate();

        foreach ($users as $user){
            DB::table('users')->insert($user);
        }
    }
}
