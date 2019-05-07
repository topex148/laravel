<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Users
        Permission::create([
            'name'        =>'Navegar usuarios',
            'slug'        =>'users.index',
            'description' =>'Lista y navega todos los usuarios del sistema',
                ]);

        Permission::create([
            'name'        =>'Ver detalle de usuario',
            'slug'        =>'users.show',
            'description' =>'Ver en detalle cada usuario del sistema',
                ]);

        Permission::create([
            'name'        =>'Edicion de usuarios',
            'slug'        =>'users.edit',
            'description' =>'Editar cualquier dato de un usuario del sistema',
                ]);

        Permission::create([
            'name'        =>'Eliminar usuarios',
            'slug'        =>'users.destroy',
            'description' =>'Eliminar cualquier usuario del sistema',
                ]);

        Permission::create([
            'name'        => 'Imprimir lista usuarios',
            'slug'        => 'usuarios.invoice',
            'description' => 'Muestra lista de usuarios en el sistema',
                ]);

       //Roles

      Permission::create([
          'name'        =>'Navegar roles',
          'slug'        =>'roles.index',
          'description' =>'Lista y navega todos los roles del sistema',
          ]);

      Permission::create([
            'name'        =>'Ver detalle de roles',
            'slug'        =>'roles.show',
            'description' =>'Ver en detalle cada rol del sistema',
            ]);

      Permission::create([
            'name'        =>'Creacion de roles',
            'slug'        =>'roles.create',
            'description' =>'Crear rol en el sistema',
            ]);

      Permission::create([
            'name'        =>'Edicion de roles',
            'slug'        =>'roles.edit',
            'description' =>'Editar cualquier dato de un rol del sistema',
            ]);

      Permission::create([
            'name'        =>'Eliminar roles',
            'slug'        =>'roles.destroy',
            'description' =>'Eliminar cualquier rol del sistema',
            ]);

      Permission::create([
            'name'        => 'Imprimir lista roles',
            'slug'        => 'roles.invoice',
            'description' => 'Muestra lista de roles en el sistema',
            ]);

        //Paquete

        Permission::create([
              'name'        => 'Navegar paquete',
              'slug'        => 'packages.index',
              'description' => 'Lista y navega todos los productos del sistema',
              ]);

        Permission::create([
              'name'        => 'Ver detalle de paquetes',
              'slug'        => 'packages.show',
              'description' => 'Ver en detalle cada paquete del sistema',
              ]);

        Permission::create([
              'name'        => 'Creacion de paquetes',
              'slug'        => 'packages.create',
              'description' => 'Crear paquete en el sistema',
              ]);

        Permission::create([
              'name'        => 'Edicion de paquetes',
              'slug'        => 'packages.edit',
              'description' => 'Editar cualquier dato de un paquete del sistema',
              ]);

        Permission::create([
              'name'        => 'Eliminar paquetes',
              'slug'        => 'packages.destroy',
              'description' => 'Eliminar cualquier paquete del sistema',
              ]);

        Permission::create([
              'name'        => 'Imprimir lista paquetes',
              'slug'        => 'packages.invoice',
              'description' => 'Muestra lista de paquetes en el sistema',
              ]);


        //Actividad

        Permission::create([
              'name'        => 'Navegar actividad',
              'slug'        => 'actividades.index',
              'description' => 'Lista y navega todos las actividades del sistema',
              ]);

        Permission::create([
              'name'        => 'Ver detalle de actividades',
              'slug'        => 'actividades.show',
              'description' => 'Ver en detalle cada actividad del sistema',
              ]);

        Permission::create([
              'name'        => 'Creacion de actividades',
              'slug'        => 'actividades.create',
              'description' => 'Crear actividad en el sistema',
                    ]);

        Permission::create([
              'name'        => 'Edicion de actividades',
              'slug'        => 'actividades.edit',
              'description' => 'Editar cualquier dato de una actividad del sistema',
              ]);

        Permission::create([
              'name'        => 'Eliminar actividad',
              'slug'        => 'actividades.destroy',
              'description' => 'Eliminar cualquier actividad del sistema',
              ]);

        Permission::create([
              'name'        => 'Imprimir lista actividades',
              'slug'        => 'actividades.invoice',
              'description' => 'Muestra lista de actividades en el sistema',
              ]);

        //Atractivo

        Permission::create([
              'name'        => 'Navegar atractivo',
              'slug'        => 'atractivos.index',
              'description' => 'Lista y navega todos los atractivos del sistema',
                ]);

        Permission::create([
              'name'        => 'Ver detalle de atractivos',
              'slug'        => 'atractivos.show',
              'description' => 'Ver en detalle cada atractivo del sistema',
              ]);

        Permission::create([
              'name'        => 'Creacion de atractivos',
              'slug'        => 'atractivos.create',
              'description' => 'Crear atractivo en el sistema',
              ]);

        Permission::create([
              'name'        => 'Edicion de atractivos',
              'slug'        => 'atractivos.edit',
              'description' => 'Editar cualquier dato de un atractivo del sistema',
              ]);

        Permission::create([
              'name'        => 'Eliminar atractivos',
              'slug'        => 'atractivos.destroy',
              'description' => 'Eliminar cualquier atractivo del sistema',
              ]);

        Permission::create([
              'name'        => 'Imprimir lista atractivos',
              'slug'        => 'atractivos.invoice',
              'description' => 'Muestra lista de atractivos en el sistema',
              ]);


        //Contacto

        Permission::create([
              'name'        => 'Navegar contactos',
              'slug'        => 'contactos.index',
              'description' => 'Lista y navega todos los contactos del sistema',
              ]);

        Permission::create([
              'name'        => 'Ver detalle de contactos',
              'slug'        => 'contactos.show',
              'description' => 'Ver en detalle cada contacto del sistema',
              ]);

        Permission::create([
              'name'        => 'Creacion de contacto',
              'slug'        => 'contactos.create',
              'description' => 'Crear contacto en el sistema',
              ]);

        Permission::create([
              'name'        => 'Edicion de contactos',
              'slug'        => 'contactos.edit',
              'description' => 'Editar cualquier dato de un contacto del sistema',
              ]);

        Permission::create([
              'name'        => 'Eliminar contactos',
              'slug'        => 'contactos.destroy',
              'description' => 'Eliminar cualquier contacto del sistema',
              ]);

        Permission::create([
              'name'        => 'Imprimir lista contactos',
              'slug'        => 'contactos.invoice',
              'description' => 'Muestra lista de contactos en el sistema',
              ]);

        //Foto

        Permission::create([
              'name'        => 'Navegar fotos',
              'slug'        => 'fotos.index',
              'description' => 'Lista y navega todas las fotos del sistema',
              ]);

        Permission::create([
              'name'        => 'Ver detalle de foto',
              'slug'        => 'fotos.show',
              'description' => 'Ver en detalle cada foto del sistema',
              ]);

        Permission::create([
              'name'        => 'Creacion de fotos',
              'slug'        => 'fotos.create',
              'description' => 'Crear foto en el sistema',
              ]);

        Permission::create([
              'name'        => 'Edicion de fotos',
              'slug'        => 'fotos.edit',
              'description' => 'Editar cualquier dato de una foto del sistema',
              ]);

        Permission::create([
              'name'        => 'Eliminar fotos',
              'slug'        => 'fotos.destroy',
              'description' => 'Eliminar cualquier foto del sistema',
              ]);

        //Itinerario

        Permission::create([
              'name'        => 'Navegar itinerarios',
              'slug'        => 'itinerarios.index',
              'description' => 'Lista y navega todos los itinerarios del sistema',
              ]);

        Permission::create([
              'name'        => 'Ver detalle de itinerarios',
              'slug'        => 'itinerarios.show',
              'description' => 'Ver en detalle cada itinerario del sistema',
              ]);

        Permission::create([
              'name'        => 'Creacion de itinerarios',
              'slug'        => 'itinerarios.create',
              'description' => 'Crear itinerario en el sistema',
              ]);

        Permission::create([
              'name'        => 'Edicion de itinerarios',
              'slug'        => 'itinerarios.edit',
              'description' => 'Editar cualquier dato de un itinerario del sistema',
              ]);

        Permission::create([
              'name'        => 'Eliminar itinerarios',
              'slug'        => 'itinerarios.destroy',
              'description' => 'Eliminar cualquier itinerario del sistema',
              ]);

        Permission::create([
              'name'        => 'Imprimir lista itinerarios',
              'slug'        => 'itinerarios.invoice',
              'description' => 'Muestra lista de itinerarios en el sistema',
              ]);

        //Planes

        Permission::create([
              'name'        => 'Navegar planes',
              'slug'        => 'planes.index',
              'description' => 'Lista y navega todos los planes del sistema',
              ]);

        Permission::create([
              'name'        => 'Ver detalle de planes',
              'slug'        => 'planes.show',
              'description' => 'Ver en detalle cada plan del sistema',
              ]);

        Permission::create([
              'name'        => 'Creacion de planes',
              'slug'        => 'planes.create',
              'description' => 'Crear plan en el sistema',
              ]);

        Permission::create([
              'name'        => 'Edicion de planes',
              'slug'        => 'planes.edit',
              'description' => 'Editar cualquier dato de un plan del sistema',
              ]);

        Permission::create([
              'name'        => 'Eliminar planes',
              'slug'        => 'planes.destroy',
              'description' => 'Eliminar cualquier plan del sistema',
              ]);

        Permission::create([
              'name'        => 'Imprimir lista planes',
              'slug'        => 'planes.invoice',
              'description' => 'Muestra lista de planes en el sistema',
              ]);

        //Prestadores

        Permission::create([
              'name'        => 'Navegar prestadores',
              'slug'        => 'prestadores.index',
              'description' => 'Lista y navega todos los prestadores del sistema',
              ]);

        Permission::create([
              'name'        => 'Ver detalle de prestadores',
              'slug'        => 'prestadores.show',
              'description' => 'Ver en detalle cada prestador del sistema',
              ]);

        Permission::create([
              'name'        => 'Creacion de prestadores',
              'slug'        => 'prestadores.create',
              'description' => 'Crear prestador en el sistema',
              ]);

        Permission::create([
              'name'        => 'Edicion de prestadores',
              'slug'        => 'prestadores.edit',
              'description' => 'Editar cualquier dato de un prestador del sistema',
              ]);

        Permission::create([
              'name'        => 'Eliminar prestadores',
              'slug'        => 'prestadores.destroy',
              'description' => 'Eliminar cualquier prestador del sistema',
              ]);

        Permission::create([
              'name'        => 'Imprimir lista prestadores',
              'slug'        => 'prestadores.invoice',
              'description' => 'Muestra lista de prestadores en el sistema',
              ]);

        //Turistas

        Permission::create([
              'name'        => 'Navegar turistas',
              'slug'        => 'turistas.index',
              'description' => 'Lista y navega todos los turistas del sistema',
              ]);

        Permission::create([
              'name'        => 'Ver detalle de turistas',
              'slug'        => 'turistas.show',
              'description' => 'Ver en detalle cada turista del sistema',
              ]);

        Permission::create([
              'name'        => 'Creacion de turistas',
              'slug'        => 'turistas.create',
              'description' => 'Crear turista en el sistema',
              ]);

        Permission::create([
              'name'        => 'Edicion de turistas',
              'slug'        => 'turistas.edit',
              'description' => 'Editar cualquier dato de un turista del sistema',
              ]);

        Permission::create([
              'name'        => 'Eliminar turistas',
              'slug'        => 'turistas.destroy',
              'description' => 'Eliminar cualquier turista del sistema',
              ]);

        Permission::create([
              'name'        => 'Imprimir lista turistas',
              'slug'        => 'turistas.invoice',
              'description' => 'Muestra lista de turistas en el sistema',
              ]);

        //Zonas

        Permission::create([
              'name'        => 'Navegar zonas',
              'slug'        => 'zonas.index',
              'description' => 'Lista y navega todas las zonas del sistema',
              ]);

        Permission::create([
              'name'        => 'Ver detalle de zonas',
              'slug'        => 'zonas.show',
              'description' => 'Ver en detalle cada zona del sistema',
              ]);

        Permission::create([
              'name'        => 'Creacion de zonas',
              'slug'        => 'zonas.create',
              'description' => 'Crear zona en el sistema',
              ]);

        Permission::create([
              'name'        => 'Edicion de zonas',
              'slug'        => 'zonas.edit',
              'description' => 'Editar cualquier dato de una zonas del sistema',
              ]);

        Permission::create([
              'name'        => 'Eliminar zonas',
              'slug'        => 'zonas.destroy',
              'description' => 'Eliminar cualquier zona del sistema',
              ]);

        Permission::create([
              'name'        => 'Imprimir lista zonas',
              'slug'        => 'zonas.invoice',
              'description' => 'Muestra lista de zonas en el sistema',
              ]);

        //Prestador Perfil

        Permission::create([
              'name'        => 'Navegar Perfil Prestador',
              'slug'        => 'prestador.index',
              'description' => 'Lista y navega por el perfil del prestador',
              ]);

        Permission::create([
              'name'        => 'Ver detalle de imagen en Prestador',
              'slug'        => 'imagen.show',
              'description' => 'Ver en detalle las fotos del prestador',
              ]);

        Permission::create([
              'name'        => 'Creacion de foto en Prestador',
              'slug'        => 'imagen.create',
              'description' => 'Agregar foto al perfil del prestador',
              ]);

        Permission::create([
              'name'        => 'Edicion de foto en Prestador',
              'slug'        => 'imagen.edit',
              'description' => 'Editar cualquier foto en el perfil del prestador',
              ]);

        Permission::create([
              'name'        => 'Eliminar foto en Prestador',
              'slug'        => 'imagen.destroy',
              'description' => 'Eliminar cualquier zona del sistema del prestador',
              ]);

        Permission::create([
              'name'        => 'Ver detalle de itinerario en Prestador',
              'slug'        => 'itine.show',
              'description' => 'Ver en detalle los itinerarios del prestador',
              ]);

        Permission::create([
              'name'        => 'Creacion de itinerario en Prestador',
              'slug'        => 'itine.create',
              'description' => 'Agregar itinerario al perfil del prestador',
              ]);

        Permission::create([
              'name'        => 'Edicion de itinerario en Prestador',
              'slug'        => 'itine.edit',
              'description' => 'Editar cualquier itinerario en el perfil del prestador',
              ]);

        Permission::create([
              'name'        => 'Eliminar itinerario en Prestador',
              'slug'        => 'itine.destroy',
              'description' => 'Eliminar cualquier itinerario del sistema del prestador',
              ]);

        Permission::create([
              'name'        => 'Edicion de perfil en Prestador',
              'slug'        => 'perfil.edit',
              'description' => 'Editar perfil del prestador',
              ]);

    }
}
