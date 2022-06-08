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
        if ( 1 == 1) {
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
        }

        DB::table('empresas')->truncate();
        DB::table(('empresas'))->insert([
            'emp_nombre' => 'Grupo Jac - Swell',
            'emp_app' => 'eComerce',
            'emp_direccion' => 'Republica Argentina 4952, (1615) Area Promocion El Triangulo, Buenos Aires Argentina',
            'emp_telefono' => '03327-443150',
            'emp_whatsapp' => '1168880132',
            'emp_logo' => '/storage/images/logoEmpresa.png',
            'emp_perfil_base' => 1,
            'emp_email' => 'eshop@swell.com.ar',
            'emp_admin' => 'admin@swell.com.ar',
            'emp_ventas' => 'gmolinar@swell.com.ar',
            'emp_compras' => 'compras@swell.com.ar',
            'emp_soporte' => 'sistemas@swell.com.ar',
            'emp_mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14250.456156459617!2d-58.698552484406115!3d-34.460900277758235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bca362090bd8ed%3A0x54f6fe537bb684e!2sGRUPO%20JAC%20SA.%20PRODUCTOS%20SWELL!5e0!3m2!1ses-419!2sar!4v1587451387681!5m2!1ses-419!2sar',
            'emp_add' => 1,
        ]);

        DB::table('categorias')->truncate();
        if ( 1 == 1) {
            DB::table('categorias')->insert([
                'cat_es_name' => 'Catalogos',
                'cat_en_name' => 'Catalogs',
                'cat_posicion' => 1
            ]); //1

            DB::table('categorias')->insert([
                'cat_es_name' => 'Productos Swell',
                'cat_en_name' => 'Swell Products',
                'cat_posicion' => 1,
                'cat_padre' => 1
            ]); //2

            DB::table('categorias')->insert([
                'cat_es_name' => 'Productos de Terceros',
                'cat_en_name' => 'Third Party Products',
                'cat_posicion' => 3,
                'cat_padre' => 1
            ]); //3

            DB::table('categorias')->insert([
                'cat_es_name' => 'Limpiadores',
                'cat_en_name' => 'Cleaners',
                'cat_posicion' => 3,
                'cat_padre' => 2
            ]); //4

            DB::table('categorias')->insert([
                'cat_es_name' => 'Detergente y Productos Para Vajilla',
                'cat_en_name' => 'Detergent and Dishwashing Products',
                'cat_posicion' => 2,
                'cat_padre' => 2
            ]); //5

            DB::table('categorias')->insert([
                'cat_es_name' => 'Desengrasantes',
                'cat_en_name' => 'Degreasers',
                'cat_posicion' => 1,
                'cat_padre' => 2
            ]); //6

            DB::table('categorias')->insert([
                'cat_es_name' => 'Desinfectantes',
                'cat_en_name' => 'Disinfectants',
                'cat_posicion' => 4,
                'cat_padre' => 2
            ]); //7

            DB::table('categorias')->insert([
                'cat_es_name' => 'Higiene Personal',
                'cat_en_name' => 'Personal hygiene',
                'cat_padre' => 2,
            ]); //8

            DB::table('categorias')->insert([
                'cat_es_name' => 'Cera',
                'cat_en_name' => 'Wax',
                'cat_padre' => 2,
            ]); //9

            DB::table('categorias')->insert([
                'cat_es_name' => 'Productos Para Ropa',
                'cat_en_name' => 'Clothing Products',
                'cat_padre' => 2,
            ]); //10

            DB::table('categorias')->insert([
                'cat_es_name' => 'Productos Para Automotor',
                'cat_en_name' => 'Automotive Products',
                'cat_padre' => 2,
            ]); //11

            DB::table('categorias')->insert([
                'cat_es_name' => 'Productos Especiales',
                'cat_en_name' => 'Special products',
                'cat_padre' => 2,
            ]); //12

            DB::table('categorias')->insert([
                'cat_es_name' => 'Alcoholes',
                'cat_en_name' => 'Alcohols',
                'cat_padre' => 2,
            ]); //13

            DB::table('categorias')->insert([
                'cat_es_name' => 'Limpiador Desinfectante Desengrasante Neutro',
                'cat_en_name' => 'Neutral Degreasing Disinfectant Cleaner',
                'cat_padre' => 4,
            ]); //14

            DB::table('categorias')->insert([
                'cat_es_name' => 'Limpiavidrios',
                'cat_en_name' => 'Window cleaner',
                'cat_padre' => 4,
            ]); //15

            DB::table('categorias')->insert([
                'cat_es_name' => 'Limpiador Desodorante Para Piso',
                'cat_en_name' => 'Deodorizing Floor Cleaner',
                'cat_padre' => 63,
            ]); //16

            DB::table('categorias')->insert([
                'cat_es_name' => 'Desodorante Para Piso Concentrado',
                'cat_en_name' => 'Concentrated Floor Deodorizer',
                'cat_padre' => 63,
            ]); //17

            DB::table('categorias')->insert([
                'cat_es_name' => 'Gel Sanitizante',
                'cat_en_name' => 'Sanitizing Gel',
                'cat_padre' => 4,
            ]); //18

            DB::table('categorias')->insert([
                'cat_es_name' => 'Limpiador de Metales',
                'cat_en_name' => 'Metal Cleaner',
                'cat_padre' => 4,
            ]); //19

            DB::table('categorias')->insert([
                'cat_es_name' => 'Limpia Alfombras y Tapizados',
                'cat_en_name' => 'Clean Carpets and Upholstery',
                'cat_padre' => 4,
            ]); //20

            DB::table('categorias')->insert([
                'cat_es_name' => 'Lustramuebles',
                'cat_en_name' => 'Furniture Polish',
                'cat_padre' => 4,
            ]); //21

            DB::table('categorias')->insert([
                'cat_es_name' => 'Desincrustante Acido',
                'cat_en_name' => 'Acid Descaler',
                'cat_padre' => 4,
            ]); //22

            DB::table('categorias')->insert([
                'cat_es_name' => 'Quitasarro',
                'cat_en_name' => 'Toilet Bowl Cleaner',
                'cat_padre' => 4,
            ]); //23

            DB::table('categorias')->insert([
                'cat_es_name' => 'Lavavajilla Limón',
                'cat_en_name' => 'Lemon Dishwasher',
                'cat_padre' => 5,
            ]); //24

            DB::table('categorias')->insert([
                'cat_es_name' => 'Detergente Lavavajilla Biodegradable',
                'cat_en_name' => 'Biodegradable Dishwasher Detergent',
                'cat_padre' => 5,
            ]); //25

            DB::table('categorias')->insert([
                'cat_es_name' => 'Detergente Para Equipo Lavavajilla',
                'cat_en_name' => 'Detergent For Dishwashing Equipment',
                'cat_padre' => 5,
            ]); //26

            DB::table('categorias')->insert([
                'cat_es_name' => 'Detergente Lavavajilla Con Desinfectante',
                'cat_en_name' => 'Dishwasher Detergent With Sanitizer',
                'cat_padre' => 5,
            ]); //27

            DB::table('categorias')->insert([
                'cat_es_name' => 'Detergente Concentrado',
                'cat_en_name' => 'Concentrated Detergent',
                'cat_padre' => 5,
            ]); //28

            DB::table('categorias')->insert([
                'cat_es_name' => 'Abrillantador De Vajilla',
                'cat_en_name' => 'Dishwasher Polish',
                'cat_padre' => 5,
            ]); //29

            DB::table('categorias')->insert([
                'cat_es_name' => 'Fajinador De Vajillas',
                'cat_en_name' => 'Tableware Fajinador',
                'cat_padre' => 5,
            ]); //30

            DB::table('categorias')->insert([
                'cat_es_name' => 'Antigrasa Multiuso',
                'cat_en_name' => 'Multipurpose Greaseprof',
                'cat_padre' => 6,
            ]); //31

            DB::table('categorias')->insert([
                'cat_es_name' => 'Desengrasante Multiuso',
                'cat_en_name' => 'Multipurpose Degreaser',
                'cat_padre' => 6,
            ]); //32

            DB::table('categorias')->insert([
                'cat_es_name' => 'Desengrasante Ultra',
                'cat_en_name' => 'Ultra Degreaser',
                'cat_padre' => 6,
            ]); //33

            DB::table('categorias')->insert([
                'cat_es_name' => 'Espuma Alcalina Desengrasante',
                'cat_en_name' => 'Alkaline Degreasing Foam',
                'cat_padre' => 6,
            ]); //34

            DB::table('categorias')->insert([
                'cat_es_name' => 'Destapa Cañeria',
                'cat_en_name' => 'Unclog Pipes',
                'cat_padre' => 6,
            ]); //35

            DB::table('categorias')->insert([
                'cat_es_name' => 'Agua Lavandina 25 Gr/Lt',
                'cat_en_name' => 'Lavandina water 25 Gr/Lt',
                'cat_padre' => 7,
            ]); //36

            DB::table('categorias')->insert([
                'cat_es_name' => 'Lavandina Concentrada 50 Gr/Lt',
                'cat_en_name' => 'Concentrated Lavandina 50 Gr/Lt',
                'cat_padre' => 7,
            ]); //37

            DB::table('categorias')->insert([
                'cat_es_name' => 'Cloro 80 Gr/Lt',
                'cat_en_name' => 'Clorine 80 Gr/Lt',
                'cat_padre' => 7,
            ]); //38

            DB::table('categorias')->insert([
                'cat_es_name' => 'Hipoclorito de Sodio',
                'cat_en_name' => 'Sodium Hypochlorite',
                'cat_padre' => 7,
            ]); //39

            
            DB::table('categorias')->insert([
                'cat_es_name' => 'Gel Clorado',
                'cat_en_name' => 'Chlorinated Gel',
                'cat_padre' => 7,
            ]); //40

            DB::table('categorias')->insert([
                'cat_es_name' => 'Berzalquat',
                'cat_en_name' => 'Berzalquat',
                'cat_padre' => 7,
            ]); //41

            DB::table('categorias')->insert([
                'cat_es_name' => 'Berzalquat Plus 5ta Generación',
                'cat_en_name' => 'Berzalquat Plus 5th Generation',
                'cat_padre' => 7,
            ]); //42

            DB::table('categorias')->insert([
                'cat_es_name' => 'Jabón Para Manos Tocador',
                'cat_en_name' => 'Toilet Hand Soap',
                'cat_padre' => 8,
            ]); //43

            DB::table('categorias')->insert([
                'cat_es_name' => 'Jabón Para Manos Antibacterial',
                'cat_en_name' => 'Antibacterial Hand Soap',
                'cat_padre' => 8,
            ]); //44

            DB::table('categorias')->insert([
                'cat_es_name' => 'Jabón Para Manos Con Desinfectante',
                'cat_en_name' => 'Hand Soap With Sanitizer',
                'cat_padre' => 8,
            ]); //45

            DB::table('categorias')->insert([
                'cat_es_name' => 'Removedor de Ceras',
                'cat_en_name' => 'Wax Remover',
                'cat_padre' => 9,
            ]); //46

            DB::table('categorias')->insert([
                'cat_es_name' => 'Cera Auto Brillo Natural',
                'cat_en_name' => 'Natural Self-gloss Wax',
                'cat_padre' => 9,
            ]); //47

            DB::table('categorias')->insert([
                'cat_es_name' => 'Cera Liquida Para Madera al Solvente Natural',
                'cat_en_name' => 'Natural Solvent Liquid Wax for Wood',
                'cat_padre' => 9,
            ]); //48

            DB::table('categorias')->insert([
                'cat_es_name' => 'Jabón Liquido Para Ropa',
                'cat_en_name' => 'Liquid Soap For Clothes',
                'cat_padre' => 10,
            ]); //49

            DB::table('categorias')->insert([
                'cat_es_name' => 'Suavizante Para Ropa',
                'cat_en_name' => 'Fabric Softener',
                'cat_padre' => 10,
            ]); //50

            DB::table('categorias')->insert([
                'cat_es_name' => 'Perfumina',
                'cat_en_name' => 'Perfume',
                'cat_padre' => 10,
            ]); //51

            DB::table('categorias')->insert([
                'cat_es_name' => 'Shampoo Para Auto',
                'cat_en_name' => 'Car Shampoo',
                'cat_padre' => 11,
            ]); //52

            DB::table('categorias')->insert([
                'cat_es_name' => 'Cera Para Auto',
                'cat_en_name' => 'Car Wax',
                'cat_padre' => 11,
            ]); //53

            DB::table('categorias')->insert([
                'cat_es_name' => 'Silicona Para Tablero',
                'cat_en_name' => 'Silicone For Board',
                'cat_padre' => 11,
            ]); //54

            DB::table('categorias')->insert([
                'cat_es_name' => 'Silicona Para Neumatico',
                'cat_en_name' => 'Silicone For Tire',
                'cat_padre' => 11,
            ]); //55

            DB::table('categorias')->insert([
                'cat_es_name' => 'Limpiacarroceria en Seco',
                'cat_en_name' => 'Dry body cleaner',
                'cat_padre' => 12,
            ]); //56

            DB::table('categorias')->insert([
                'cat_es_name' => 'Quitagrafitis',
                'cat_en_name' => 'Graffiti Remover',
                'cat_padre' => 12,
            ]); //57

            DB::table('categorias')->insert([
                'cat_es_name' => 'Alcohol En Gel',
                'cat_en_name' => 'Gel Alcohol',
                'cat_padre' => 13,
            ]); //58

            DB::table('categorias')->insert([
                'cat_es_name' => 'Splash Col',
                'cat_en_name' => 'Splash Col',
                'cat_padre' => 13,
            ]); //59

            DB::table('categorias')->insert([
                'cat_es_name' => 'Aerosoles',
                'cat_en_name' => 'Aerosol Sprays',
                'cat_padre' => 3,
            ]); //60

            DB::table('categorias')->insert([
                'cat_es_name' => 'Bolsas',
                'cat_en_name' => 'Bags',
                'cat_padre' => 3,
            ]); //61

            DB::table('categorias')->insert([
                'cat_es_name' => 'Papeles',
                'cat_en_name' => 'Papers',
                'cat_padre' => 3,
            ]); //62

            DB::table('categorias')->insert([
                'cat_es_name' => 'Desodorante de Piso',
                'cat_en_name' => 'Floor Deodorant',
                'cat_padre' => 4,
            ]); //63

            DB::table('categorias')->insert([
                'cat_es_name' => 'Acondicionador de Piso',
                'cat_en_name' => 'Floor Conditioner',
                'cat_padre' => 9,
            ]); //64

        }
        // Atributos productos
        DB::table('atributos')->truncate();
        if ( 1 == 1) {
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

            DB::table('atributos')->insert([
                'atr_es_name' => 'Unidades',
                'atr_en_name' => 'Units',
                'atr_add' => 1,
            ]); //17

            DB::table('atributos')->insert([
                'atr_es_name' => 'Pack x 2',
                'atr_en_name' => 'Pack x 2',
                'atr_add' => 1,
            ]); //18

            DB::table('atributos')->insert([
                'atr_es_name' => 'Pack x 4',
                'atr_en_name' => 'Pack x 4',
                'atr_add' => 1,
            ]); //19

            DB::table('atributos')->insert([
                'atr_es_name' => 'Pack x 8',
                'atr_en_name' => 'Pack x 8',
                'atr_add' => 1,
            ]); //20
        }

        DB::table('provincias')->truncate();
        if ( 1 == 1) {
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
}