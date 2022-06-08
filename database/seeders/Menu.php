<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use App\Models\User;
use Illuminate\Support\Str;

class Menu extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::table('users')->truncate();
        if ( 1 == 1) {
            DB::table('users')->insert([
                'name' => 'Administrador',
                'email' => 'sistemas@swell.com.ar',
                'password' => Hash::make('Jose1974'),
                'api_token' => uniqid(),
                'email_verified_at' => now(),
            ]);
            
            DB::table('users')->insert([
                'name' => 'Nicolas Malbran',
                'email' => 'nmalbran@swell.com.ar',
                'password' => Hash::make('12345678'),
                'api_token' => Str::random(50),
                'email_verified_at' => now(),
            ]);

            DB::table('users')->insert([
                'name' => 'Nicolas Malbran',
                'email' => 'nicolas.malbran@swell.com.ar',
                'password' => Hash::make('12345678'),
                'api_token' => Str::random(50),
                'email_verified_at' => now(),
            ]);
        }
        
        DB::table('perfiles')->truncate();
        if ( 1 == 1) {
            DB::table('perfiles')->insert([
                'per_nombre' => 'Admin',
                'per_descripcion' => 'Administrador del Sistema',
                'per_add' => 1,
            ]);

            DB::table('perfiles')->insert([
                'per_nombre' => 'Distribuidor',
                'per_descripcion' => 'Cliente Distribuidor',
                'per_add' => 1,
            ]);
            
            DB::table('perfiles')->insert([
                'per_nombre' => 'Especial',
                'per_descripcion' => 'Cliente Especial',
                'per_add' => 1,
            ]);

            DB::table('perfiles')->insert([
                'per_nombre' => 'Empresa',
                'per_descripcion' => 'Cliente Empresa',
                'per_add' => 1,
            ]);

            DB::table('perfiles')->insert([
                'per_nombre' => 'Cliente',
                'per_descripcion' => 'Cliente Consumidor Final',
                'per_add' => 1,
            ]);

            DB::table('perfiles')->insert([
                'per_nombre' => 'Vendedor',
                'per_descripcion' => 'Vendedor',
                'per_add' => 1,
            ]);
        }
        // Menues
        DB::table('menues')->truncate();
        if ( 1 == 1) {
            DB::table('menues')->insert([
                'men_nombre' => 'Mi Perfil',
                'men_descripcion' => 'Admininstración de mi Perfil',
                'men_icono' => 'mdi-account-key',
                'men_level' => '5',
                'men_link' => 'perfil',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //1

            DB::table('menues')->insert([
                'men_nombre' => 'Perfiles',
                'men_descripcion' => 'Administracion de Perfiles',
                'men_icono' => 'account_box',
                'men_level' => '5',
                'men_link' => 'admin/perfiles',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //2

            DB::table('menues')->insert([
                'men_nombre' => 'Roles',
                'men_descripcion' => 'Asignacion de Roles a Perfiles',
                'men_icono' => 'supervisor_account',
                'men_level' => '5',
                'men_link' => 'admin/roles',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //3

            DB::table('menues')->insert([
                'men_nombre' => 'Menues - Items',
                'men_descripcion' => 'Administración de Menues',
                'men_icono' => 'list',
                'men_level' => '5',
                'men_link' => 'admin/menues',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //4

            DB::table('menues')->insert([
                'men_nombre' => 'Usuarios y Perfiles',
                'men_descripcion' => 'Administración de Usuarios y Perfiles',
                'men_icono' => 'linear_scale',
                'men_level' => '0',
                'men_link' => 'divider',
                'men_es_menu' => 0,
                'men_add' => 1,
            ]); //5

            DB::table('menues')->insert([
                'men_nombre' => 'Mis Documentos',
                'men_descripcion' => 'Administración de Documentos',
                'men_icono' => 'mdi-file-multiple',
                'men_level' => '5',
                'men_link' => 'cliente/documentos',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //6

            DB::table('menues')->insert([
                'men_nombre' => 'Menues Filtrado',
                'men_descripcion' => 'Filtrado para Menu',
                'men_icono' => '',
                'men_level' => '5',
                'men_link' => 'admin/menues-filtrado',
                'men_es_menu' => 2,
                'men_add' => 1,
            ]); //7

            DB::table('menues')->insert([
                'men_nombre' => 'Menues Full',
                'men_descripcion' => 'Listado Full de Menues',
                'men_icono' => '',
                'men_link' => 'admin/menues-full',
                'men_es_menu' => 2,
                'men_add' => 1,
            ]); //8

            DB::table('menues')->insert([
                'men_nombre' => 'Empresa',
                'men_descripcion' => 'Datos de la Empresa',
                'men_icono' => 'apartment',
                'men_level' => '5',
                'men_link' => 'admin/empresa',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //9

            DB::table('menues')->insert([
                'men_nombre' => 'Perfil de Usuario',
                'men_descripcion' => 'Perfil de Usuario',
                'men_icono' => '',
                'men_link' => 'admin/perfil',
                'men_es_menu' => 2,
                'men_add' => 1,
            ]); //10

            DB::table('menues')->insert([
                'men_nombre' => 'Tienda',
                'men_descripcion' => 'Parametros de la Tienda',
                'men_icono' => '',
                'men_link' => '',
                'men_es_menu' => 0,
                'men_add' => 1,
            ]); //11

            DB::table('menues')->insert([
                'men_nombre' => 'Productos',
                'men_descripcion' => 'ABM de Productos',
                'men_icono' => 'shopping_cart',
                'men_level' => '11',
                'men_link' => 'admin/listado_productos',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //12

            DB::table('menues')->insert([
                'men_nombre' => 'Categorias',
                'men_descripcion' => 'ABM de Categorias',
                'men_icono' => 'category',
                'men_level' => '11',
                'men_link' => 'admin/categorias',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //13

            DB::table('menues')->insert([
                'men_nombre' => 'Atributos',
                'men_descripcion' => 'ABM de Atributos',
                'men_icono' => 'edit_attributes',
                'men_level' => '11',
                'men_link' => 'admin/atributos',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //14

            DB::table('menues')->insert([
                'men_nombre' => 'Lista de Precios',
                'men_descripcion' => 'Lista de Precios',
                'men_icono' => 'monetization_on',
                'men_level' => '11',
                'men_link' => 'admin/listasprecios',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //15

            DB::table('menues')->insert([
                'men_nombre' => 'Clientes',
                'men_descripcion' => 'ABM de Clientes',
                'men_icono' => 'supervisor_account',
                'men_level' => '11',
                'men_link' => 'admin/clientes',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //16

            DB::table('menues')->insert([
                'men_nombre' => 'Rol Productos',
                'men_descripcion' => 'Rol Productos',
                'men_icono' => '',
                'men_link' => 'admin/productos',
                'men_es_menu' => 2,
                'men_add' => 1,
            ]); //17

            DB::table('menues')->insert([
                'men_nombre' => 'Etiquetas',
                'men_descripcion' => 'Etiquetas',
                'men_icono' => '',
                'men_link' => 'tags',
                'men_es_menu' => 2,
                'men_add' => 1,
            ]); //18

            DB::table('menues')->insert([
                'men_nombre' => 'Formas de Envio',
                'men_descripcion' => 'Menu de Formas de Envío',
                'men_icono' => 'mdi-truck-delivery',
                'men_level' => '11',
                'men_link' => 'admin/envios',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //19

            DB::table('menues')->insert([
                'men_nombre' => 'Formas de Pago',
                'men_descripcion' => 'Menu Formas de Pago',
                'men_icono' => 'mdi-credit-card-multiple',
                'men_level' => '11',
                'men_link' => 'admin/pagos',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //20

            DB::table('menues')->insert([
                'men_nombre' => 'Banners',
                'men_descripcion' => 'Menú de Banners',
                'men_icono' => 'mdi-image-size-select-actual',
                'men_level' => '11',
                'men_link' => 'admin/banners',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //21

            DB::table('menues')->insert([
                'men_nombre' => 'Pedidos',
                'men_descripcion' => 'Administración de Documentos',
                'men_icono' => 'mdi-inbox-multiple',
                'men_level' => '11',
                'men_link' => 'admin/documentos',
                'men_es_menu' => 2,
                'men_add' => 1,
            ]); //22

            DB::table('menues')->insert([
                'men_nombre' => 'Suscripciones',
                'men_descripcion' => 'Administración de Supcripciones',
                'men_icono' => 'mdi-email-multiple',
                'men_level' => '11',
                'men_link' => 'admin/suscripciones',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //23

            DB::table('menues')->insert([
                'men_nombre' => 'Listado de Documentos',
                'men_descripcion' => 'Listado de Pedidos',
                'men_icono' => 'mdi-inbox-multiple',
                'men_level' => '11',
                'men_link' => 'admin/documentos',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //24

            DB::table('menues')->insert([
                'men_nombre' => 'Cliente',
                'men_descripcion' => 'Datos del Cliente',
                'men_icono' => '',
                'men_level' => '0',
                'men_link' => 'cliente',
                'men_es_menu' => 0,
                'men_add' => 1,
            ]); //25

            DB::table('menues')->insert([
                'men_nombre' => 'Mi Perfil',
                'men_descripcion' => 'Admininstracion de mi Perfil',
                'men_icono' => 'mdi-account-key',
                'men_level' => '25',
                'men_link' => 'perfil',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //26

            DB::table('menues')->insert([
                'men_nombre' => 'Mis Datos',
                'men_descripcion' => 'Datos del Cliente - Vista del Cliente',
                'men_icono' => 'mdi-account-details',
                'men_level' => '25',
                'men_link' => 'cliente',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //27

            DB::table('menues')->insert([
                'men_nombre' => 'Pedido',
                'men_descripcion' => 'Pedido del Cliente - Vista del Cliente',
                'men_icono' => 'mdi-inbox-multiple-outline',
                'men_level' => '25',
                'men_link' => 'cliente/pedido',
                'men_es_menu' => 2,
                'men_add' => 1,
            ]); //28

            DB::table('menues')->insert([
                'men_nombre' => 'Mis Documentos.',
                'men_descripcion' => 'Documentos del Cliente - Vista del Cliente',
                'men_icono' => 'mdi-inbox-multiple-outline',
                'men_level' => '25',
                'men_link' => 'cliente/documentos',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //29

            DB::table('menues')->insert([
                'men_nombre' => 'Lista de Precios',
                'men_descripcion' => 'Lista de Precios',
                'men_icono' => 'mdi-playlist-check',
                'men_level' => '25',
                'men_link' => 'cliente/precio',
                'men_es_menu' => 1,
                'men_add' => 1,
            ]); //30
        }

        // Roles

        DB::table('roles')->truncate();
        if ( 1 == 1) {
            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 1,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 2,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 3,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 4,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 5,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 6,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 7,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 8,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 9,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 10,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 11,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 12,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 13,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 14,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 15,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 16,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 17,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 18,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 19,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 20,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 21,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 22,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 23,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 1,
                'rol_menu' => 24,
                'rol_add' => 1,
            ]);

            // Distribuidor
            DB::table('roles')->insert([
                'rol_perfil' => 2,
                'rol_menu' => 25,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 2,
                'rol_menu' => 26,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 2,
                'rol_menu' => 27,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 2,
                'rol_menu' => 28,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 2,
                'rol_menu' => 29,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 2,
                'rol_menu' => 30,
                'rol_add' => 1,
            ]);

            // Cliente Especial
            DB::table('roles')->insert([
                'rol_perfil' => 3,
                'rol_menu' => 25,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 3,
                'rol_menu' => 26,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 3,
                'rol_menu' => 27,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 3,
                'rol_menu' => 28,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 3,
                'rol_menu' => 29,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 3,
                'rol_menu' => 30,
                'rol_add' => 1,
            ]);

            // Cliente Empresa
            DB::table('roles')->insert([
                'rol_perfil' => 4,
                'rol_menu' => 25,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 4,
                'rol_menu' => 26,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 4,
                'rol_menu' => 27,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 4,
                'rol_menu' => 28,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 4,
                'rol_menu' => 29,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 4,
                'rol_menu' => 30,
                'rol_add' => 1,
            ]);

            // Cliente Final
            DB::table('roles')->insert([
                'rol_perfil' => 5,
                'rol_menu' => 25,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 5,
                'rol_menu' => 26,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 5,
                'rol_menu' => 27,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 5,
                'rol_menu' => 28,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 5,
                'rol_menu' => 29,
                'rol_add' => 1,
            ]);

            DB::table('roles')->insert([
                'rol_perfil' => 5,
                'rol_menu' => 30,
                'rol_add' => 1,
            ]);
        }

    }
}