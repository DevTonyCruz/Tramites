<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RelationRolPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $permisos = [
            ['rol_id' => 1,'permission_id' => 1,'created_at' => $date,'updated_at' => $date],
            ['rol_id' => 1,'permission_id' => 2,'created_at' => $date,'updated_at' => $date],
            ['rol_id' => 1,'permission_id' => 3,'created_at' => $date,'updated_at' => $date],
            ['rol_id' => 1,'permission_id' => 4,'created_at' => $date,'updated_at' => $date],
            ['rol_id' => 1,'permission_id' => 5,'created_at' => $date,'updated_at' => $date],
            ['rol_id' => 1,'permission_id' => 6,'created_at' => $date,'updated_at' => $date],
            ['rol_id' => 1,'permission_id' => 7,'created_at' => $date,'updated_at' => $date],
            ['rol_id' => 1,'permission_id' => 8,'created_at' => $date,'updated_at' => $date],
            ['rol_id' => 1,'permission_id' => 9,'created_at' => $date,'updated_at' => $date],
            ['rol_id' => 1,'permission_id' => 10,'created_at' => $date,'updated_at' => $date],
            ['rol_id' => 1,'permission_id' => 11,'created_at' => $date,'updated_at' => $date],
        ];

        DB::table('relation_rol_permission')->truncate();

        foreach ($permisos as $permiso){
            DB::table('relation_rol_permission')->insert($permiso);
        }
    }
}
