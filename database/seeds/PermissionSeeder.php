<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $permissions = [
            //Admin
            ['name' => 'Dashboard','controller' => 'Admin','slug' => 'Admin','created_at' => $date,'updated_at' => $date,],
            //Roles
            ['name' => 'Listado','controller' => 'Roles','slug' => 'roles.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Crear','controller' => 'Roles','slug' => 'roles.create','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Guardar','controller' => 'Roles','slug' => 'roles.store','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Visualizar','controller' => 'Roles','slug' => 'roles.show','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Roles','slug' => 'roles.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Roles','slug' => 'roles.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Borrar','controller' => 'Roles','slug' => 'roles.destroy','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Estatus','controller' => 'Roles','slug' => 'roles.status','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Ver permisos','controller' => 'Roles','slug' => 'roles.permission','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Agregar permisos','controller' => 'Roles','slug' => 'roles.savePermission','created_at' => $date,'updated_at' => $date,],
            //Usuarios
            ['name' => 'Listado','controller' => 'Users','slug' => 'users.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Crear','controller' => 'Users','slug' => 'users.create','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Guardar','controller' => 'Users','slug' => 'users.store','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Visualizar','controller' => 'Users','slug' => 'users.show','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Users','slug' => 'users.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Users','slug' => 'users.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Borrar','controller' => 'Users','slug' => 'users.destroy','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Estatus','controller' => 'Users','slug' => 'users.status','created_at' => $date,'updated_at' => $date,],
        ];

        DB::table('permissions')->truncate();

        foreach ($permissions as $permission){
            DB::table('permissions')->insert($permission);
        }
    }
}
