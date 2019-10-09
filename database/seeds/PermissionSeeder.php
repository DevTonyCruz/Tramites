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
            ['name' => 'Cambiar Contraseña','controller' => 'Users','slug' => 'users.password','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar Contraseña','controller' => 'Users','slug' => 'users.updatePassword','created_at' => $date,'updated_at' => $date,],
            //Usuarios
            ['name' => 'Listado','controller' => 'Remitentes','slug' => 'remitente.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Crear','controller' => 'Remitentes','slug' => 'remitente.create','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Guardar','controller' => 'Remitentes','slug' => 'remitente.store','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Remitentes','slug' => 'remitente.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Remitentes','slug' => 'remitente.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Borrar','controller' => 'Remitentes','slug' => 'remitente.destroy','created_at' => $date,'updated_at' => $date,],
            //Gestion
            ['name' => 'Listado','controller' => 'Gestion','slug' => 'gestion.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Crear','controller' => 'Gestion','slug' => 'gestion.create','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Guardar','controller' => 'Gestion','slug' => 'gestion.store','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Gestion','slug' => 'gestion.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Gestion','slug' => 'gestion.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Borrar','controller' => 'Gestion','slug' => 'gestion.destroy','created_at' => $date,'updated_at' => $date,],
            //Tramites
            ['name' => 'Listado','controller' => 'Tramites','slug' => 'tramites.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Crear','controller' => 'Tramites','slug' => 'tramites.create','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Guardar','controller' => 'Tramites','slug' => 'tramites.store','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Tramites','slug' => 'tramites.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Tramites','slug' => 'tramites.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Borrar','controller' => 'Tramites','slug' => 'tramites.destroy','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Estatus','controller' => 'Tramites','slug' => 'tramites.export','created_at' => $date,'updated_at' => $date,],
            //Grupos
            ['name' => 'Listado','controller' => 'Grupos','slug' => 'grupos.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Crear','controller' => 'Grupos','slug' => 'grupos.create','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Guardar','controller' => 'Grupos','slug' => 'grupos.store','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Grupos','slug' => 'grupos.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Grupos','slug' => 'grupos.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Borrar','controller' => 'Grupos','slug' => 'grupos.destroy','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Estatus','controller' => 'Grupos','slug' => 'grupos.status','created_at' => $date,'updated_at' => $date,],
            //profesiones
            ['name' => 'Listado','controller' => 'Profesiones','slug' => 'profesiones.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Crear','controller' => 'Profesiones','slug' => 'profesiones.create','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Guardar','controller' => 'Profesiones','slug' => 'profesiones.store','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Profesiones','slug' => 'profesiones.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Profesiones','slug' => 'profesiones.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Borrar','controller' => 'Profesiones','slug' => 'profesiones.destroy','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Estatus','controller' => 'Profesiones','slug' => 'profesiones.status','created_at' => $date,'updated_at' => $date,],
            //fechas
            ['name' => 'Listado','controller' => 'Fechas','slug' => 'fechas.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Crear','controller' => 'Fechas','slug' => 'fechas.create','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Guardar','controller' => 'Fechas','slug' => 'fechas.store','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Fechas','slug' => 'fechas.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Fechas','slug' => 'fechas.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Borrar','controller' => 'Fechas','slug' => 'fechas.destroy','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Estatus','controller' => 'Fechas','slug' => 'fechas.status','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Importantes','controller' => 'Fechas','slug' => 'fechas.importantes','created_at' => $date,'updated_at' => $date,],
            //directorio
            ['name' => 'Listado','controller' => 'Directorio','slug' => 'directorio.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Crear','controller' => 'Directorio','slug' => 'directorio.create','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Guardar','controller' => 'Directorio','slug' => 'directorio.store','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Directorio','slug' => 'directorio.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Directorio','slug' => 'directorio.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Borrar','controller' => 'Directorio','slug' => 'directorio.destroy','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Estatus','controller' => 'Directorio','slug' => 'directorio.status','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Alertas','controller' => 'Directorio','slug' => 'directorio.alertas','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Descargar por profesión','controller' => 'Tramites','slug' => 'directorio.exportProfesiones','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Descargar por grupo','controller' => 'Tramites','slug' => 'directorio.exportGrupos','created_at' => $date,'updated_at' => $date,],
            //registros
            ['name' => 'Listado','controller' => 'Registros','slug' => 'registros.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Crear','controller' => 'Registros','slug' => 'registros.create','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Guardar','controller' => 'Registros','slug' => 'registros.store','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Registros','slug' => 'registros.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Registros','slug' => 'registros.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Borrar','controller' => 'Registros','slug' => 'registros.destroy','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Estatus','controller' => 'Registros','slug' => 'registros.status','created_at' => $date,'updated_at' => $date,],
            //nuevos
            ['name' => 'Listado','controller' => 'Configuraciones','slug' => 'configuration.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Configuraciones','slug' => 'configuration.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Configuraciones','slug' => 'configuration.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Listado','controller' => 'Eventos','slug' => 'evento.index','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Crear','controller' => 'Eventos','slug' => 'evento.create','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Guardar','controller' => 'Eventos','slug' => 'evento.store','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Editar','controller' => 'Eventos','slug' => 'evento.edit','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Actualizar','controller' => 'Eventos','slug' => 'evento.update','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Borrar','controller' => 'Eventos','slug' => 'evento.destroy','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Estatus','controller' => 'Eventos','slug' => 'evento.status','created_at' => $date,'updated_at' => $date,],
            ['name' => 'Listado eventos','controller' => 'Directorio','slug' => 'directorio.eventos','created_at' => $date,'updated_at' => $date,],
            
        ];

        DB::table('permissions')->truncate();

        foreach ($permissions as $permission){
            DB::table('permissions')->insert($permission);
        }
    }
}
