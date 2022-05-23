<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use App\Models\User;

class Init extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::table('clientes')->truncate();
        DB::table('clientes')->insert([
            'cli_razon' => 'Administrador',
            'cli_cuit' => '20959431583',
            'cli_direccion' => 'MORENO 1400, VILLA ROSA',
            'cli_whatsapp' => '1122507727',
            'cli_saldo' => 0,
            'cli_tipo' => 1,
            'cli_estado' => 1,
            'cli_user' => 1, 
        ]);

        DB::table('clientes')->insert([
            'cli_razon' => 'Nicolas Malbran',
            'cli_cuit' => '11111111111',
            'cli_direccion' => 'REPUBLICA ARGENTINA 4952, GRAND BOURG',
            'cli_whatsapp' => '1149698450',
            'cli_saldo' => 0,
            'cli_tipo' => 3,
            'cli_estado' => 1,
            'cli_user' => 2, 
        ]);

        DB::table('clientes')->insert([
            'cli_razon' => 'Nicolas Malbran',
            'cli_cuit' => '22222222222',
            'cli_direccion' => 'REPUBLICA ARGENTINA 4952, GRAND BOURG',
            'cli_whatsapp' => '114968348',
            'cli_saldo' => 0,
            'cli_tipo' => 1,
            'cli_estado' => 1,
            'cli_user' => 3, 
        ]);

        DB::table('empresas')->truncate();
        DB::table(('empresas'))->insert([
            'emp_nombre' => 'Grupo Jac - Swell',
            'emp_app' => 'eComerce',
            'emp_direccion' => 'Republica Argentina 4952, (1615) Area Promocion El Triangulo, Buenos Aires Argentina',
            'emp_telefono' => '03327-443150',
            'emp_whatsapp' => '1168846777',
            'emp_logo' => '/storage/images/logoEmpresa.png',
            'emp_perfil_base' => 1,
            'emp_email' => 'eshop@swell.com.ar',
            'emp_admin' => 'admin@swell.com.ar',
            'emp_ventas' => 'sistemas@swell.com.ar',
            'emp_mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14250.456156459617!2d-58.698552484406115!3d-34.460900277758235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bca362090bd8ed%3A0x54f6fe537bb684e!2sGRUPO%20JAC%20SA.%20PRODUCTOS%20SWELL!5e0!3m2!1ses-419!2sar!4v1587451387681!5m2!1ses-419!2sar',
            'emp_add' => 1,
        ]);

        DB::table('categorias')->truncate();
        DB::table('categorias')->insert([
            'cat_es_name' => 'Hogar',
            'cat_en_name' => 'Home',
            'cat_posicion' => 3,
        ]); //1

        DB::table('categorias')->insert([
            'cat_es_name' => 'Higiene',
            'cat_en_name' => 'Hygiene',
            'cat_posicion' => 2,
        ]); //2

        DB::table('categorias')->insert([
            'cat_es_name' => 'Industria',
            'cat_en_name' => 'Industry',
            'cat_posicion' => 1,
        ]); //3

        DB::table('categorias')->insert([
            'cat_es_name' => 'Autos',
            'cat_en_name' => 'Car',
            'cat_posicion' => 4,
        ]); //4

        DB::table('categorias')->insert([
            'cat_es_name' => 'Otros',
            'cat_en_name' => 'Others',
            'cat_posicion' => 5,
        ]); //5

        DB::table('categorias')->insert([
            'cat_es_name' => 'Baño',
            'cat_en_name' => 'Bathroom',
            'cat_padre' => 1,
        ]); //6

        DB::table('categorias')->insert([
            'cat_es_name' => 'Cocina',
            'cat_en_name' => 'Kitchen',
            'cat_padre' => 1,
        ]); //7

        DB::table('categorias')->insert([
            'cat_es_name' => 'Piso',
            'cat_en_name' => 'Floors',
            'cat_padre' => 1,
        ]); //8

        DB::table('categorias')->insert([
            'cat_es_name' => 'Ropa',
            'cat_en_name' => 'Clothes',
            'cat_padre' => 1,
        ]); //9

        DB::table('categorias')->insert([
            'cat_es_name' => 'Muebles',
            'cat_en_name' => 'Furniture',
            'cat_padre' => 1,
        ]); //10

        DB::table('categorias')->insert([
            'cat_es_name' => 'Vidrios',
            'cat_en_name' => 'Glasses',
            'cat_padre' => 1,
        ]); //11

        DB::table('categorias')->insert([
            'cat_es_name' => 'Clorados',
            'cat_en_name' => 'Chlorinated',
            'cat_padre' => 2,
        ]); //12

        DB::table('categorias')->insert([
            'cat_es_name' => 'Sanitizantes',
            'cat_en_name' => 'Sanitizers',
            'cat_padre' => 2,
        ]); //13

        DB::table('categorias')->insert([
            'cat_es_name' => 'Gel Clorado',
            'cat_en_name' => 'Chlorinated Gel',
            'cat_padre' => 6,
        ]); //14

        DB::table('categorias')->insert([
            'cat_es_name' => 'Jabón Tocador',
            'cat_en_name' => 'Toilet Soap',
            'cat_padre' => 6,
        ]); //15

        DB::table('categorias')->insert([
            'cat_es_name' => 'Quita Sarro',
            'cat_en_name' => 'Toilet Bowl Cleaner',
            'cat_padre' => 6,
        ]); //16

        DB::table('categorias')->insert([
            'cat_es_name' => 'Desengrasantes',
            'cat_en_name' => 'Degreasers',
            'cat_padre' => 7,
        ]); //17

        DB::table('categorias')->insert([
            'cat_es_name' => 'Limpiadores de Vajilla',
            'cat_en_name' => 'Dish Cleaners',
            'cat_padre' => 7,
        ]); //18

        DB::table('categorias')->insert([
            'cat_es_name' => 'Acondicionadores',
            'cat_en_name' => 'Conditioners',
            'cat_padre' => 8,
        ]); //19

        DB::table('categorias')->insert([
            'cat_es_name' => 'Ceras',
            'cat_en_name' => 'Waxes',
            'cat_padre' => 8,
        ]); //20

        DB::table('categorias')->insert([
            'cat_es_name' => 'Desodornantes',
            'cat_en_name' => 'Deodorants',
            'cat_padre' => 8,
        ]); //21

        DB::table('categorias')->insert([
            'cat_es_name' => 'Jabón Liquido',
            'cat_en_name' => 'Liquid Soap',
            'cat_padre' => 9,
        ]); //22

        DB::table('categorias')->insert([
            'cat_es_name' => 'Perfuminas',
            'cat_en_name' => 'Perfumes',
            'cat_padre' => 9,
        ]); //23

        DB::table('categorias')->insert([
            'cat_es_name' => 'Suavizantes',
            'cat_en_name' => 'Softeners',
            'cat_padre' => 9,
        ]); //24

        DB::table('categorias')->insert([
            'cat_es_name' => 'Antigrasas',
            'cat_en_name' => 'Anti Greases',
            'cat_padre' => 17,
        ]); //25

        DB::table('categorias')->insert([
            'cat_es_name' => 'Destapa Cañerias',
            'cat_en_name' => 'Uncover Pipes',
            'cat_padre' => 17,
        ]); //26

        DB::table('categorias')->insert([
            'cat_es_name' => 'Fajinador de Vajilla',
            'cat_en_name' => 'Crockery Fastener',
            'cat_padre' => 17,
        ]); //27

        DB::table('categorias')->insert([
            'cat_es_name' => 'Abrillantador',
            'cat_en_name' => 'Dishwasher Brightener',
            'cat_padre' => 18,
        ]); //28

        DB::table('categorias')->insert([
            'cat_es_name' => 'Detergentes',
            'cat_en_name' => 'Detergents',
            'cat_padre' => 18,
        ]); //29

        DB::table('categorias')->insert([
            'cat_es_name' => 'Amonios Cuaternarios',
            'cat_en_name' => 'Quaternry Ammonia',
            'cat_padre' => 12,
        ]); //30

        DB::table('categorias')->insert([
            'cat_es_name' => 'Hipoclorito de Sodio',
            'cat_en_name' => 'Sodium Hypochlorite',
            'cat_padre' => 12,
        ]); //31

        DB::table('categorias')->insert([
            'cat_es_name' => 'Cloro',
            'cat_en_name' => 'Clorine',
            'cat_padre' => 12,
        ]); //32

        DB::table('categorias')->insert([
            'cat_es_name' => 'Gel Clorado',
            'cat_en_name' => 'Chlorinated Gel',
            'cat_padre' => 12,
        ]); //33

        DB::table('categorias')->insert([
            'cat_es_name' => 'Lavandina',
            'cat_en_name' => 'Bleach',
            'cat_padre' => 12,
        ]); //34

        DB::table('categorias')->insert([
            'cat_es_name' => 'Alcoholes',
            'cat_en_name' => 'Alcohols',
            'cat_padre' => 13,
        ]); //35

        DB::table('categorias')->insert([
            'cat_es_name' => 'Jabones',
            'cat_en_name' => 'Soaps',
            'cat_padre' => 13,
        ]); //36

        DB::table('categorias')->insert([
            'cat_es_name' => 'Limpiadores',
            'cat_en_name' => 'Cleaners',
            'cat_padre' => 3,
        ]); //36

        // Atributos productos
        DB::table('atributos')->truncate();
        DB::table('atributos')->insert([
            'atr_es_name' => '100 ML',
            'atr_en_name' => '100 ML',
            'atr_add' => 1,
        ]); //1

        DB::table('atributos')->insert([
            'atr_es_name' => '250 ML',
            'atr_en_name' => '250 ML',
            'atr_add' => 1,
        ]); //2

        DB::table('atributos')->insert([
            'atr_es_name' => '300 ML',
            'atr_en_name' => '300 ML',
            'atr_add' => 1,
        ]); //3

        DB::table('atributos')->insert([
            'atr_es_name' => '500 ML',
            'atr_en_name' => '500 ML',
            'atr_add' => 1,
        ]); //4

        DB::table('atributos')->insert([
            'atr_es_name' => '1 Litro',
            'atr_en_name' => '1 Liter',
            'atr_add' => 1,
        ]); //5

        DB::table('atributos')->insert([
            'atr_es_name' => '5 Litros',
            'atr_en_name' => '5 Liters',
            'atr_add' => 1,
        ]); //6

        DB::table('atributos')->insert([
            'atr_es_name' => '10 Litros',
            'atr_en_name' => '10 Liters',
            'atr_add' => 1,
        ]); //7

        DB::table('atributos')->insert([
            'atr_es_name' => 'Granel',
            'atr_en_name' => 'Bulk',
            'atr_add' => 1,
        ]); //8

        DB::table('atributos')->insert([
            'atr_es_name' => '500 ML C/Gatillo',
            'atr_en_name' => '500 ML C/Tigger',
            'atr_add' => 1,
        ]); //9

        DB::table('atributos')->insert([
            'atr_es_name' => '1 Litro C/Gatillo',
            'atr_en_name' => '1 Liter C/Tigger',
            'atr_add' => 1,
        ]); //10

        DB::table('atributos')->insert([
            'atr_es_name' => '250 ML Spray',
            'atr_en_name' => '250 ML Spray',
            'atr_add' => 1,
        ]); //11

        DB::table('atributos')->insert([
            'atr_es_name' => '500 ML Spray',
            'atr_en_name' => '500 ML Spray',
            'atr_add' => 1,
        ]); //12

        DB::table('atributos')->insert([
            'atr_es_name' => '2 Litros',
            'atr_en_name' => '2 Liters',
            'atr_add' => 1,
        ]); //13

        DB::table('atributos')->insert([
            'atr_es_name' => '250 ML C/Gatillo',
            'atr_en_name' => '250 ML C/Tigger',
            'atr_add' => 1,
        ]); //14

        DB::table('atributos')->insert([
            'atr_es_name' => '250 ML Gota a Gota',
            'atr_en_name' => '250 ML Drop by Drop',
            'atr_add' => 1,
        ]); //15

        DB::table('atributos')->insert([
            'atr_es_name' => '500 ML Gota a Gota',
            'atr_en_name' => '500 ML Drop by Drop',
            'atr_add' => 1,
        ]); //16

        DB::table('provincias')->truncate();
        DB::table('provincias')->insert([
            'pro_nombre' => 'BUENOS AIRES',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'CATAMARCA',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'CORDOBA',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'CAPITAL FEDERAL',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'CHACO',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'CHUBUT',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'CORRIENTES',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'ENTRE RIOS',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'FORMOSA',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'JUJUY',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'LA PAMPA',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'LA RIOJA',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'MENDOZA',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'MISIONES',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'NEUQUEN',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'RIO NEGRO',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'SALTA',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'SANTA CRUZ',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'SANTIAGO DEL ESTERO',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'SANTA FE',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'SAN JUAN',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'SAN LUIS',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'TIERRA DEL FUEGO',
            'pro_pais' => '1',           
        ]);

        DB::table('provincias')->insert([
            'pro_nombre' => 'TUCUMAN',
            'pro_pais' => '1',           
        ]);

        DB::table('localidads')->truncate();
        

        DB::table('taxes')->truncate();
        DB::table('taxes')->insert([
            'tax_nombre' => 'IVA (21%)',
            'tax_tipo' => 1,
            'tax_porcentaje' => 21,
        ]);

    }
}