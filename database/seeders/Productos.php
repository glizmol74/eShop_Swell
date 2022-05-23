<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use App\Models\User;

class Productos extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');


        // produstos
        DB::table('productos')->truncate();
        DB::table('productos')->insert(['pro_es_nombre' => 'Antigrasa Multiuso',
            'pro_en_nombre' => 'Multipurpose greaseproof',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Fue desarrollado especialmente para atacar todo tipo de grasa presente en la cocina.</p><p><strong>Aplicación</strong>: Azulejos, mesadas, ventanas, superficies plásticas y metálicas, etc. Puro.</p><p><strong>Disolución</strong>: Aplique sobre la superficie y luego pase un paño limpio y seco.</p><p><strong>Modo de Uso</strong>: En manchas viejas, dejar actuar 1 minuto.</p>',
            'pro_en_descripcion_larga' => '<p>Specially developed to attack all types of fat present in the kitchen.</p><p>Tiles, countertops, windows, plastic and metal surfaces, etc.</p><p>Pure Dilution.</p><p>Apply to the surface and then wipe with a clean, dry cloth.</p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT_ANTIGRASA.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 1,
            'pro_imagen_ppal' => 36
        ]); //1

        DB::table('productos')->insert(['pro_es_nombre' => 'Desengrasante Multiuso',
            'pro_en_nombre' => 'Multipurpose Degreaser',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Desengrasante que elimina cualquier tipo de grasa animal, mineral o vegetal. Disuelve y emulsiona las grasas.</p><p><strong>Aplicación</strong>: Pisos engrasados, cuerina, maquinaria industrial, Azulejos de cocina Cocinas industriales, campanas y filtros de extractores Hornos.</p><p><strong>Disolución</strong>: 1 en 10 / 1 en 7 / 1 en 5 / 1 en 3</p><p><strong>Modo de Uso</strong>: Aplicar sobre la superficie a tratar. Dejar que el producto actúe durante unos minutos. Remover la suciedad con la ayuda de un cepillo ó trapo. Enjuagar hasta eliminar todo el producto.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Degreaser that removes any type of animal, mineral or vegetable fat. Dissolves and emulsifies fats. </p> <p> <strong> Application </strong>: Greased floors, leatherette, industrial machinery, Kitchen tiles Industrial kitchens, hoods and extractor filters Ovens. </p> <p> <strong> Dissolution </strong>: 1 in 10/1 in 7/1 in 5/1 in 3 </p> <p> <strong> How to Use </strong>: Apply on the surface to be treated. Let the product act for a few minutes. Remove the dirt with the help of a brush or cloth. Rinse until all the product is removed. </p></p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Desengrasante Multiuso Concentrado.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 1,
            'pro_imagen_ppal' => 38
        ]); //2

        DB::table('productos')->insert(['pro_es_nombre' => 'Espuma Alcalina Desengrasante',
            'pro_en_nombre' => 'Degreasing Alkaline Foam',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Desengrasante que elimina cualquier tipo de grasa animal, mineral o vegetal. Disuelve y emulsiona las grasas</p><p><strong>Aplicación</strong>: Cocinas industriales, campanas y filtros de extractores, hornos, etc.</p><p><strong>Disolución</strong>: 1 en 5 a 1en 20.</p><p><strong>Modo de Uso</strong>: Aplicación manual o con máquina. Se recomienda la utilización de guantes.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Degreaser that removes any type of animal, mineral or vegetable fat. Dissolves and emulsifies fats </p> <p> <strong> Application </strong>: Industrial kitchens, extractor hoods and filters, ovens, etc. </p> <p> <strong> Dissolution </strong>: 1 in 5 to 1 in 20. </p> <p> <strong> How to Use </strong>: Manual or machine application. The use of gloves is recommended. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Espuma Alcalina.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 41
        ]); //3

        DB::table('productos')->insert(['pro_es_nombre' => 'Destapa Cañerias',
            'pro_en_nombre' => 'Unclog Pipes',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Producto caustico</p><p><strong>Aplicación</strong>: Aplicar con el uso de guantes y protección ocular</p><p><strong>Disolución</strong>: Puro.</p><p><strong>Modo de Uso</strong>: Echar la cantidad de Destapa Cañerias que considere necesaria, dependiendo el tamaño del tapón de grasa. Una vez aplicado, dejar reposar durante 15 a 30 minutos y luego abra el grifo de agua caliente y deje correr libremente por al menos 5 minutos. Volver a repetir la operación, si hiciera falta; una vez que se escurra el agua.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Caustic product </p> <p> <strong> Application </strong>: Apply with the use of gloves and eye protection </p> <p> <strong> Dissolution </strong>: Pure. </p> <p> <strong> How to Use </strong>: Pour the amount of Uncapping Pipes that you consider necessary, depending on the size of the grease plug. Once applied, let it sit for 15 to 30 minutes and then turn on the hot water tap and let it run freely for at least 5 minutes. Repeat the operation again, if necessary; once the water is drained. </p> ',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 43
        ]); //4

        DB::table('productos')->insert(['pro_es_nombre' => 'Lavavajillas Limón',
            'pro_en_nombre' => 'Dishwasher',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: La mejor ecuación Precio-Calidad</p><p><strong>Aplicación</strong>: Vajillas, Mesadas, Pisos, Paredes, Ventanas, etc.</p><p><strong>Disolución</strong>: 1 cucharada sopera en 6 litros de agua</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: The best Price-Quality equation </p> <p> <strong> Application </strong>: Tableware, Countertops, Floors, Walls, Windows, etc. </ p > <p> <strong> Dissolution </strong>: 1 tablespoon in 6 liters of water </p> ',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Lavavajillas Limon.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 1,
            'pro_imagen_ppal' => 46
        ]); //5

        DB::table('productos')->insert(['pro_es_nombre' => 'Detergente Lavavajilla Biodegradable',
            'pro_en_nombre' => 'Biodegradable Dishwasher Detergent',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpiador, remueve y emulsiona las manchas de grasa y suciedad.</p><p><strong>Aplicación</strong>: Pisos, escaleras, mesadas de faena de chacinados y vacunos, azulejos, baños y cocinas.</p><p><strong>Disolución</strong>: 1 en 5.</p><p><strong>Modo de Uso</strong>: Disuelto en agua caliente mejora su rendimiento.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Cleaner, removes and emulsifies grease and dirt stains. </p> <p> <strong> Application </strong>: Floors, stairs, slaughterhouse worktops and cattle, tiles, bathrooms and kitchens. </p> <p> <strong> Dissolution </strong>: 1 in 5. </p> <p> <strong> How to Use </strong>: Dissolved in hot water improves performance. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Detergente 15.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 49
        ]); //6

        DB::table('productos')->insert(['pro_es_nombre' => 'Detergente Lavavajilla Con Desinfectante',
            'pro_en_nombre' => 'Dishwasher Detergent With Disinfectant',
            'pro_es_descripcion_larga' => '<p>Detergente al 15 % formulado con desinfectante para poder limpiar y desinfectar en un solo paso.</p><p><strong>Aplicación:</strong></p><p>Sobre cualquier superficie que desee limpiar y desinfectar en un solo paso. Pisos, paredes, vidrios, mesadas, etc.</p><p><strong>Dilusión:</strong></p><p>Hasta 1 en 10 para usar como desinfectante.&nbsp;</p><p><strong>Modo de Uso:</strong></p><p>Se prepara una solución en un balde y luego aplique la misma con la ayuda de un trapo limpio y seco, sobre la superficie a limpiar.</p>',
            'pro_en_descripcion_larga' => '<p> 15% detergent formulated with disinfectant to be able to clean and disinfect in a single step. </p> <p> <strong> Application: </strong> </p> <p> On any surface that you want to clean and disinfect in one step. Floors, walls, glass, countertops, etc. </p> <p> <strong> Dilution: </strong> </p> <p> Up to 1 in 10 to use as a disinfectant. & Nbsp; </p> <p > <strong> How to Use: </strong> </p> <p> Prepare a solution in a bucket and then apply it with the help of a clean and dry cloth, on the surface to be cleaned. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 52
        ]); //7

        DB::table('productos')->insert(['pro_es_nombre' => 'Detergente para Equipos Lavavajillas Baja Espuma',
            'pro_en_nombre' => 'Low Foam Dishwasher Detergent',
            'pro_es_descripcion_larga' => '<p><strong>Aplicación:</strong></p><p></p><p><strong>Dilusión:</strong></p><p></p><p><strong>Modo de Uso:</strong></p><p></p>',
            'pro_en_descripcion_larga' => '<p><strong>Application:</strong></p><p></p><p><strong>Dilution:</strong></p><p></p> <p ><strong> How to Use: </strong> </p> <p> </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 0,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => null
        ]); //8

        DB::table('productos')->insert(['pro_es_nombre' => 'Detergente Concentrado',
            'pro_en_nombre' => 'Concentrated Detergent',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpiador, remueve y emulsiona las manchas de grasa y suciedad.</p><p><strong>Aplicación</strong>: Pisos, escaleras, mesadas de faena de chacinados y vacunos, azulejos, baños y cocinas.</p><p><strong>Disolución</strong>: 1 en 4 a 1 en 50.</p><p><strong>Modo de Uso</strong>: Disuelto en agua caliente mejora su rendimiento.</p>',
            'pro_en_descripcion_larga' => '<p><strong>Description</strong>: Cleaner, removes and emulsifies grease and dirt stains. </p> <p> <strong> Application </strong>: Floors, stairs, slaughterhouse worktops and cattle, tiles, bathrooms and kitchens. </p> <p> <strong> Dissolution </strong>: 1 in 4 to 1 in 50. </p> <p> <strong> How to Use </strong>: Dissolved in hot water improves its performance. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Detergente Concentrado.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 53
        ]); //9

        DB::table('productos')->insert(['pro_es_nombre' => 'Abrillantador de Vajilla',
            'pro_en_nombre' => 'Dish Polisher',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Especialmente diseñado para maquinas lavavajillas automaticas. Sector Gastronómico</p><p><strong>Aplicación</strong>: .</p><p><strong>Disolución</strong>: Pura</p><p><strong>Modo de Uso</strong>: En Manchas viejas, dejar actuar por 1 minuto.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Specially designed for automatic dishwashing machines. Gastronomic Sector </p> <p> <strong> Application </strong>:. </p> <p> <strong> Dissolution </strong>: Pure </p> <p> <strong> How to Use < / strong>: On old stains, leave to act for 1 minute. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 56
        ]); //10

        DB::table('productos')->insert(['pro_es_nombre' => 'Fajinador de Vajillas',
            'pro_en_nombre' => 'Dinnerware Sash',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Abrillantador de vajilla de secado instantáneo.</p><p><strong>Aplicación</strong>: Fajinado de copas, platos y cubiertos en gastronomía.</p><p><strong>Disolución</strong>: Puro.</p><p><strong>Modo de Uso</strong>: Poner en pulverizador y rociar el elemento a fajinar. Secar con paño seco sin pelusas.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Instant drying tableware polish. </p> <p> <strong> Application </strong>: Girdling of glasses, plates and cutlery in gastronomy. </p> < p> <strong> Dissolution </strong>: Pure. </p> <p> <strong> How to Use </strong>: Put in a spray bottle and spray the element to be wrapped. Dry with a dry, lint-free cloth. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 0,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 57
        ]); //11

        DB::table('productos')->insert(['pro_es_nombre' => 'Gel Clorado',
            'pro_en_nombre' => 'Chorinated Gel',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Desengrasa, desinfecta y blanquea. Actúa sobre todo tipo de virus, bacteria y hongo.</p><p><strong>Aplicación</strong>: Griferías, pisos, azulejos, muebles de jardín, plásticos y utensillos de cocina.</p><p><strong>Disolución</strong>: 1 en 10 a 1 en 30.</p><p><strong>Modo de Uso</strong>: Aplicar con trapo limpio.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Degreases, disinfects and bleaches. It acts on all types of viruses, bacteria and fungus. </p> <p> <strong> Application </strong>: Faucets, floors, tiles, garden furniture, plastics and kitchen utensils. </p> <p> <strong> Dissolution </strong>: 1 in 10 to 1 in 30. </p> <p> <strong> How to Use </strong>: Apply with a clean cloth. </p></p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Gel Clorado.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 59
        ]); //12

        DB::table('productos')->insert(['pro_es_nombre' => 'Agua Lavandina Concentrada 50 Gr/Lt',
            'pro_en_nombre' => 'Concentrated Lavandin Water 50 Gr / Lt',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Solución de Hipoclorito de Sodio con una concentración de cloro activo de 55 gCL2/l a la salida de fábrica.</p><p><strong>Aplicación</strong>: Baños, cocinas, juguetes, pisos, superficies plásticas, utensilios, etc.</p><p><strong>Disolución</strong>: Desinfectante general: 58 ml en 1 litro de agua.</p><p><strong>Modo de Uso</strong>: Para agua: 2 gotas por cada litro. Desinfectante general.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Sodium Hypochlorite solution with an active chlorine concentration of 55 gCL2 / l at the factory outlet. </p> <p> <strong> Application </strong>: Bathrooms , kitchens, toys, floors, plastic surfaces, utensils, etc. </p> <p> <strong> Dissolution </strong>: General disinfectant: 58 ml in 1 liter of water. </p> <p> <strong > How to Use </strong>: For water: 2 drops per liter. General disinfectant. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Agua Lavandina Concentrada.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 1,
            'pro_imagen_ppal' => 62
        ]); //13

        DB::table('productos')->insert(['pro_es_nombre' => 'Agua Lavandina',
            'pro_en_nombre' => 'Concentrated Lavandin Water',
            'pro_es_descripcion_larga' => '<p>Desinfectante, sanitizante de amplio espectro.&nbsp;</p><p>Actúa sobre todo tipo de virus, hongos y bacterias.</p><p>Como lavandina, como desinfectante. Para desinfectar agua. Para mantenimiento de piletas de natación.</p><p>Esperar media hora. Irritante, no mezclar con otros productos como ácidos o detergentes. Se recomienda utilizar guantes.</p>',
            'pro_en_descripcion_larga' => '<p> Disinfectant, broad spectrum sanitizer. & nbsp; </p> <p> It acts on all types of viruses, fungi and bacteria. </p> <p> As bleach, as a disinfectant. To disinfect water. For maintenance of swimming pools. </p> <p> Wait half an hour. Irritant, do not mix with other products such as acids or detergents. Gloves are recommended. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 65
        ]); //14

        DB::table('productos')->insert(['pro_es_nombre' => 'Cloro 80 Gr/Lt',
            'pro_en_nombre' => 'Chlorine 80 Gr / Lt',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: </p>',
            'pro_en_descripcion_larga' => '<p><strong>Description</strong>:</p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 66
        ]); //15

        DB::table('productos')->insert(['pro_es_nombre' => 'Hipoclorito de sodio 100 Gr/Lt',
            'pro_en_nombre' => 'Sodium hypochlorite 100 Gr / Lt',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: </p>',
            'pro_en_descripcion_larga' => '<p><strong>Description</strong>:</p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Hipoclorito de Sodio.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 68
        ]); //16

        DB::table('productos')->insert(['pro_es_nombre' => 'Benzalquat (Amonio Cuaternario 5%)',
            'pro_en_nombre' => 'Benzalquat (Quaternary Ammonium 5%)',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: </p>',
            'pro_en_descripcion_larga' => '<p><strong>Description</strong>:</p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Benzal Quat Desinfectante de superficies.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 69
        ]); //17

        DB::table('productos')->insert(['pro_es_nombre' => 'Benzalquat Plus 5ta Generación',
            'pro_en_nombre' => 'Benzalquat Plus 5th Generation',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: </p>',
            'pro_en_descripcion_larga' => '<p><strong>Description</strong>:</p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Cloruro de Benzalconio 50.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 70
        ]); //18

        DB::table('productos')->insert(['pro_es_nombre' => 'Jabón Para Manos Antibacterial',
            'pro_en_nombre' => 'Antibacterial Hand Soap',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Quita toda suciedad. No posee componentes cáuticos, solventes o abrasivos. No produce irritacion de la piel.</p><p><strong>Aplicación/strong>: Disuelve grasa, tinta, etc. Especial para plantas alimenticias, cocina industriales y gastronomicas.</p><p><strong>Disolución</strong>: Puro.</p><p><strong>Modo de Uso</strong>: Aplicar unas gotas sobre las palmas de las manos y dejar actuar 30 segundos. Enjuagar con agua.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Removes all dirt. It does not have caustic, solvent or abrasive components. It does not cause skin irritation. </p> <p> <strong> Application / strong>: Dissolves grease, ink, etc. Special for food plants, industrial and gastronomic kitchens. </p> <p> <strong> Dissolution </strong>: Pure. </p> <p> <strong> How to Use </strong>: Apply a few drops on the palms of the hands and leave to act for 30 seconds. Rinse with water. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Jabon Liq Manos Antibacterial Blanco.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 1,
            'pro_imagen_ppal' => 72
        ]); //19

        DB::table('productos')->insert(['pro_es_nombre' => 'Jabón Para Manos con Desinfectante',
            'pro_en_nombre' => 'Hand Soap with Sanitizer',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: </p>',
            'pro_en_descripcion_larga' => '<p><strong>Description</strong>:</p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Jabon para Manos con Desinfectante.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 74
        ]); //20

        DB::table('productos')->insert(['pro_es_nombre' => 'Jabón Para Manos Tocador Rosas',
            'pro_en_nombre' => 'Roses Toilet Hand Soap',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Disuelve grasa, tinta, lodo, etc. No produce irritación en la piel. No posee componentes cáusticos, solventes o abrasivos.</p><p><strong>Aplicación</strong>: Para manos.</p><p><strong>Disolución</strong>: Puro.</p><p><strong>Modo de Uso</strong>: Aplicar unas gotas sobre las palmas de las manos. Enjuagar con agua.</p><p><strong>Fragancia </strong>: Rosa.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Dissolves grease, ink, mud, etc. It does not irritate the skin. It does not have caustic, solvent or abrasive components. </p> <p> <strong> Application </strong>: For hands. </p> <p> <strong> Dissolution </strong>: Pure. </p> <p> <strong> How to Use </strong>: Apply a few drops on the palms of the hands. Rinse with water. </p> <p> <strong> Fragrance </strong>: Roses. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Jabon Liq Manos.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 76
        ]); //21

        DB::table('productos')->insert(['pro_es_nombre' => 'Jabón Para Manos Tocador Marina',
            'pro_en_nombre' => 'Marina Toilet Hand Soap',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Disuelve grasa, tinta, lodo, etc. No produce irritación en la piel. No posee componentes cáusticos, solventes o abrasivos.</p><p><strong>Aplicación</strong>: Para manos.</p><p><strong>Disolución</strong>: Puro.</p><p><strong>Modo de Uso</strong>: Aplicar unas gotas sobre las palmas de las manos. Enjuagar con agua.</p><p><strong>Fragancia </strong>: Rosa.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Dissolves grease, ink, mud, etc. It does not irritate the skin. It does not have caustic, solvent or abrasive components. </p> <p> <strong> Application </strong>: For hands. </p> <p> <strong> Dissolution </strong>: Pure. </p> <p> <strong> How to Use </strong>: Apply a few drops on the palms of the hands. Rinse with water. </p> <p> <strong> Fragrance </strong>: Marina. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Jabon Liq Manos.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 79
        ]); //22

        DB::table('productos')->insert(['pro_es_nombre' => 'Jabón Para Manos Tocador Coco',
            'pro_en_nombre' => 'coconut Toilet Hand Soap',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Disuelve grasa, tinta, lodo, etc. No produce irritación en la piel. No posee componentes cáusticos, solventes o abrasivos.</p><p><strong>Aplicación</strong>: Para manos.</p><p><strong>Disolución</strong>: Puro.</p><p><strong>Modo de Uso</strong>: Aplicar unas gotas sobre las palmas de las manos. Enjuagar con agua.</p><p><strong>Fragancia </strong>: Rosa.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Dissolves grease, ink, mud, etc. It does not irritate the skin. It does not have caustic, solvent or abrasive components. </p> <p> <strong> Application </strong>: For hands. </p> <p> <strong> Dissolution </strong>: Pure. </p> <p> <strong> How to Use </strong>: Apply a few drops on the palms of the hands. Rinse with water. </p> <p> <strong> Fragrance </strong>: coconut. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Jabon Liq Manos.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 82
        ]); //23

        DB::table('productos')->insert(['pro_es_nombre' => 'Jabón Líquido Para Ropa Country',
            'pro_en_nombre' => 'Country Laundry Soap',
            'pro_es_descripcion_larga' => '<p><strong>Fragancia</strong> : Country.</p><p><strong>Descripción</strong>: Su exclusiva fórmula le permite usar tanto como Jabón para Ropa, como quitamanchas.</p><p><strong>Aplicación</strong>: Sobre cualquier tipo de prenda, tela o tapizado.</p><p><strong>Disolución</strong>: Suciedad Normal: 1 tapa = 60 ml - Suciedad Difícil: 1 1⁄2 tapa = 90 ml</p><p><strong>Modo de Uso</strong>: De la Dosis a utilizar, aplicar sobre las manchas mas rebeldes y dejar actuar. No es necesario usarproductos de prelavado. Aplicar elproducto con dosificador. Si el equipo posee secadora, retirarlo antes de iniciar el ciclo de secado.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Fragrance </strong>: Country. </p> <p> <strong> Description </strong>: Its exclusive formula allows it to be used both as Laundry Soap and as a stain remover. </p> < p> <strong> Application </strong>: On any type of garment, fabric or upholstery. </p> <p> <strong> Dissolution </strong>: Normal dirt: 1 cap = 60 ml - Difficult dirt: 1 1⁄2 cap = 90 ml </p> <p> <strong> How to Use </strong>: From the dose to be used, apply on the most stubborn stains and leave to act. No need to use prewash products. Apply the product with a dispenser. If the equipment has a dryer, remove it before starting the drying cycle. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Jabon Liq Ropa.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 1,
            'pro_imagen_ppal' => 84
        ]); //24

        DB::table('productos')->insert(['pro_es_nombre' => 'Jabón Líquido Para Ropa Ocean',
            'pro_en_nombre' => 'Ocean Laundry Soap',
            'pro_es_descripcion_larga' => '<p><strong>Fragancia</strong> : Ocean.</p><p><strong>Descripción</strong>: Su exclusiva fórmula le permite usar tanto como Jabón para Ropa, como quitamanchas.</p><p><strong>Aplicación</strong>: Sobre cualquier tipo de prenda, tela o tapizado.</p><p><strong>Disolución</strong>: Suciedad Normal: 1 tapa = 60 ml - Suciedad Difícil: 1 1⁄2 tapa = 90 ml</p><p><strong>Modo de Uso</strong>: De la Dosis a utilizar, aplicar sobre las manchas mas rebeldes y dejar actuar. No es necesario usarproductos de prelavado. Aplicar elproducto con dosificador. Si el equipo posee secadora, retirarlo antes de iniciar el ciclo de secado.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Fragrance </strong>: Ocean. </p> <p> <strong> Description </strong>: Its exclusive formula allows it to be used both as Laundry Soap and as a stain remover. </p> < p> <strong> Application </strong>: On any type of garment, fabric or upholstery. </p> <p> <strong> Dissolution </strong>: Normal dirt: 1 cap = 60 ml - Difficult dirt: 1 1⁄2 cap = 90 ml </p> <p> <strong> How to Use </strong>: From the dose to be used, apply on the most stubborn stains and leave to act. No need to use prewash products. Apply the product with a dispenser. If the equipment has a dryer, remove it before starting the drying cycle. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Jabon Liq Ropa.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 1,
            'pro_imagen_ppal' => 86
        ]); //25

        DB::table('productos')->insert(['pro_es_nombre' => 'Suavizante Para Ropa Cielo',
            'pro_en_nombre' => 'Sky Fabric Softener',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Deja la ropa suave y perfumada.</p><p><strong>Aplicación</strong>: Sobre cualquier tipo de prenda o tela.</p><p><strong>Disolución</strong>: Lavado a Mano: 1 1⁄2 tapita por cada 10 l. Lavado Automatico: 3 tapas en la gaveta o antes del enjuague final.</p><p><strong>Modo de Uso</strong>: No aplicar directamente sobre la ropa.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Leaves the clothes soft and perfumed. </p> <p> <strong> Application </strong>: On any type of garment or fabric. </p> <p> <strong> Dissolution </strong>: Hand wash: 1 1⁄2 cap for every 10 l. Automatic Wash: 3 lids in the drawer or before the final rinse. </p> <p> <strong> How to Use </strong>: Do not apply directly to clothing. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 88
        ]); //26

        DB::table('productos')->insert(['pro_es_nombre' => 'Suavizante Para Ropa Brisa',
            'pro_en_nombre' => 'Breeze Fabric Softener',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Deja la ropa suave y perfumada.</p><p><strong>Aplicación</strong>: Sobre cualquier tipo de prenda o tela.</p><p><strong>Disolución</strong>: Lavado a Mano: 1 1⁄2 tapita por cada 10 l. Lavado Automatico: 3 tapas en la gaveta o antes del enjuague final.</p><p><strong>Modo de Uso</strong>: No aplicar directamente sobre la ropa.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Leaves the clothes soft and perfumed. </p> <p> <strong> Application </strong>: On any type of garment or fabric. </p> <p> <strong> Dissolution </strong>: Hand wash: 1 1⁄2 cap for every 10 l. Automatic Wash: 3 lids in the drawer or before the final rinse. </p> <p> <strong> How to Use </strong>: Do not apply directly to clothing. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 91
        ]); //27

        DB::table('productos')->insert(['pro_es_nombre' => 'Perfumina Vainilla',
            'pro_en_nombre' => 'Vanilla Perfume',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Solución alcohólica perfumada</p><p><strong>Aplicación</strong>: Aplicar sobre cualquier tipo de prenda, tela o tapizado.</p><p><strong>Disolución</strong>: Puro.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Scented alcoholic solution </p> <p> <strong> Application </strong>: Apply to any type of garment, fabric or upholstery. </p> <p> < strong> Dissolution </strong>: Pure. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 93
        ]); //28

        DB::table('productos')->insert(['pro_es_nombre' => 'Perfumina Colonia Bebe',
            'pro_en_nombre' => 'Baby Cologne Perfume',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Solución alcohólica perfumada</p><p><strong>Aplicación</strong>: Aplicar sobre cualquier tipo de prenda, tela o tapizado.</p><p><strong>Disolución</strong>: Puro.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Scented alcoholic solution </p> <p> <strong> Application </strong>: Apply to any type of garment, fabric or upholstery. </p> <p> < strong> Dissolution </strong>: Pure. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 93
        ]); //29

        DB::table('productos')->insert(['pro_es_nombre' => 'Perfumina Arpege',
            'pro_en_nombre' => 'Arpege Perfume',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Solución alcohólica perfumada</p><p><strong>Aplicación</strong>: Aplicar sobre cualquier tipo de prenda, tela o tapizado.</p><p><strong>Disolución</strong>: Puro.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Scented alcoholic solution </p> <p> <strong> Application </strong>: Apply to any type of garment, fabric or upholstery. </p> <p> < strong> Dissolution </strong>: Pure. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 93
        ]); //30

        DB::table('productos')->insert(['pro_es_nombre' => 'Limpiador Desinfectante Desengrasante Neutro',
            'pro_en_nombre' => 'Neutral Degreasing Disinfectant Cleaner',
            'pro_es_descripcion_larga' => '<p>No necesita diluirse. Limpia, desinfecta y desengrasa en un solo paso. Fue desarrollado especialmente para atacar todo tipo de grasa presente en la cocina.</p><p>Azulejos, mesadas, ventanas, superficies plásticas y metálicas, etc.</p><p>Aplique sobre la superficie y luego pase un paño limpio y seco.</p>',
            'pro_en_descripcion_larga' => '<p> Does not need to be diluted. Cleans, disinfects and degreases in one step. It was specially developed to attack all types of grease present in the kitchen. </p> <p> Tiles, countertops, windows, plastic and metal surfaces, etc. </p> <p> Apply on the surface and then wipe clean and dry. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Limpiador Desinfectante Neutro.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 95
        ]); //31

        DB::table('productos')->insert(['pro_es_nombre' => 'Limpiavidrios',
            'pro_en_nombre' => 'Glass Cleaner',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpia cualquier superficie vidriada sin dejar vetas.</p><p><strong>Aplicación</strong>: Azulejos, vidrios, plasticos, etc.</p><p><strong>Disolución</strong>: Puro.</p><p><strong>Modo de Uso</strong>: Aplique sobre la superficie y luego pase un paño limpio y seco.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Cleans any glazed surface without leaving streaks. </p> <p> <strong> Application </strong>: Tiles, glass, plastic, etc. </p> <p > <strong> Dissolution </strong>: Pure. </p> <p> <strong> How to Use </strong>: Apply on the surface and then wipe with a clean, dry cloth. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Limpiavidrios.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 98
        ]); //32

        DB::table('productos')->insert(['pro_es_nombre' => 'Limpiador Desodorante Para Piso Pino',
            'pro_en_nombre' => 'Pine Floor Deodorizing Cleaner',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpia y desodoriza dejando un aroma agradable y duradero.</p><p><strong>Aplicación</strong>: Sobre cualquier tipo de superficie que sea lavable. Desarrollado especialmente para baños, cocinas, etc..</p><p><strong>Disolución</strong>: Diluir hasta 1 en 5 partes de agua, dependiendo de las necesidades.</p><p><strong>Modo de Uso</strong>: Aplicar con trapo limpio.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Cleans and deodorizes leaving a pleasant and long-lasting scent. </p> <p> <strong> Application </strong>: On any type of washable surface. Developed especially for bathrooms, kitchens, etc. </p> <p> <strong> Dissolution </strong>: Dilute up to 1 in 5 parts of water, depending on the needs. </p> <p> <strong> How to Use </strong>: Apply with a clean cloth. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 101
        ]); //33

        DB::table('productos')->insert(['pro_es_nombre' => 'Limpiador Desodorante Para Piso Lavanda',
            'pro_en_nombre' => 'Lavender Deodorizing Floor Cleaner',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpia y desodoriza dejando un aroma agradable y duradero.</p><p><strong>Aplicación</strong>: Sobre cualquier tipo de superficie que sea lavable. Desarrollado especialmente para baños, cocinas, etc..</p><p><strong>Disolución</strong>: Diluir hasta 1 en 5 partes de agua, dependiendo de las necesidades.</p><p><strong>Modo de Uso</strong>: Aplicar con trapo limpio.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Cleans and deodorizes leaving a pleasant and long-lasting scent. </p> <p> <strong> Application </strong>: On any type of washable surface. Developed especially for bathrooms, kitchens, etc. </p> <p> <strong> Dissolution </strong>: Dilute up to 1 in 5 parts of water, depending on the needs. </p> <p> <strong> How to Use </strong>: Apply with a clean cloth. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 0,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => null
        ]); //34

        DB::table('productos')->insert(['pro_es_nombre' => 'Limpiador Desodorante Para Piso Floral',
            'pro_en_nombre' => 'Floral Deodorizing Floor Cleaner',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpia y desodoriza dejando un aroma agradable y duradero.</p><p><strong>Aplicación</strong>: Sobre cualquier tipo de superficie que sea lavable. Desarrollado especialmente para baños, cocinas, etc..</p><p><strong>Disolución</strong>: Diluir hasta 1 en 5 partes de agua, dependiendo de las necesidades.</p><p><strong>Modo de Uso</strong>: Aplicar con trapo limpio.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Cleans and deodorizes leaving a pleasant and long-lasting scent. </p> <p> <strong> Application </strong>: On any type of washable surface. Developed especially for bathrooms, kitchens, etc. </p> <p> <strong> Dissolution </strong>: Dilute up to 1 in 5 parts of water, depending on the needs. </p> <p> <strong> How to Use </strong>: Apply with a clean cloth. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 104
        ]); //35

        DB::table('productos')->insert(['pro_es_nombre' => 'Limpiador Desodorante Para Piso Limón',
            'pro_en_nombre' => 'Lemon Deodorizing Floor Cleaner',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpia y desodoriza dejando un aroma agradable y duradero.</p><p><strong>Aplicación</strong>: Sobre cualquier tipo de superficie que sea lavable. Desarrollado especialmente para baños, cocinas, etc..</p><p><strong>Disolución</strong>: Diluir hasta 1 en 5 partes de agua, dependiendo de las necesidades.</p><p><strong>Modo de Uso</strong>: Aplicar con trapo limpio.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Cleans and deodorizes leaving a pleasant and long-lasting scent. </p> <p> <strong> Application </strong>: On any type of washable surface. Developed especially for bathrooms, kitchens, etc. </p> <p> <strong> Dissolution </strong>: Dilute up to 1 in 5 parts of water, depending on the needs. </p> <p> <strong> How to Use </strong>: Apply with a clean cloth. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 107
        ]); //36

        DB::table('productos')->insert(['pro_es_nombre' => 'Limpiador Desodorante Para Piso Cherry',
            'pro_en_nombre' => 'Cherry Deodorizing Floor Cleaner',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpia y desodoriza dejando un aroma agradable y duradero.</p><p><strong>Aplicación</strong>: Sobre cualquier tipo de superficie que sea lavable. Desarrollado especialmente para baños, cocinas, etc..</p><p><strong>Disolución</strong>: Diluir hasta 1 en 5 partes de agua, dependiendo de las necesidades.</p><p><strong>Modo de Uso</strong>: Aplicar con trapo limpio.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Cleans and deodorizes leaving a pleasant and long-lasting scent. </p> <p> <strong> Application </strong>: On any type of washable surface. Developed especially for bathrooms, kitchens, etc. </p> <p> <strong> Dissolution </strong>: Dilute up to 1 in 5 parts of water, depending on the needs. </p> <p> <strong> How to Use </strong>: Apply with a clean cloth. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 109
        ]); //37

        DB::table('productos')->insert(['pro_es_nombre' => 'Desodorante Para Piso Concentrado Pino',
            'pro_en_nombre' => 'Pine Concentrated Floor Deodorant',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpiador, desengrasante y desodorante para pisos.</p><p><strong>Aplicación</strong>: Para pisos. Secado rápido, no hace falta enjuagar y no deja residuos.</p><p><strong>Disolución</strong>: Diluir hasta 1 en 10 partes de agua a 1 en 30 partes de agua, dependiendo de las necesidades.</p><p><strong>Modo de Uso</strong>: En superficies que tienen contacto con alimentos, enjuagar bien con agua.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Floor cleaner, degreaser and deodorant. </p> <p> <strong> Application </strong>: For floors. Quick drying, no rinsing required and no residue. </p> <p> <strong> Dissolution </strong>: Dilute up to 1 in 10 parts of water to 1 in 30 parts of water, depending on the needs. < / p> <p> <strong> How to Use </strong>: On surfaces that have contact with food, rinse well with water. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Desod. Piso Conc. Pino.pdf',
            'pro_estado' => 0,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => null
        ]); //38

        DB::table('productos')->insert(['pro_es_nombre' => 'Desodorante Para Piso Concentrado Lavanda',
            'pro_en_nombre' => 'Lavender Concentrated Floor Deodorant',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpiador, desengrasante y desodorante para pisos.</p><p><strong>Aplicación</strong>: Para pisos. Secado rápido, no hace falta enjuagar y no deja residuos.</p><p><strong>Disolución</strong>: Diluir hasta 1 en 10 partes de agua a 1 en 30 partes de agua, dependiendo de las necesidades.</p><p><strong>Modo de Uso</strong>: En superficies que tienen contacto con alimentos, enjuagar bien con agua.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Floor cleaner, degreaser and deodorant. </p> <p> <strong> Application </strong>: For floors. Quick drying, no rinsing required and no residue. </p> <p> <strong> Dissolution </strong>: Dilute up to 1 in 10 parts of water to 1 in 30 parts of water, depending on the needs. < / p> <p> <strong> How to Use </strong>: On surfaces that have contact with food, rinse well with water. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Desod. Piso Conc. Lavanda.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 110
        ]); //39

        DB::table('productos')->insert(['pro_es_nombre' => 'Desodorante Para Piso Concentrado Floral',
            'pro_en_nombre' => 'Floral Concentrated Floor Deodorant',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpiador, desengrasante y desodorante para pisos.</p><p><strong>Aplicación</strong>: Para pisos. Secado rápido, no hace falta enjuagar y no deja residuos.</p><p><strong>Disolución</strong>: Diluir hasta 1 en 10 partes de agua a 1 en 30 partes de agua, dependiendo de las necesidades.</p><p><strong>Modo de Uso</strong>: En superficies que tienen contacto con alimentos, enjuagar bien con agua.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Floor cleaner, degreaser and deodorant. </p> <p> <strong> Application </strong>: For floors. Quick drying, no rinsing required and no residue. </p> <p> <strong> Dissolution </strong>: Dilute up to 1 in 10 parts of water to 1 in 30 parts of water, depending on the needs. < / p> <p> <strong> How to Use </strong>: On surfaces that have contact with food, rinse well with water. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Desod. Piso Conc. Floral.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 111
        ]); //40

        DB::table('productos')->insert(['pro_es_nombre' => 'Desodorante Para Piso Concentrado Limón',
            'pro_en_nombre' => 'Lemon Concentrated Floor Deodorant',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpiador, desengrasante y desodorante para pisos.</p><p><strong>Aplicación</strong>: Para pisos. Secado rápido, no hace falta enjuagar y no deja residuos.</p><p><strong>Disolución</strong>: Diluir hasta 1 en 10 partes de agua a 1 en 30 partes de agua, dependiendo de las necesidades.</p><p><strong>Modo de Uso</strong>: En superficies que tienen contacto con alimentos, enjuagar bien con agua.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Floor cleaner, degreaser and deodorant. </p> <p> <strong> Application </strong>: For floors. Quick drying, no rinsing required and no residue. </p> <p> <strong> Dissolution </strong>: Dilute up to 1 in 10 parts of water to 1 in 30 parts of water, depending on the needs. < / p> <p> <strong> How to Use </strong>: On surfaces that have contact with food, rinse well with water. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Desod. Piso Conc. Limon.pdf',
            'pro_estado' => 0,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => null
        ]); //41

        DB::table('productos')->insert(['pro_es_nombre' => 'Desodorante Para Piso Concentrado Cherry',
            'pro_en_nombre' => 'Cherry Concentrated Floor Deodorant',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Limpiador, desengrasante y desodorante para pisos.</p><p><strong>Aplicación</strong>: Para pisos. Secado rápido, no hace falta enjuagar y no deja residuos.</p><p><strong>Disolución</strong>: Diluir hasta 1 en 10 partes de agua a 1 en 30 partes de agua, dependiendo de las necesidades.</p><p><strong>Modo de Uso</strong>: En superficies que tienen contacto con alimentos, enjuagar bien con agua.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Floor cleaner, degreaser and deodorant. </p> <p> <strong> Application </strong>: For floors. Quick drying, no rinsing required and no residue. </p> <p> <strong> Dissolution </strong>: Dilute up to 1 in 10 parts of water to 1 in 30 parts of water, depending on the needs. < / p> <p> <strong> How to Use </strong>: On surfaces that have contact with food, rinse well with water. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Desod. Piso Conc. Cherry.pdf',
            'pro_estado' => 0,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => null
        ]); //42

        DB::table('productos')->insert(['pro_es_nombre' => 'Lustra Muebles',
            'pro_en_nombre' => 'Furniture Polish',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Su formula especial, impide que el polvo se adhiera. Evita las marcas de los dedos, gracia a su alto poder de protección.</p><p><strong>Aplicación</strong>: En madera natural, algarrobo y madera lustrada. Cueros y cuerinas. Marmol y granitos.</p><p><strong>Disolución</strong>: Puro.</p><p><strong>Modo de Uso</strong>: Aplicar pulverizando sobre un trapo limpio y seco. Extender sobre superficie a tratar. Luego frotar con un paño de lana hasta obtener el brillo.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Its special formula prevents dust from adhering. Avoid finger marks, thanks to its high protection power. </p> <p> <strong> Application </strong>: In natural wood, carob and polished wood. Leathers and leathers. Marble and granites. </p> <p> <strong> Dissolution </strong>: Pure. </p> <p> <strong> How to Use </strong>: Apply by spraying on a clean, dry cloth. Spread on the surface to be treated. Then rub with a woolen cloth until you get the shine. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Lustramuebles.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 1,
            'pro_imagen_ppal' => 113
        ]); //43

        DB::table('productos')->insert(['pro_es_nombre' => 'Quita Sarro',
            'pro_en_nombre' => 'Toilet Bowl Cleaner',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Elimina el sarro del inodoro y cualquier otra superficie sanitaria.</p><p><strong>Aplicación</strong>: Sanitarios, griferia, bachas, etc.</p><p><strong>Disolución</strong>: 1 en 10.</p><p><strong>Modo de Uso</strong>: Dejar actuar de 10 a 15 minutos y enjuagar. Se recomienda la utilización de guantes.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Removes scale from the toilet and any other sanitary surface. </p> <p> <strong> Application </strong>: Toilets, taps, sinks, etc. </ p > <p> <strong> Dissolution </strong>: 1 in 10. </p> <p> <strong> How to Use </strong>: Leave on for 10 to 15 minutes and rinse. The use of gloves is recommended. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 114
        ]); //44

        DB::table('productos')->insert(['pro_es_nombre' => 'Removedor de Ceras',
            'pro_en_nombre' => 'Wax Remover',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Remueve los restos de cera auto brillo y cualquier cera polimerica.</p><p><strong>Aplicación</strong>: Para cualquier superficie que tenga restos de cera a remover.</p><p><strong>Disolución</strong>: 1 en 2 a 1 en 5, según la cantidad a remover.</p><p><strong>Modo de Uso</strong>: Aplique sobre la superficie, dejar actuar unos minutos, enjuagar y luego pase un paño limpio y seco.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Removes the remains of self-shine wax and any polymeric wax. </p> <p> <strong> Application </strong>: For any surface that has remains of wax to remove . </p> <p> <strong> Dissolution </strong>: 1 in 2 to 1 in 5, depending on the amount to be removed. </p> <p> <strong> How to Use </strong>: Apply on the surface, leave to act for a few minutes, rinse and then wipe with a clean, dry cloth. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Removedor de Ceras.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 117
        ]); //45
        
        DB::table('productos')->insert(['pro_es_nombre' => 'Cera Autobrillo Natural',
            'pro_en_nombre' => 'Natural Self Shine Wax',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Formulada con polímeros. Es antideslizante, resistente. Se obtiene brillo intenso sin necesidad de lustrar.</p><p><strong>Aplicación</strong>: Pisos de plasticos, mosaico, cerámico, laja, adoquines, etc.</p><p><strong>Disolución</strong>: 1 en 2, Pura.</p><p><strong>Uso</strong>: Mantenimiento y tránsito livino, Tránsito normal, Tránsito Pesado. Dejar secar 10 minutos</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Formulated with polymers. It is non-slip, resistant. Intense shine is obtained without the need to polish. </p> <p> <strong> Application </strong>: Plastic floors, mosaic, ceramic, flagstone, pavers, etc. </p> <p> <strong> Dissolution </strong>: 1 in 2, Pure. </p> <p> <strong> Use </strong>: Maintenance and light traffic, normal traffic, heavy traffic. Let dry for 10 minutes </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 119
        ]); //46

        DB::table('productos')->insert(['pro_es_nombre' => 'Cera Liquida para Madera al Solvente',
            'pro_en_nombre' => 'Solvent Liquid Wood Wax',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Brillo duradero. Alta resistencia al mojado por su alto contenido de sólidos.</p><p><strong>Aplicación</strong>: Muebles y pisos de madera.</p><p><strong>Disolución</strong>: Puro.</p><p><strong>Modo de Uso</strong>: Eliminar todo tipo de polvo presente en la superficie a tratar. Aplicar una delgada capa con un trapo. Dejar secar y luego lustrar con la ayuda de un paño de lana o máquina hasta obtener el brillo deseado. Mantenimiento y tránsito liviano / Tránsito normal / Tránsito pesado. Dejar secar 10 minutos</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Long-lasting shine. High resistance to wetting due to its high solids content. </p> <p> <strong> Application </strong>: Furniture and wooden floors. </p> <p> <strong> Dissolution </strong>: Pure . </p> <p> <strong> How to Use </strong>: Eliminate all types of dust present on the surface to be treated. Apply a thin layer with a cloth. Let dry and then polish with the help of a woolen cloth or machine until the desired shine is obtained. Maintenance and light traffic / Normal traffic / Heavy traffic. Let dry for 10 minutes </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 122
        ]); //47

        DB::table('productos')->insert(['pro_es_nombre' => 'Acondicionador Para Pisos',
            'pro_en_nombre' => 'Floor Conditioner',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Formulado con ceras siliconadas. Deja sus pisos brillantes, se seca con rapidez y de facil aplicación. </p><p><strong>Aplicación</strong>: Sobre toda clase de pisos: madera, vinilicos, mármol, cerámicos, cemento alisado y piso flotante .</p><p><strong>Disolución</strong>: Puro.  Para pisos encerados diluya 1/2 taza de (100cm3) en 8 ó 10 litros de agua. Para pisos no encerados diluya 1 taza de producto( 200 cm3 ) en 8 ó 10 litros de agua </p><p><strong>Modo de Uso</strong>: Distribuya sobre la superficie el producto diluido, con trapo o mopa. No enjuague y deje secar. Puede aumentar el brillo pasando maquina lustradora. </p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Formulated with silicone waxes. Leaves your floors shiny, dries quickly and is easy to apply. </p> <p> <strong> Application </strong>: On all kinds of floors: wood, vinyl, marble, ceramic, smoothed cement and floating floor. </p> <p> <strong> Dissolution </ strong >: Pure. For waxed floors dilute 1/2 cup (100cm3) in 8-10 liters of water. For non-waxed floors dilute 1 cup of product (200 cm3) in 8 or 10 liters of water </p> <p> <strong> How to Use </strong>: Distribute the diluted product on the surface, with a cloth or mop . Do not rinse and let dry. You can increase the shine by passing a polishing machine. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Acondicionador de Pisos.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 125
        ]); //48

        DB::table('productos')->insert(['pro_es_nombre' => 'Shampoo para Autos',
            'pro_en_nombre' => 'Car Shampoo',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>:  </p><p><strong>Aplicación</strong>: </p><p><strong>Disolución</strong>: </p><p><strong>Modo de Uso</strong>:  </p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: </p> <p> <strong> Application </strong>: </p> <p> <strong> Dissolution </strong>: </p> <p > <strong> How to Use </strong>: </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 127
        ]); //49

        DB::table('productos')->insert(['pro_es_nombre' => 'Silicona Para Tableros',
            'pro_en_nombre' => 'Silicone For Dashboards',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>:  </p><p><strong>Aplicación</strong>: </p><p><strong>Disolución</strong>: </p><p><strong>Modo de Uso</strong>:  </p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: </p> <p> <strong> Application </strong>: </p> <p> <strong> Dissolution </strong>: </p> <p > <strong> How to Use </strong>: </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 129
        ]); //50

        DB::table('productos')->insert(['pro_es_nombre' => 'Silicona Para Neumatico',
            'pro_en_nombre' => 'Silicone For Tire',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>:  </p><p><strong>Aplicación</strong>: </p><p><strong>Disolución</strong>: </p><p><strong>Modo de Uso</strong>:  </p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: </p> <p> <strong> Application </strong>: </p> <p> <strong> Dissolution </strong>: </p> <p > <strong> How to Use </strong>: </p>',
            'pro_tipo' => 1,
            'pro_ficha' => null,
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 132
        ]); //51

        DB::table('productos')->insert(['pro_es_nombre' => 'Cera Para Autos',
            'pro_en_nombre' => 'Car Wax',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Formulada con polímeros. Es antideslizantes, resistente. Se obtiene brillo intenso sin necesidad de lustrar. </p><p><strong>Aplicación</strong>: </p><p><strong>Disolución</strong>: </p><p><strong>Modo de Uso</strong>:  </p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: </p> <p> <strong> Application </strong>: </p> <p> <strong> Dissolution </strong>: </p> <p > <strong> How to Use </strong>: </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Cera para Autos.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 135
        ]); //52

        DB::table('productos')->insert(['pro_es_nombre' => 'Splash Col',
            'pro_en_nombre' => 'Multi-use Disintectant',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Desinfectante de superficies. </p><p><strong>Aplicación</strong>: Cualquier tipo de Superficie ( no tiene poder residual ). </p><p><strong>Disolución</strong>: Usar sin diluir </p><p><strong>Modo de Uso</strong>: Aplicar unas gotas sobre la superficie y pasar paño limpio y seco hasta que el producto se  evapore por completo.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Surface disinfectant. </p> <p> <strong> Application </strong>: Any type of Surface (it has no residual power). </p> <p> <strong> Dissolution </strong>: Use undiluted </p> <p> <strong> How to Use </strong>: Apply a few drops on the surface and wipe clean and dry cloth until the product to evaporate completely. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Splash Col.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 0,
            'pro_imagen_ppal' => 138
        ]); //53

        DB::table('productos')->insert(['pro_es_nombre' => 'Alcohol en Gel',
            'pro_en_nombre' => 'Hand Sanitizer Gel',
            'pro_es_descripcion_larga' => '<p><strong>Descripción</strong>: Desinfectante de manos. </p><p><strong>Aplicación</strong>: Manos unicamente. </p><p><strong>Disolución</strong>: Usar sin diluir </p><p><strong>Modo de Uso</strong>: Aplicar unas gotas sobre la palma de las manos y friccionar hasta que el producto se evapore por completo.</p>',
            'pro_en_descripcion_larga' => '<p> <strong> Description </strong>: Hand sanitizer. </p> <p> <strong> Application </strong>: Hands only. </p> <p> <strong> Dissolution </strong>: Use undiluted </p> <p> <strong> How to Use </strong>: Apply a few drops on the palm of your hands and rub until the product evaporates completely. </p>',
            'pro_tipo' => 1,
            'pro_ficha' => '/storage/ficha/FT Alcohol en Gel.pdf',
            'pro_estado' => 1,
            'pro_destacado' => 1,
            'pro_imagen_ppal' => 145
        ]); //54

        

        // productos por categorias
        DB::table('productos_categorias')->truncate();
        DB::table('productos_categorias')->insert([
            'pca_producto' => 1,
            'pca_categoria' => 17,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 1,
            'pca_categoria' => 25,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 2,
            'pca_categoria' => 17,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 2,
            'pca_categoria' => 25,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 3,
            'pca_categoria' => 17,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 3,
            'pca_categoria' => 25,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 4,
            'pca_categoria' => 17,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 4,
            'pca_categoria' => 26,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 5,
            'pca_categoria' => 18,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 5,
            'pca_categoria' => 29,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 6,
            'pca_categoria' => 18,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 6,
            'pca_categoria' => 29,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 7,
            'pca_categoria' => 18,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 7,
            'pca_categoria' => 29,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 9,
            'pca_categoria' => 18,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 9,
            'pca_categoria' => 29,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 10,
            'pca_categoria' => 18,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 10,
            'pca_categoria' => 28,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 11,
            'pca_categoria' => 17,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 11,
            'pca_categoria' => 27,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 12,
            'pca_categoria' => 6,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 12,
            'pca_categoria' => 14,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 12,
            'pca_categoria' => 12,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 12,
            'pca_categoria' => 33,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 13,
            'pca_categoria' => 12,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 13,
            'pca_categoria' => 34,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 14,
            'pca_categoria' => 12,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 14,
            'pca_categoria' => 34,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 15,
            'pca_categoria' => 12,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 15,
            'pca_categoria' => 32,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 16,
            'pca_categoria' => 12,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 16,
            'pca_categoria' => 31,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 17,
            'pca_categoria' => 12,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 17,
            'pca_categoria' => 30,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 18,
            'pca_categoria' => 12,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 18,
            'pca_categoria' => 30,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 19,
            'pca_categoria' => 13,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 19,
            'pca_categoria' => 36,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 20,
            'pca_categoria' => 13,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 20,
            'pca_categoria' => 36,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 21,
            'pca_categoria' => 13,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 21,
            'pca_categoria' => 36,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 22,
            'pca_categoria' => 13,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 22,
            'pca_categoria' => 36,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 23,
            'pca_categoria' => 13,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 23,
            'pca_categoria' => 36,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 24,
            'pca_categoria' => 9,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 24,
            'pca_categoria' => 22,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 25,
            'pca_categoria' => 9,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 25,
            'pca_categoria' => 22,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 26,
            'pca_categoria' => 9,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 26,
            'pca_categoria' => 24,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 27,
            'pca_categoria' => 9,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 27,
            'pca_categoria' => 24,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 28,
            'pca_categoria' => 9,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 28,
            'pca_categoria' => 23,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 29,
            'pca_categoria' => 9,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 29,
            'pca_categoria' => 23,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 30,
            'pca_categoria' => 9,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 30,
            'pca_categoria' => 23,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 31,
            'pca_categoria' => 17,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 31,
            'pca_categoria' => 25,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 32,
            'pca_categoria' => 11,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 33,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 33,
            'pca_categoria' => 21,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 34,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 34,
            'pca_categoria' => 21,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 35,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 35,
            'pca_categoria' => 21,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 36,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 36,
            'pca_categoria' => 21,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 37,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 37,
            'pca_categoria' => 21,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 38,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 38,
            'pca_categoria' => 21,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 39,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 39,
            'pca_categoria' => 21,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 40,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 40,
            'pca_categoria' => 21,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 41,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 41,
            'pca_categoria' => 21,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 42,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 42,
            'pca_categoria' => 21,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 43,
            'pca_categoria' => 10,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 44,
            'pca_categoria' => 6,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 44,
            'pca_categoria' => 16,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 45,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 45,
            'pca_categoria' => 20,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 46,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 46,
            'pca_categoria' => 20,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 47,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 47,
            'pca_categoria' => 20,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 48,
            'pca_categoria' => 8,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 48,
            'pca_categoria' => 19,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 49,
            'pca_categoria' => 4,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 50,
            'pca_categoria' => 4,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 51,
            'pca_categoria' => 4,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 52,
            'pca_categoria' => 4,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 53,
            'pca_categoria' => 13,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 53,
            'pca_categoria' => 35,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 54,
            'pca_categoria' => 13,
            'pca_add' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'pca_producto' => 54,
            'pca_categoria' => 35,
            'pca_add' => 1
        ]);

        

        //
        //
        //
        //Atributos de Productos
        //
        //
        DB::table('productos_atributos')->insert([
            'pat_prod' => 1,
            'pat_attr' => 10,
            'pat_imagen' => 36,
            'pat_precio_usr' =>383.93,
            'pat_precio_emp' =>287.95,
            'pat_precio_esp' =>349.55,
            'pat_precio_dst' =>191.96,
            'pat_cod_tempo' => '0696',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 1,
            'pat_attr' => 5,
            'pat_imagen' => 35,
            'pat_precio_usr' =>234.30,
            'pat_precio_emp' =>175.73,
            'pat_precio_esp' =>152.30,
            'pat_precio_dst' =>117.15,
            'pat_cod_tempo' => '0078',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 1,
            'pat_attr' => 4,
            'pat_imagen' => 34,
            'pat_precio_usr' =>80,
            'pat_precio_emp' =>60,
            'pat_precio_esp' =>52,
            'pat_precio_dst' =>40,
            'pat_cod_tempo' => '296',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 1,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 782.34,
            'pat_precio_emp' => 586.75,
            'pat_precio_esp' => 508.52,
            'pat_precio_dst' => 391.17,
            'pat_cod_tempo' => '0027',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 1,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 99.56,
            'pat_precio_emp' => 74.67,
            'pat_precio_esp' => 64.72,
            'pat_precio_dst' => 49.78,
            'pat_cod_tempo' => 'ISE22',
            'pat_estado' => 0,
            'pat_orden' => 6,
            'pat_add' => 1
        ]);


        DB::table('productos_atributos')->insert([
            'pat_prod' => 2,
            'pat_attr' => 4,
            'pat_imagen' => 37,
            'pat_precio_usr' => 296.05,
            'pat_precio_emp' => 222.04,
            'pat_precio_esp' => 192.43,
            'pat_precio_dst' => 148.03,
            'pat_cod_tempo' => '0675',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 2,
            'pat_attr' => 5,
            'pat_imagen' => 38,
            'pat_precio_usr' => 566.08,
            'pat_precio_emp' => 424.56,
            'pat_precio_esp' => 367.95,
            'pat_precio_dst' => 283.04,
            'pat_cod_tempo' => '0079',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 2,
            'pat_attr' => 6,
            'pat_imagen' => 39,
            'pat_precio_usr' => 2312.71,
            'pat_precio_emp' => 1734.53,
            'pat_precio_esp' => 1503.26,
            'pat_precio_dst' => 1156.36,
            'pat_cod_tempo' => '0028',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 2,
            'pat_attr' => 7,
            'pat_imagen' => 40,
            'pat_precio_usr' => 4548.04,
            'pat_precio_emp' => 3411.03,
            'pat_precio_esp' => 2956.23,
            'pat_precio_dst' => 2274.02,
            'pat_cod_tempo' => '0262',
            'pat_estado' => 1,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 2,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 410.89,
            'pat_precio_emp' => 308.17,
            'pat_precio_esp' => 267.08,
            'pat_precio_dst' => 205.45,
            'pat_cod_tempo' => 'ISE55',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 3,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 148.74,
            'pat_precio_emp' => 111.16,
            'pat_precio_esp' => 96.18,
            'pat_precio_dst' => 74.37,
            'pat_cod_tempo' => '0704',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 3,
            'pat_attr' => 5,
            'pat_imagen' => 41,
            'pat_precio_usr' => 263.22,
            'pat_precio_emp' => 197.42,
            'pat_precio_esp' => 171.10,
            'pat_precio_dst' => 131.61,
            'pat_cod_tempo' => '0081',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 3,
            'pat_attr' => 6,
            'pat_imagen' => 42,
            'pat_precio_usr' => 923.84,
            'pat_precio_emp' => 692.88,
            'pat_precio_esp' => 600.49,
            'pat_precio_dst' => 461.92,
            'pat_cod_tempo' => '0030',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 3,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1729.98,
            'pat_precio_emp' => 1297.48,
            'pat_precio_esp' => 1124.48,
            'pat_precio_dst' => 864.99,
            'pat_cod_tempo' => '0264',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 3,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 117.98,
            'pat_precio_emp' => 88.48,
            'pat_precio_esp' => 76.69,
            'pat_precio_dst' => 58.99,
            'pat_cod_tempo' => 'ISE25',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 4,
            'pat_attr' => 4,
            'pat_imagen' => 43,
            'pat_precio_usr' => 131.81,
            'pat_precio_emp' => 98.86,
            'pat_precio_esp' => 85.68,
            'pat_precio_dst' => 65.91,
            'pat_cod_tempo' => '91',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 4,
            'pat_attr' => 6,
            'pat_imagen' => 44,
            'pat_precio_usr' => 1015.96,
            'pat_precio_emp' => 761.97,
            'pat_precio_esp' => 660.37,
            'pat_precio_dst' => 507.98,
            'pat_cod_tempo' => '0031',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 4,
            'pat_attr' => 7,
            'pat_imagen' => 45,
            'pat_precio_usr' => 1903.09,
            'pat_precio_emp' => 1427.32,
            'pat_precio_esp' => 1237.01,
            'pat_precio_dst' => 951.55,
            'pat_cod_tempo' => '00006',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 4,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 142.09,
            'pat_precio_emp' => 106.57,
            'pat_precio_esp' => 92.36,
            'pat_precio_dst' => 71.05,
            'pat_cod_tempo' => 'ISE39',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 5,
            'pat_attr' => 5,
            'pat_imagen' => 46,
            'pat_precio_usr' => 171.03,
            'pat_precio_emp' => 128.27,
            'pat_precio_esp' => 111.17,
            'pat_precio_dst' => 85.51,
            'pat_cod_tempo' => '0070',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 5,
            'pat_attr' => 6,
            'pat_imagen' => 47,
            'pat_precio_usr' => 600.74,
            'pat_precio_emp' => 450.55,
            'pat_precio_esp' => 390.48,
            'pat_precio_dst' => 300.37,
            'pat_cod_tempo' => '0019',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 5,
            'pat_attr' => 7,
            'pat_imagen' => 48,
            'pat_precio_usr' => 1068.95,
            'pat_precio_emp' => 801.71,
            'pat_precio_esp' => 694.82,
            'pat_precio_dst' => 534.47,
            'pat_cod_tempo' => '0207',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 5,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 65.30,
            'pat_precio_emp' => 48.98,
            'pat_precio_esp' => 42.45,
            'pat_precio_dst' => 32.65,
            'pat_cod_tempo' => 'ISE15',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 6,
            'pat_attr' => 4,
            'pat_imagen' => 49,
            'pat_precio_usr' => 146.71,
            'pat_precio_emp' => 110.03,
            'pat_precio_esp' => 95.36,
            'pat_precio_dst' => 73.35,
            'pat_cod_tempo' => '0112',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 6,
            'pat_attr' => 5,
            'pat_imagen' => null,
            'pat_precio_usr' => 249.17,
            'pat_precio_emp' => 186.88,
            'pat_precio_esp' => 161.96,
            'pat_precio_dst' => 124.59,
            'pat_cod_tempo' => '0071',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 6,
            'pat_attr' => 6,
            'pat_imagen' => 50,
            'pat_precio_usr' => 973.11,
            'pat_precio_emp' => 729.83,
            'pat_precio_esp' => 632.52,
            'pat_precio_dst' => 486.56,
            'pat_cod_tempo' => '0020',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 6,
            'pat_attr' => 7,
            'pat_imagen' => 51,
            'pat_precio_usr' => 1814.04,
            'pat_precio_emp' => 1360.53,
            'pat_precio_esp' => 1179.13,
            'pat_precio_dst' => 907.02,
            'pat_cod_tempo' => '0250',
            'pat_estado' => 1,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 6,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 141.96,
            'pat_precio_emp' => 106.47,
            'pat_precio_esp' => 92.27,
            'pat_precio_dst' => 70.98,
            'pat_cod_tempo' => 'ISE16',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 7,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 153.50,
            'pat_precio_emp' => 115.13,
            'pat_precio_esp' => 199.78,
            'pat_precio_dst' => 76.75,
            'pat_cod_tempo' => '0699',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 7,
            'pat_attr' => 5,
            'pat_imagen' => 52,
            'pat_precio_usr' => 252.70,
            'pat_precio_emp' => 189.53,
            'pat_precio_esp' => 164.26,
            'pat_precio_dst' => 126.35,
            'pat_cod_tempo' => '0073',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 7,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 1010.11,
            'pat_precio_emp' => 757.58,
            'pat_precio_esp' => 656.57,
            'pat_precio_dst' => 505.05,
            'pat_cod_tempo' => '0022',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 7,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1831.57,
            'pat_precio_emp' => 1373.68,
            'pat_precio_esp' => 1190.52,
            'pat_precio_dst' => 915.79,
            'pat_cod_tempo' => '0252',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 7,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 150.86,
            'pat_precio_emp' => 113.15,
            'pat_precio_esp' => 98.06,
            'pat_precio_dst' => 75.43,
            'pat_cod_tempo' => 'ISE18',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 8,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 161.42,
            'pat_precio_emp' => 121.07,
            'pat_precio_esp' => 104.92,
            'pat_precio_dst' => 80.71,
            'pat_cod_tempo' => '0701',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 8,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 746.89,
            'pat_precio_emp' => 560.17,
            'pat_precio_esp' => 485.48,
            'pat_precio_dst' => 373.45,
            'pat_cod_tempo' => '0021',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 8,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1643.39,
            'pat_precio_emp' => 1232.54,
            'pat_precio_esp' => 1068.20,
            'pat_precio_dst' => 821.69,
            'pat_cod_tempo' => '0251',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 8,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 131.68,
            'pat_precio_emp' => 98.76,
            'pat_precio_esp' => 85.59,
            'pat_precio_dst' => 65.84,
            'pat_cod_tempo' => 'ISE17',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 9,
            'pat_attr' => 2,
            'pat_imagen' => null,
            'pat_precio_usr' => 130.71,
            'pat_precio_emp' => 98.03,
            'pat_precio_esp' => 84.96,
            'pat_precio_dst' => 65.35,
            'pat_cod_tempo' => '209',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 9,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 189.51,
            'pat_precio_emp' => 142.14,
            'pat_precio_esp' => 123.18,
            'pat_precio_dst' => 94.76,
            'pat_cod_tempo' => '0682',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 9,
            'pat_attr' => 5,
            'pat_imagen' => 53,
            'pat_precio_usr' => 324.44,
            'pat_precio_emp' => 243.33,
            'pat_precio_esp' => 210.89,
            'pat_precio_dst' => 162.22,
            'pat_cod_tempo' => '0074',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 9,
            'pat_attr' => 6,
            'pat_imagen' => 54,
            'pat_precio_usr' => 1386.37,
            'pat_precio_emp' => 1039.78,
            'pat_precio_esp' => 901.14,
            'pat_precio_dst' => 693.19,
            'pat_cod_tempo' => '0023',
            'pat_estado' => 1,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 9,
            'pat_attr' => 7,
            'pat_imagen' => 55,
            'pat_precio_usr' => 2657.75,
            'pat_precio_emp' => 1993.31,
            'pat_precio_esp' => 1727.54,
            'pat_precio_dst' => 1328.88,
            'pat_cod_tempo' => '0254',
            'pat_estado' => 1,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 9,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 222.63,
            'pat_precio_emp' => 166.97,
            'pat_precio_esp' => 144.71,
            'pat_precio_dst' => 111.31,
            'pat_cod_tempo' => 'ISE19',
            'pat_estado' => 0,
            'pat_orden' => 6,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 10,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 260.45,
            'pat_precio_emp' => 195.34,
            'pat_precio_esp' => 169.29,
            'pat_precio_dst' => 130.22,
            'pat_cod_tempo' => '298',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 10,
            'pat_attr' => 6,
            'pat_imagen' => 56,
            'pat_precio_usr' => 2185.80,
            'pat_precio_emp' => 1639.35,
            'pat_precio_esp' => 1420.77,
            'pat_precio_dst' => 1092.90,
            'pat_cod_tempo' => '0024',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 10,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 4210.95,
            'pat_precio_emp' => 3158.21,
            'pat_precio_esp' => 2737.12,
            'pat_precio_dst' => 2105.48,
            'pat_cod_tempo' => '0255',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 10,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 424.27,
            'pat_precio_emp' => 318.21,
            'pat_precio_esp' => 275.78,
            'pat_precio_dst' => 212.14,
            'pat_cod_tempo' => 'ISE20',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 11,
            'pat_attr' => 4,
            'pat_imagen' => 57,
            'pat_precio_usr' => 151.70,
            'pat_precio_emp' => 113.77,
            'pat_precio_esp' => 98.60,
            'pat_precio_dst' => 75.85,
            'pat_cod_tempo' => '0702',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 11,
            'pat_attr' => 6,
            'pat_imagen' => 58,
            'pat_precio_usr' => 1278.67,
            'pat_precio_emp' => 959.00,
            'pat_precio_esp' => 831.13,
            'pat_precio_dst' => 639.33,
            'pat_cod_tempo' => '0025',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 11,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 2234.97,
            'pat_precio_emp' => 1676.23,
            'pat_precio_esp' => 1452.73,
            'pat_precio_dst' => 1117.48,
            'pat_cod_tempo' => '0256',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 11,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 189.09,
            'pat_precio_emp' => 141.82,
            'pat_precio_esp' => 122.91,
            'pat_precio_dst' => 94.55,
            'pat_cod_tempo' => 'ISE21',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 12,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 128.77,
            'pat_precio_emp' => 96.58,
            'pat_precio_esp' => 83.70,
            'pat_precio_dst' => 64.38,
            'pat_cod_tempo' => '0102',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 12,
            'pat_attr' => 5,
            'pat_imagen' => 59,
            'pat_precio_usr' => 204.50,
            'pat_precio_emp' => 153.37,
            'pat_precio_esp' => 132.92,
            'pat_precio_dst' => 102.25,
            'pat_cod_tempo' => '0086',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 12,
            'pat_attr' => 6,
            'pat_imagen' => 60,
            'pat_precio_usr' => 702.87,
            'pat_precio_emp' => 527.15,
            'pat_precio_esp' => 456.87,
            'pat_precio_dst' => 351.44,
            'pat_cod_tempo' => '0035',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 12,
            'pat_attr' => 7,
            'pat_imagen' => 61,
            'pat_precio_usr' => 1302.58,
            'pat_precio_emp' => 976.93,
            'pat_precio_esp' => 846.67,
            'pat_precio_dst' => 651.29,
            'pat_cod_tempo' => '0257',
            'pat_estado' => 1,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 12,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 80.26,
            'pat_precio_emp' => 60.20,
            'pat_precio_esp' => 52.17,
            'pat_precio_dst' => 40.13,
            'pat_cod_tempo' => 'ISE28',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 13,
            'pat_attr' => 5,
            'pat_imagen' => 62,
            'pat_precio_usr' => 158.51,
            'pat_precio_emp' => 118.88,
            'pat_precio_esp' => 103.03,
            'pat_precio_dst' => 79.26,
            'pat_cod_tempo' => '0084',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 13,
            'pat_attr' => 6,
            'pat_imagen' => 63,
            'pat_precio_usr' => 479.78,
            'pat_precio_emp' => 359.84,
            'pat_precio_esp' => 311.86,
            'pat_precio_dst' => 239.89,
            'pat_cod_tempo' => '0033',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 13,
            'pat_attr' => 7,
            'pat_imagen' => 64,
            'pat_precio_usr' => 826.74,
            'pat_precio_emp' => 620.06,
            'pat_precio_esp' => 537.38,
            'pat_precio_dst' => 413.37,
            'pat_cod_tempo' => '0268',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 13,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 39.40,
            'pat_precio_emp' => 29.55,
            'pat_precio_esp' => 25.61,
            'pat_precio_dst' => 19.70,
            'pat_cod_tempo' => 'ISE26',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 14,
            'pat_attr' => 5,
            'pat_imagen' => 65,
            'pat_precio_usr' => 146.78,
            'pat_precio_emp' => 110.08,
            'pat_precio_esp' => 95.40,
            'pat_precio_dst' => 73.39,
            'pat_cod_tempo' => '0654',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 14,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 402.45,
            'pat_precio_emp' => 301.84,
            'pat_precio_esp' => 261.59,
            'pat_precio_dst' => 201.23,
            'pat_cod_tempo' => '0661',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 14,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 676.25,
            'pat_precio_emp' => 507.19,
            'pat_precio_esp' => 439.56,
            'pat_precio_dst' => 338.13,
            'pat_cod_tempo' => '00019',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 14,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 25.82,
            'pat_precio_emp' => 19.36,
            'pat_precio_esp' => 16.78,
            'pat_precio_dst' => 12.91,
            'pat_cod_tempo' => 'ISE59',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 15,
            'pat_attr' => 6,
            'pat_imagen' => 66,
            'pat_precio_usr' => 669.17,
            'pat_precio_emp' => 501.88,
            'pat_precio_esp' => 434.96,
            'pat_precio_dst' => 334.58,
            'pat_cod_tempo' => '0034',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 15,
            'pat_attr' => 7,
            'pat_imagen' => 67,
            'pat_precio_usr' => 1221.60,
            'pat_precio_emp' => 916.20,
            'pat_precio_esp' => 794.04,
            'pat_precio_dst' => 610.80,
            'pat_cod_tempo' => '0270',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 15,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 78.80,
            'pat_precio_emp' => 59.10,
            'pat_precio_esp' => 51.22,
            'pat_precio_dst' => 39.40,
            'pat_cod_tempo' => 'ISE27',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 16,
            'pat_attr' => 6,
            'pat_imagen' => 68,
            'pat_precio_usr' => 770.83,
            'pat_precio_emp' => 578.12,
            'pat_precio_esp' => 501.04,
            'pat_precio_dst' => 385.41,
            'pat_cod_tempo' => '0032',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 16,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1405.33,
            'pat_precio_emp' => 1054.00,
            'pat_precio_esp' => 913.46,
            'pat_precio_dst' => 702.66,
            'pat_cod_tempo' => '0624',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 16,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 99.18,
            'pat_precio_emp' => 74.39,
            'pat_precio_esp' => 64.47,
            'pat_precio_dst' => 49.59,
            'pat_cod_tempo' => 'MP78',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 17,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 1066.24,
            'pat_precio_emp' => 799.68,
            'pat_precio_esp' => 693.05,
            'pat_precio_dst' => 533.12,
            'pat_cod_tempo' => '0279',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 17,
            'pat_attr' => 7,
            'pat_imagen' => 69,
            'pat_precio_usr' => 2299.69,
            'pat_precio_emp' => 1724.77,
            'pat_precio_esp' => 1494.80,
            'pat_precio_dst' => 1149.85,
            'pat_cod_tempo' => '0108',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 17,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 170.10,
            'pat_precio_emp' => 127.58,
            'pat_precio_esp' => 110.57,
            'pat_precio_dst' => 85.09,
            'pat_cod_tempo' => 'ISE72',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 18,
            'pat_attr' => 6,
            'pat_imagen' => 70,
            'pat_precio_usr' => 1121.36,
            'pat_precio_emp' => 841.02,
            'pat_precio_esp' => 728.88,
            'pat_precio_dst' => 560.68,
            'pat_cod_tempo' => '0709',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 18,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 2440.12,
            'pat_precio_emp' => 1830.09,
            'pat_precio_esp' => 1586.08,
            'pat_precio_dst' => 1220.06,
            'pat_cod_tempo' => '124',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 18,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 185.06,
            'pat_precio_emp' => 138.80,
            'pat_precio_esp' => 120.29,
            'pat_precio_dst' => 92.53,
            'pat_cod_tempo' => 'ISE74',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 19,
            'pat_attr' => 2,
            'pat_imagen' => 71,
            'pat_precio_usr' => 107.87,
            'pat_precio_emp' => 80.90,
            'pat_precio_esp' => 70.12,
            'pat_precio_dst' => 53.93,
            'pat_cod_tempo' => '0687',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 19,
            'pat_attr' => 4,
            'pat_imagen' => 72,
            'pat_precio_usr' => 131.26,
            'pat_precio_emp' => 98.45,
            'pat_precio_esp' => 85.32,
            'pat_precio_dst' => 65.63,
            'pat_cod_tempo' => '0683',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 19,
            'pat_attr' => 5,
            'pat_imagen' => 73,
            'pat_precio_usr' => 208.93,
            'pat_precio_emp' => 156.70,
            'pat_precio_esp' => 135.81,
            'pat_precio_dst' => 104.47,
            'pat_cod_tempo' => '0697',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 19,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 733.49,
            'pat_precio_emp' => 550.12,
            'pat_precio_esp' => 476.77,
            'pat_precio_dst' => 366.75,
            'pat_cod_tempo' => '0692',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 19,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1349.83,
            'pat_precio_emp' => 1012.37,
            'pat_precio_esp' => 877.39,
            'pat_precio_dst' => 674.91,
            'pat_cod_tempo' => '',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 19,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 77.45,
            'pat_precio_emp' => 58.09,
            'pat_precio_esp' => 50.34,
            'pat_precio_dst' => 38.73,
            'pat_cod_tempo' => 'ISE73',
            'pat_estado' => 0,
            'pat_orden' => 6,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 20,
            'pat_attr' => 2,
            'pat_imagen' => null,
            'pat_precio_usr' => 101.79,
            'pat_precio_emp' => 76.34,
            'pat_precio_esp' => 66.16,
            'pat_precio_dst' => 50.90,
            'pat_cod_tempo' => '0688',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 20,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 132.21,
            'pat_precio_emp' => 99.16,
            'pat_precio_esp' => 85.94,
            'pat_precio_dst' => 66.11,
            'pat_cod_tempo' => '0705',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 20,
            'pat_attr' => 5,
            'pat_imagen' => 74,
            'pat_precio_usr' => 210.92,
            'pat_precio_emp' => 158.19,
            'pat_precio_esp' => 137.10,
            'pat_precio_dst' => 105.46,
            'pat_cod_tempo' => '0089',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 20,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 742.31,
            'pat_precio_emp' => 556.73,
            'pat_precio_esp' => 485.50,
            'pat_precio_dst' => 371.16,
            'pat_cod_tempo' => '0040',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 20,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1403.30,
            'pat_precio_emp' => 1052.48,
            'pat_precio_esp' => 912.15,
            'pat_precio_dst' => 701.65,
            'pat_cod_tempo' => '0274',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 20,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 79.36,
            'pat_precio_emp' => 59.52,
            'pat_precio_esp' => 51.58,
            'pat_precio_dst' => 39.68,
            'pat_cod_tempo' => 'ISE30',
            'pat_estado' => 0,
            'pat_orden' => 6,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 21,
            'pat_attr' => 2,
            'pat_imagen' => null,
            'pat_precio_usr' => 100.90,
            'pat_precio_emp' => 75.67,
            'pat_precio_esp' => 65.58,
            'pat_precio_dst' => 50.45,
            'pat_cod_tempo' => '0684',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 21,
            'pat_attr' => 4,
            'pat_imagen' => 75,
            'pat_precio_usr' => 126.68,
            'pat_precio_emp' => 95.01,
            'pat_precio_esp' => 82.34,
            'pat_precio_dst' => 63.34,
            'pat_cod_tempo' => '262',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 21,
            'pat_attr' => 5,
            'pat_imagen' => 76,
            'pat_precio_usr' => 197.15,
            'pat_precio_emp' => 147.87,
            'pat_precio_esp' => 128.15,
            'pat_precio_dst' => 98.58,
            'pat_cod_tempo' => '0088',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 21,
            'pat_attr' => 6,
            'pat_imagen' => 77,
            'pat_precio_usr' => 748.48,
            'pat_precio_emp' => 561.36,
            'pat_precio_esp' => 486.51,
            'pat_precio_dst' => 374.24,
            'pat_cod_tempo' => '0037',
            'pat_estado' => 1,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 21,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1298.58,
            'pat_precio_emp' => 973.93,
            'pat_precio_esp' => 844.08,
            'pat_precio_dst' => 649.29,
            'pat_cod_tempo' => '0271',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 21,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 73.72,
            'pat_precio_emp' => 55.29,
            'pat_precio_esp' => 47.92,
            'pat_precio_dst' => 36.86,
            'pat_cod_tempo' => 'ISE49',
            'pat_estado' => 0,
            'pat_orden' => 6,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 22,
            'pat_attr' => 2,
            'pat_imagen' => null,
            'pat_precio_usr' => 100.90,
            'pat_precio_emp' => 75.67,
            'pat_precio_esp' => 65.58,
            'pat_precio_dst' => 50.45,
            'pat_cod_tempo' => '0685',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 22,
            'pat_attr' => 4,
            'pat_imagen' => 78,
            'pat_precio_usr' => 126.68,
            'pat_precio_emp' => 95.01,
            'pat_precio_esp' => 82.34,
            'pat_precio_dst' => 63.34,
            'pat_cod_tempo' => '269',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 22,
            'pat_attr' => 5,
            'pat_imagen' => 79,
            'pat_precio_usr' => 197.15,
            'pat_precio_emp' => 147.87,
            'pat_precio_esp' => 128.15,
            'pat_precio_dst' => 98.58,
            'pat_cod_tempo' => '00012',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 22,
            'pat_attr' => 6,
            'pat_imagen' => 80,
            'pat_precio_usr' => 748.48,
            'pat_precio_emp' => 561.36,
            'pat_precio_esp' => 486.51,
            'pat_precio_dst' => 374.24,
            'pat_cod_tempo' => '0038',
            'pat_estado' => 1,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 22,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1298.58,
            'pat_precio_emp' => 973.93,
            'pat_precio_esp' => 844.08,
            'pat_precio_dst' => 649.29,
            'pat_cod_tempo' => '0272',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 22,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 73.72,
            'pat_precio_emp' => 55.29,
            'pat_precio_esp' => 47.92,
            'pat_precio_dst' => 36.86,
            'pat_cod_tempo' => 'ISE51',
            'pat_estado' => 0,
            'pat_orden' => 6,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 23,
            'pat_attr' => 2,
            'pat_imagen' => null,
            'pat_precio_usr' => 100.90,
            'pat_precio_emp' => 75.67,
            'pat_precio_esp' => 65.58,
            'pat_precio_dst' => 50.45,
            'pat_cod_tempo' => '0686',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 23,
            'pat_attr' => 4,
            'pat_imagen' => 81,
            'pat_precio_usr' => 126.68,
            'pat_precio_emp' => 95.01,
            'pat_precio_esp' => 82.34,
            'pat_precio_dst' => 63.34,
            'pat_cod_tempo' => '261',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 23,
            'pat_attr' => 5,
            'pat_imagen' => 82,
            'pat_precio_usr' => 197.15,
            'pat_precio_emp' => 147.87,
            'pat_precio_esp' => 128.15,
            'pat_precio_dst' => 98.58,
            'pat_cod_tempo' => '00010',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 23,
            'pat_attr' => 6,
            'pat_imagen' => 83,
            'pat_precio_usr' => 748.48,
            'pat_precio_emp' => 561.36,
            'pat_precio_esp' => 486.51,
            'pat_precio_dst' => 374.24,
            'pat_cod_tempo' => '0039',
            'pat_estado' => 1,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 23,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1298.58,
            'pat_precio_emp' => 973.93,
            'pat_precio_esp' => 844.08,
            'pat_precio_dst' => 649.29,
            'pat_cod_tempo' => '0273',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 23,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 73.72,
            'pat_precio_emp' => 55.29,
            'pat_precio_esp' => 47.92,
            'pat_precio_dst' => 36.86,
            'pat_cod_tempo' => 'ISE50',
            'pat_estado' => 0,
            'pat_orden' => 6,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 24,
            'pat_attr' => 5,
            'pat_imagen' => 84,
            'pat_precio_usr' => 206.91,
            'pat_precio_emp' => 155.18,
            'pat_precio_esp' => 134.49,
            'pat_precio_dst' => 103.45,
            'pat_cod_tempo' => '0689',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 24,
            'pat_attr' => 6,
            'pat_imagen' => 85,
            'pat_precio_usr' => 698.34,
            'pat_precio_emp' => 523.75,
            'pat_precio_esp' => 453.92,
            'pat_precio_dst' => 349.17,
            'pat_cod_tempo' => '0693',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 24,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1377.23,
            'pat_precio_emp' => 1032.92,
            'pat_precio_esp' => 895.20,
            'pat_precio_dst' => 688.62,
            'pat_cod_tempo' => '0710',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 24,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 86.56,
            'pat_precio_emp' => 64.92,
            'pat_precio_esp' => 56.26,
            'pat_precio_dst' => 43.28,
            'pat_cod_tempo' => 'ISE65',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 25,
            'pat_attr' => 5,
            'pat_imagen' => 86,
            'pat_precio_usr' => 207.38,
            'pat_precio_emp' => 155.53,
            'pat_precio_esp' => 134.80,
            'pat_precio_dst' => 103.69,
            'pat_cod_tempo' => '0690',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 25,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 719.01,
            'pat_precio_emp' => 539.26,
            'pat_precio_esp' => 467.35,
            'pat_precio_dst' => 359.50,
            'pat_cod_tempo' => '0694',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 25,
            'pat_attr' => 7,
            'pat_imagen' => 87,
            'pat_precio_usr' => 1381.49,
            'pat_precio_emp' => 1036.12,
            'pat_precio_esp' => 897.97,
            'pat_precio_dst' => 690.75,
            'pat_cod_tempo' => '103',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 25,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 86.94,
            'pat_precio_emp' => 65.21,
            'pat_precio_esp' => 56.51,
            'pat_precio_dst' => 43.47,
            'pat_cod_tempo' => 'ISE64',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 26,
            'pat_attr' => 5,
            'pat_imagen' => 88,
            'pat_precio_usr' => 168.47,
            'pat_precio_emp' => 126.35,
            'pat_precio_esp' => 109.50,
            'pat_precio_dst' => 84.23,
            'pat_cod_tempo' => '0100',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 26,
            'pat_attr' => 6,
            'pat_imagen' => 89,
            'pat_precio_usr' => 522.20,
            'pat_precio_emp' => 391.65,
            'pat_precio_esp' => 339.43,
            'pat_precio_dst' => 261.10,
            'pat_cod_tempo' => '0053',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 26,
            'pat_attr' => 7,
            'pat_imagen' => 90,
            'pat_precio_usr' => 907.68,
            'pat_precio_emp' => 680.76,
            'pat_precio_esp' => 589.99,
            'pat_precio_dst' => 453.84,
            'pat_cod_tempo' => '0276',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 26,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 45.07,
            'pat_precio_emp' => 33.80,
            'pat_precio_esp' => 29.30,
            'pat_precio_dst' => 22.54,
            'pat_cod_tempo' => 'ISE42',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 27,
            'pat_attr' => 5,
            'pat_imagen' => 91,
            'pat_precio_usr' => 168.94,
            'pat_precio_emp' => 126.70,
            'pat_precio_esp' => 109.81,
            'pat_precio_dst' => 84.47,
            'pat_cod_tempo' => '0691',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 27,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 524.77,
            'pat_precio_emp' => 393.58,
            'pat_precio_esp' => 341.10,
            'pat_precio_dst' => 262.38,
            'pat_cod_tempo' => '0678',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 27,
            'pat_attr' => 7,
            'pat_imagen' => 92,
            'pat_precio_usr' => 911.41,
            'pat_precio_emp' => 683.56,
            'pat_precio_esp' => 592.42,
            'pat_precio_dst' => 455.71,
            'pat_cod_tempo' => '067',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 27,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 45.09,
            'pat_precio_emp' => 33.82,
            'pat_precio_esp' => 29.31,
            'pat_precio_dst' => 22.55,
            'pat_cod_tempo' => 'ISE24',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 28,
            'pat_attr' => 2,
            'pat_imagen' => 93,
            'pat_precio_usr' => 304.50,
            'pat_precio_emp' => 228.37,
            'pat_precio_esp' => 197.92,
            'pat_precio_dst' => 152.25,
            'pat_cod_tempo' => '0087',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 28,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 379.97,
            'pat_precio_emp' => 284.98,
            'pat_precio_esp' => 246.98,
            'pat_precio_dst' => 189.99,
            'pat_cod_tempo' => '270',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 28,
            'pat_attr' => 6,
            'pat_imagen' => 147,
            'pat_precio_usr' => 2467.50,
            'pat_precio_emp' => 1850.63,
            'pat_precio_esp' => 1603.88,
            'pat_precio_dst' => 1233.75,
            'pat_cod_tempo' => '0054',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 28,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 5588.70,
            'pat_precio_emp' => 4191.53,
            'pat_precio_esp' => 3632.66,
            'pat_precio_dst' => 2794.35,
            'pat_cod_tempo' => '0278',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 28,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 498.94,
            'pat_precio_emp' => 374.20,
            'pat_precio_esp' => 324.31,
            'pat_precio_dst' => 249.47,
            'pat_cod_tempo' => 'ISE43',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 29,
            'pat_attr' => 2,
            'pat_imagen' => 93,
            'pat_precio_usr' => 304.50,
            'pat_precio_emp' => 228.37,
            'pat_precio_esp' => 197.92,
            'pat_precio_dst' => 152.25,
            'pat_cod_tempo' => '0091',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 29,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 379.97,
            'pat_precio_emp' => 284.98,
            'pat_precio_esp' => 246.98,
            'pat_precio_dst' => 189.99,
            'pat_cod_tempo' => '272',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 29,
            'pat_attr' => 6,
            'pat_imagen' => 148,
            'pat_precio_usr' => 2467.50,
            'pat_precio_emp' => 1850.63,
            'pat_precio_esp' => 1603.88,
            'pat_precio_dst' => 1233.75,
            'pat_cod_tempo' => '0055',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 29,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 5588.70,
            'pat_precio_emp' => 4191.53,
            'pat_precio_esp' => 3632.66,
            'pat_precio_dst' => 2794.35,
            'pat_cod_tempo' => '00014',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 29,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 498.94,
            'pat_precio_emp' => 374.20,
            'pat_precio_esp' => 324.31,
            'pat_precio_dst' => 249.47,
            'pat_cod_tempo' => 'ISE02',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 30,
            'pat_attr' => 2,
            'pat_imagen' => 93,
            'pat_precio_usr' => 304.50,
            'pat_precio_emp' => 228.37,
            'pat_precio_esp' => 197.92,
            'pat_precio_dst' => 152.25,
            'pat_cod_tempo' => '0098',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 30,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 379.97,
            'pat_precio_emp' => 284.98,
            'pat_precio_esp' => 246.98,
            'pat_precio_dst' => 189.99,
            'pat_cod_tempo' => '273',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 30,
            'pat_attr' => 6,
            'pat_imagen' => 94,
            'pat_precio_usr' => 2696.81,
            'pat_precio_emp' => 2022.61,
            'pat_precio_esp' => 1752.93,
            'pat_precio_dst' => 1348.40,
            'pat_cod_tempo' => '0056',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 30,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 5588.70,
            'pat_precio_emp' => 4191.53,
            'pat_precio_esp' => 3632.66,
            'pat_precio_dst' => 2794.35,
            'pat_cod_tempo' => '00005',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 30,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 498.94,
            'pat_precio_emp' => 374.20,
            'pat_precio_esp' => 324.31,
            'pat_precio_dst' => 249.47,
            'pat_cod_tempo' => 'ISE05',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 31,
            'pat_attr' => 5,
            'pat_imagen' => null,
            'pat_precio_usr' => 160.43,
            'pat_precio_emp' => 120.32,
            'pat_precio_esp' => 104.28,
            'pat_precio_dst' => 80.22,
            'pat_cod_tempo' => '0060',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 31,
            'pat_attr' => 6,
            'pat_imagen' => 95,
            'pat_precio_usr' => 408.80,
            'pat_precio_emp' => 306.60,
            'pat_precio_esp' => 265.72,
            'pat_precio_dst' => 204.40,
            'pat_cod_tempo' => '0002',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 31,
            'pat_attr' => 7,
            'pat_imagen' => 96,
            'pat_precio_usr' => 679.22,
            'pat_precio_emp' => 509.42,
            'pat_precio_esp' => 441.49,
            'pat_precio_dst' => 339.61,
            'pat_cod_tempo' => '0105',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 31,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 20.20,
            'pat_precio_emp' => 15.15,
            'pat_precio_esp' => 13.13,
            'pat_precio_dst' => 10.10,
            'pat_cod_tempo' => 'ISE01',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 32,
            'pat_attr' => 5,
            'pat_imagen' => 97,
            'pat_precio_usr' => 187.72,
            'pat_precio_emp' => 140.79,
            'pat_precio_esp' => 122.02,
            'pat_precio_dst' => 93.86,
            'pat_cod_tempo' => '0069',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 32,
            'pat_attr' => 10,
            'pat_imagen' => 98,
            'pat_precio_usr' => 364.83,
            'pat_precio_emp' => 273.63,
            'pat_precio_esp' => 237.14,
            'pat_precio_dst' => 182.42,
            'pat_cod_tempo' => '0695',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 32,
            'pat_attr' => 6,
            'pat_imagen' => 99,
            'pat_precio_usr' => 551.38,
            'pat_precio_emp' => 413.53,
            'pat_precio_esp' => 358.40,
            'pat_precio_dst' => 275.69,
            'pat_cod_tempo' => '0003',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 32,
            'pat_attr' => 7,
            'pat_imagen' => 100,
            'pat_precio_usr' => 1002.71,
            'pat_precio_emp' => 752.04,
            'pat_precio_esp' => 651.76,
            'pat_precio_dst' => 501.36,
            'pat_cod_tempo' => '0209',
            'pat_estado' => 1,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 32,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 57.44,
            'pat_precio_emp' => 43.08,
            'pat_precio_esp' => 37.34,
            'pat_precio_dst' => 28.22,
            'pat_cod_tempo' => 'ISE54',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 33,
            'pat_attr' => 5,
            'pat_imagen' => 101,
            'pat_precio_usr' => 125.37,
            'pat_precio_emp' => 94.03,
            'pat_precio_esp' => 81.49,
            'pat_precio_dst' => 62.68,
            'pat_cod_tempo' => '0062',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 33,
            'pat_attr' => 6,
            'pat_imagen' => 102,
            'pat_precio_usr' => 387.41,
            'pat_precio_emp' => 290.56,
            'pat_precio_esp' => 251.82,
            'pat_precio_dst' => 193.71,
            'pat_cod_tempo' => '0004',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 33,
            'pat_attr' => 7,
            'pat_imagen' => 103,
            'pat_precio_usr' => 637.45,
            'pat_precio_emp' => 478.09,
            'pat_precio_esp' => 414.35,
            'pat_precio_dst' => 318.73,
            'pat_cod_tempo' => '0200',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 33,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 20.07,
            'pat_precio_emp' => 15.06,
            'pat_precio_esp' => 13.05,
            'pat_precio_dst' => 10.04,
            'pat_cod_tempo' => 'ISE03',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 34,
            'pat_attr' => 5,
            'pat_imagen' => null,
            'pat_precio_usr' => 125.37,
            'pat_precio_emp' => 94.03,
            'pat_precio_esp' => 81.49,
            'pat_precio_dst' => 62.68,
            'pat_cod_tempo' => '00011',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 34,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 387.41,
            'pat_precio_emp' => 290.56,
            'pat_precio_esp' => 251.82,
            'pat_precio_dst' => 193.71,
            'pat_cod_tempo' => '0005',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 34,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 637.45,
            'pat_precio_emp' => 478.09,
            'pat_precio_esp' => 414.35,
            'pat_precio_dst' => 318.73,
            'pat_cod_tempo' => '0201',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 34,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 20.07,
            'pat_precio_emp' => 15.06,
            'pat_precio_esp' => 13.05,
            'pat_precio_dst' => 10.04,
            'pat_cod_tempo' => 'ISE56',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 35,
            'pat_attr' => 5,
            'pat_imagen' => 104,
            'pat_precio_usr' => 125.37,
            'pat_precio_emp' => 94.03,
            'pat_precio_esp' => 81.49,
            'pat_precio_dst' => 62.68,
            'pat_cod_tempo' => '0202',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 35,
            'pat_attr' => 6,
            'pat_imagen' => 105,
            'pat_precio_usr' => 387.41,
            'pat_precio_emp' => 290.56,
            'pat_precio_esp' => 251.82,
            'pat_precio_dst' => 193.71,
            'pat_cod_tempo' => '0006',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 35,
            'pat_attr' => 7,
            'pat_imagen' => 106,
            'pat_precio_usr' => 637.45,
            'pat_precio_emp' => 478.09,
            'pat_precio_esp' => 414.35,
            'pat_precio_dst' => 318.73,
            'pat_cod_tempo' => '000016',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 35,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 20.07,
            'pat_precio_emp' => 15.06,
            'pat_precio_esp' => 13.05,
            'pat_precio_dst' => 10.04,
            'pat_cod_tempo' => 'ISE04',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 36,
            'pat_attr' => 5,
            'pat_imagen' => 107,
            'pat_precio_usr' => 125.37,
            'pat_precio_emp' => 94.03,
            'pat_precio_esp' => 81.49,
            'pat_precio_dst' => 62.68,
            'pat_cod_tempo' => '0203',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 36,
            'pat_attr' => 6,
            'pat_imagen' => 108,
            'pat_precio_usr' => 387.41,
            'pat_precio_emp' => 290.56,
            'pat_precio_esp' => 251.82,
            'pat_precio_dst' => 193.71,
            'pat_cod_tempo' => '0603',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 36,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 637.45,
            'pat_precio_emp' => 478.09,
            'pat_precio_esp' => 414.35,
            'pat_precio_dst' => 318.73,
            'pat_cod_tempo' => '0604',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 36,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 20.07,
            'pat_precio_emp' => 15.06,
            'pat_precio_esp' => 13.05,
            'pat_precio_dst' => 10.04,
            'pat_cod_tempo' => 'ISE61',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 37,
            'pat_attr' => 5,
            'pat_imagen' => 109,
            'pat_precio_usr' => 125.37,
            'pat_precio_emp' => 94.03,
            'pat_precio_esp' => 81.49,
            'pat_precio_dst' => 62.68,
            'pat_cod_tempo' => '0670',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 37,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 387.41,
            'pat_precio_emp' => 290.56,
            'pat_precio_esp' => 251.82,
            'pat_precio_dst' => 193.71,
            'pat_cod_tempo' => '0629',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 37,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 637.45,
            'pat_precio_emp' => 478.09,
            'pat_precio_esp' => 414.35,
            'pat_precio_dst' => 318.73,
            'pat_cod_tempo' => '0007',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 37,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 20.07,
            'pat_precio_emp' => 15.06,
            'pat_precio_esp' => 13.05,
            'pat_precio_dst' => 10.04,
            'pat_cod_tempo' => 'ISE67',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 38,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 739.71,
            'pat_precio_emp' => 554.79,
            'pat_precio_esp' => 480.81,
            'pat_precio_dst' => 369.86,
            'pat_cod_tempo' => '0008',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 38,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1373.93,
            'pat_precio_emp' => 1030.45,
            'pat_precio_esp' => 893.06,
            'pat_precio_dst' => 686.97,
            'pat_cod_tempo' => '0606',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 38,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 91.97,
            'pat_precio_emp' => 68.97,
            'pat_precio_esp' => 59.78,
            'pat_precio_dst' => 45.98,
            'pat_cod_tempo' => 'ISE06',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 39,
            'pat_attr' => 6,
            'pat_imagen' => 110,
            'pat_precio_usr' => 739.71,
            'pat_precio_emp' => 554.79,
            'pat_precio_esp' => 480.81,
            'pat_precio_dst' => 369.86,
            'pat_cod_tempo' => '0009',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 39,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1373.93,
            'pat_precio_emp' => 1030.45,
            'pat_precio_esp' => 893.06,
            'pat_precio_dst' => 686.97,
            'pat_cod_tempo' => '0605',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 39,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 91.97,
            'pat_precio_emp' => 68.97,
            'pat_precio_esp' => 59.78,
            'pat_precio_dst' => 45.98,
            'pat_cod_tempo' => 'ISE08',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 40,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 739.71,
            'pat_precio_emp' => 554.79,
            'pat_precio_esp' => 480.81,
            'pat_precio_dst' => 369.86,
            'pat_cod_tempo' => '0010',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 40,
            'pat_attr' => 7,
            'pat_imagen' => 111,
            'pat_precio_usr' => 1373.93,
            'pat_precio_emp' => 1030.45,
            'pat_precio_esp' => 893.06,
            'pat_precio_dst' => 686.97,
            'pat_cod_tempo' => '0607',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 40,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 91.97,
            'pat_precio_emp' => 68.97,
            'pat_precio_esp' => 59.78,
            'pat_precio_dst' => 45.98,
            'pat_cod_tempo' => 'ISE07',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 41,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 739.71,
            'pat_precio_emp' => 554.79,
            'pat_precio_esp' => 480.81,
            'pat_precio_dst' => 369.86,
            'pat_cod_tempo' => '0011',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 41,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1373.93,
            'pat_precio_emp' => 1030.45,
            'pat_precio_esp' => 893.06,
            'pat_precio_dst' => 686.97,
            'pat_cod_tempo' => '0610',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 41,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 91.97,
            'pat_precio_emp' => 68.97,
            'pat_precio_esp' => 59.78,
            'pat_precio_dst' => 45.98,
            'pat_cod_tempo' => 'ISE62',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 42,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 739.71,
            'pat_precio_emp' => 554.79,
            'pat_precio_esp' => 480.81,
            'pat_precio_dst' => 369.86,
            'pat_cod_tempo' => '0609',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 42,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1373.93,
            'pat_precio_emp' => 1030.45,
            'pat_precio_esp' => 893.06,
            'pat_precio_dst' => 686.97,
            'pat_cod_tempo' => '',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 42,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 91.97,
            'pat_precio_emp' => 68.97,
            'pat_precio_esp' => 59.78,
            'pat_precio_dst' => 45.98,
            'pat_cod_tempo' => 'ISE66',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 43,
            'pat_attr' => 4,
            'pat_imagen' => 112,
            'pat_precio_usr' => 286.35,
            'pat_precio_emp' => 214.76,
            'pat_precio_esp' => 186.13,
            'pat_precio_dst' => 143.18,
            'pat_cod_tempo' => '279',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 43,
            'pat_attr' => 5,
            'pat_imagen' => 113,
            'pat_precio_usr' => 438.71,
            'pat_precio_emp' => 329.03,
            'pat_precio_esp' => 285.16,
            'pat_precio_dst' => 219.35,
            'pat_cod_tempo' => '0066',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 43,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 1884.94,
            'pat_precio_emp' => 1413.71,
            'pat_precio_esp' => 1225.21,
            'pat_precio_dst' => 942.47,
            'pat_cod_tempo' => '0015',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 43,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 4036.18,
            'pat_precio_emp' => 3027.13,
            'pat_precio_esp' => 2623.51,
            'pat_precio_dst' => 2018.09,
            'pat_cod_tempo' => '0612',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 43,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 338.36,
            'pat_precio_emp' => 253.77,
            'pat_precio_esp' => 219.94,
            'pat_precio_dst' => 169.18,
            'pat_cod_tempo' => 'ISE12',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 44,
            'pat_attr' => 4,
            'pat_imagen' => 114,
            'pat_precio_usr' => 149.80,
            'pat_precio_emp' => 112.35,
            'pat_precio_esp' => 97.37,
            'pat_precio_dst' => 74.90,
            'pat_cod_tempo' => '0116',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 44,
            'pat_attr' => 6,
            'pat_imagen' => 115,
            'pat_precio_usr' => 872.25,
            'pat_precio_emp' => 654.19,
            'pat_precio_esp' => 566.96,
            'pat_precio_dst' => 436.13,
            'pat_cod_tempo' => '0.17',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 44,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 1688.01,
            'pat_precio_emp' => 1266.01,
            'pat_precio_esp' => 1097.21,
            'pat_precio_dst' => 844.01,
            'pat_cod_tempo' => '0614',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 44,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 107.23,
            'pat_precio_emp' => 80.42,
            'pat_precio_esp' => 69.70,
            'pat_precio_dst' => 53.62,
            'pat_cod_tempo' => 'ISE14',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 45,
            'pat_attr' => 4,
            'pat_imagen' => 116,
            'pat_precio_usr' => 155.52,
            'pat_precio_emp' => 116.64,
            'pat_precio_esp' => 101.09,
            'pat_precio_dst' => 77.76,
            'pat_cod_tempo' => '207',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 45,
            'pat_attr' => 5,
            'pat_imagen' => 117,
            'pat_precio_usr' => 237.51,
            'pat_precio_emp' => 178.13,
            'pat_precio_esp' => 154.38,
            'pat_precio_dst' => 118.75,
            'pat_cod_tempo' => '0092',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 45,
            'pat_attr' => 6,
            'pat_imagen' => 118,
            'pat_precio_usr' => 878.93,
            'pat_precio_emp' => 659.20,
            'pat_precio_esp' => 571.31,
            'pat_precio_dst' => 439.47,
            'pat_cod_tempo' => '0043',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 45,
            'pat_attr' => 7,
            'pat_imagen' => null,
            'pat_precio_usr' => 2306.40,
            'pat_precio_emp' => 1729.80,
            'pat_precio_esp' => 1499.16,
            'pat_precio_dst' => 1153.20,
            'pat_cod_tempo' => '100',
            'pat_estado' => 1,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 45,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 254.50,
            'pat_precio_emp' => 190.88,
            'pat_precio_esp' => 165.43,
            'pat_precio_dst' => 127.25,
            'pat_cod_tempo' => 'ISE32',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 46,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 224.67,
            'pat_precio_emp' => 168.51,
            'pat_precio_esp' => 146.04,
            'pat_precio_dst' => 112.34,
            'pat_cod_tempo' => '263',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 46,
            'pat_attr' => 5,
            'pat_imagen' => 119,
            'pat_precio_usr' => 394.14,
            'pat_precio_emp' => 295.61,
            'pat_precio_esp' => 256.19,
            'pat_precio_dst' => 197.07,
            'pat_cod_tempo' => '0093',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 46,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 1759.28,
            'pat_precio_emp' => 1319.46,
            'pat_precio_esp' => 1143.53,
            'pat_precio_dst' => 879.64,
            'pat_cod_tempo' => '0044',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 46,
            'pat_attr' => 7,
            'pat_imagen' => 120,
            'pat_precio_usr' => 3322.32,
            'pat_precio_emp' => 2491.74,
            'pat_precio_esp' => 2159.51,
            'pat_precio_dst' => 1661.16,
            'pat_cod_tempo' => '617',
            'pat_estado' => 1,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 46,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 263.58,
            'pat_precio_emp' => 197.68,
            'pat_precio_esp' => 171.33,
            'pat_precio_dst' => 131.79,
            'pat_cod_tempo' => 'ISE36',
            'pat_estado' => 0,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 47,
            'pat_attr' => 4,
            'pat_imagen' => 121,
            'pat_precio_usr' => 241.96,
            'pat_precio_emp' => 181.47,
            'pat_precio_esp' => 151.27,
            'pat_precio_dst' => 120.98,
            'pat_cod_tempo' => '0077',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 47,
            'pat_attr' => 5,
            'pat_imagen' => 122,
            'pat_precio_usr' => 429.97,
            'pat_precio_emp' => 322.48,
            'pat_precio_esp' => 279.48,
            'pat_precio_dst' => 214.99,
            'pat_cod_tempo' => '0096',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 47,
            'pat_attr' => 6,
            'pat_imagen' => 123,
            'pat_precio_usr' => 1884.94,
            'pat_precio_emp' => 1413.71,
            'pat_precio_esp' => 1225.21,
            'pat_precio_dst' => 942.47,
            'pat_cod_tempo' => '0036',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 47,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 421.72,
            'pat_precio_emp' => 316.29,
            'pat_precio_esp' => 274.12,
            'pat_precio_dst' => 210.86,
            'pat_cod_tempo' => 'ISE52',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 48,
            'pat_attr' => 4,
            'pat_imagen' => 124,
            'pat_precio_usr' => 142.75,
            'pat_precio_emp' => 107.06,
            'pat_precio_esp' => 92.79,
            'pat_precio_dst' => 71.37,
            'pat_cod_tempo' => '0706',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 48,
            'pat_attr' => 5,
            'pat_imagen' => 125,
            'pat_precio_usr' => 233.70,
            'pat_precio_emp' => 175.28,
            'pat_precio_esp' => 151.91,
            'pat_precio_dst' => 116.85,
            'pat_cod_tempo' => '0097',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 48,
            'pat_attr' => 6,
            'pat_imagen' => 126,
            'pat_precio_usr' => 896.59,
            'pat_precio_emp' => 672.44,
            'pat_precio_esp' => 582.79,
            'pat_precio_dst' => 448.30,
            'pat_cod_tempo' => '0050',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 48,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 108.85,
            'pat_precio_emp' => 81.64,
            'pat_precio_esp' => 70.75,
            'pat_precio_dst' => 54.43,
            'pat_cod_tempo' => 'ISE40',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 49,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 162.65,
            'pat_precio_emp' => 121.99,
            'pat_precio_esp' => 105.72,
            'pat_precio_dst' => 81.33,
            'pat_cod_tempo' => '208',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 49,
            'pat_attr' => 5,
            'pat_imagen' => 127,
            'pat_precio_usr' => 222.47,
            'pat_precio_emp' => 166.85,
            'pat_precio_esp' => 144.61,
            'pat_precio_dst' => 111.24,
            'pat_cod_tempo' => '0103',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 49,
            'pat_attr' => 6,
            'pat_imagen' => null,
            'pat_precio_usr' => 723.39,
            'pat_precio_emp' => 542.54,
            'pat_precio_esp' => 470.20,
            'pat_precio_dst' => 361.69,
            'pat_cod_tempo' => '00015',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 49,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 134.60,
            'pat_precio_emp' => 100.95,
            'pat_precio_esp' => 87.49,
            'pat_precio_dst' => 67.30,
            'pat_cod_tempo' => 'ISE45',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 50,
            'pat_attr' => 4,
            'pat_imagen' => 128,
            'pat_precio_usr' => 599.72,
            'pat_precio_emp' => 449.79,
            'pat_precio_esp' => 389.82,
            'pat_precio_dst' => 299.86,
            'pat_cod_tempo' => '00901',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 50,
            'pat_attr' => 5,
            'pat_imagen' => 129,
            'pat_precio_usr' => 1138.11,
            'pat_precio_emp' => 853.58,
            'pat_precio_esp' => 739.77,
            'pat_precio_dst' => 569.05,
            'pat_cod_tempo' => '0104',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 50,
            'pat_attr' => 6,
            'pat_imagen' => 130,
            'pat_precio_usr' => 5090.61,
            'pat_precio_emp' => 3817.96,
            'pat_precio_esp' => 3308.90,
            'pat_precio_dst' => 2545.31,
            'pat_cod_tempo' => '123',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 50,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 1011.43,
            'pat_precio_emp' => 758.57,
            'pat_precio_esp' => 657.43,
            'pat_precio_dst' => 505.71,
            'pat_cod_tempo' => 'ISE46',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 51,
            'pat_attr' => 4,
            'pat_imagen' => 131,
            'pat_precio_usr' => 731.22,
            'pat_precio_emp' => 548.41,
            'pat_precio_esp' => 475.29,
            'pat_precio_dst' => 365.61,
            'pat_cod_tempo' => '0708',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 51,
            'pat_attr' => 5,
            'pat_imagen' => 132,
            'pat_precio_usr' => 1408.11,
            'pat_precio_emp' => 1056.08,
            'pat_precio_esp' => 915.27,
            'pat_precio_dst' => 704.05,
            'pat_cod_tempo' => '0301',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 51,
            'pat_attr' => 6,
            'pat_imagen' => 133,
            'pat_precio_usr' => 6426.94,
            'pat_precio_emp' => 4820.21,
            'pat_precio_esp' => 4177.51,
            'pat_precio_dst' => 3213.47,
            'pat_cod_tempo' => '0601',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 51,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 1281.43,
            'pat_precio_emp' => 961.07,
            'pat_precio_esp' => 832.93,
            'pat_precio_dst' => 640.71,
            'pat_cod_tempo' => 'ISE47',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 52,
            'pat_attr' => 4,
            'pat_imagen' => 134,
            'pat_precio_usr' => 311.09,
            'pat_precio_emp' => 233.32,
            'pat_precio_esp' => 202.21,
            'pat_precio_dst' => 155.54,
            'pat_cod_tempo' => '0707',
            'pat_estado' => 1,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 52,
            'pat_attr' => 5,
            'pat_imagen' => 135,
            'pat_precio_usr' => 438.71,
            'pat_precio_emp' => 329.03,
            'pat_precio_esp' => 285.16,
            'pat_precio_dst' => 219.35,
            'pat_cod_tempo' => '0106',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 52,
            'pat_attr' => 6,
            'pat_imagen' => 136,
            'pat_precio_usr' => 1696.45,
            'pat_precio_emp' => 1272.34,
            'pat_precio_esp' => 1102.69,
            'pat_precio_dst' => 848.23,
            'pat_cod_tempo' => '30',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 52,
            'pat_attr' => 8,
            'pat_imagen' => null,
            'pat_precio_usr' => 509.58,
            'pat_precio_emp' => 382.19,
            'pat_precio_esp' => 331.23,
            'pat_precio_dst' => 254.79,
            'pat_cod_tempo' => 'ISE48',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 53,
            'pat_attr' => 1,
            'pat_imagen' => null,
            'pat_precio_usr' => 223.50,
            'pat_precio_emp' => 167.63,
            'pat_precio_esp' => 145.28,
            'pat_precio_dst' => 111.75,
            'pat_cod_tempo' => '0674',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 53,
            'pat_attr' => 11,
            'pat_imagen' => 137,
            'pat_precio_usr' => 280.72,
            'pat_precio_emp' => 210.54,
            'pat_precio_esp' => 182.47,
            'pat_precio_dst' => 140.36,
            'pat_cod_tempo' => '0657',
            'pat_estado' => 1,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 53,
            'pat_attr' => 14,
            'pat_imagen' => null,
            'pat_precio_usr' => 432.96,
            'pat_precio_emp' => 324.72,
            'pat_precio_esp' => 281.42,
            'pat_precio_dst' => 216.48,
            'pat_cod_tempo' => '0672',
            'pat_estado' => 0,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 53,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 209.74,
            'pat_precio_emp' => 157.30,
            'pat_precio_esp' => 136.33,
            'pat_precio_dst' => 104.87,
            'pat_cod_tempo' => '0659',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 53,
            'pat_attr' => 9,
            'pat_imagen' => 139,
            'pat_precio_usr' => 451.10,
            'pat_precio_emp' => 338.32,
            'pat_precio_esp' => 293.21,
            'pat_precio_dst' => 225.55,
            'pat_cod_tempo' => '0644',
            'pat_estado' => 1,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 53,
            'pat_attr' => 12,
            'pat_imagen' => 138,
            'pat_precio_usr' => 301.46,
            'pat_precio_emp' => 226.09,
            'pat_precio_esp' => 195.95,
            'pat_precio_dst' => 150.73,
            'pat_cod_tempo' => '0676',
            'pat_estado' => 1,
            'pat_orden' => 6,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 53,
            'pat_attr' => 5,
            'pat_imagen' => null,
            'pat_precio_usr' => 353.75,
            'pat_precio_emp' => 265.31,
            'pat_precio_esp' => 229.94,
            'pat_precio_dst' => 176.87,
            'pat_cod_tempo' => '0646',
            'pat_estado' => 0,
            'pat_orden' => 7,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 53,
            'pat_attr' => 10,
            'pat_imagen' => null,
            'pat_precio_usr' => 595.11,
            'pat_precio_emp' => 446.33,
            'pat_precio_esp' => 386.82,
            'pat_precio_dst' => 297.55,
            'pat_cod_tempo' => '0647',
            'pat_estado' => 0,
            'pat_orden' => 8,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 53,
            'pat_attr' => 6,
            'pat_imagen' => 140,
            'pat_precio_usr' => 1625.56,
            'pat_precio_emp' => 1219.17,
            'pat_precio_esp' => 1056.61,
            'pat_precio_dst' => 812.78,
            'pat_cod_tempo' => '0640',
            'pat_estado' => 1,
            'pat_orden' => 9,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 53,
            'pat_attr' => 7,
            'pat_imagen' => 141,
            'pat_precio_usr' => 2762.04,
            'pat_precio_emp' => 2071.53,
            'pat_precio_esp' => 1795.33,
            'pat_precio_dst' => 1381.02,
            'pat_cod_tempo' => '0658',
            'pat_estado' => 1,
            'pat_orden' => 10,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 54,
            'pat_attr' => 1,
            'pat_imagen' => null,
            'pat_precio_usr' => 184.37,
            'pat_precio_emp' => 138.28,
            'pat_precio_esp' => 119.84,
            'pat_precio_dst' => 92.19,
            'pat_cod_tempo' => '0630',
            'pat_estado' => 0,
            'pat_orden' => 1,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 54,
            'pat_attr' => 2,
            'pat_imagen' => null,
            'pat_precio_usr' => 265.89,
            'pat_precio_emp' => 199.42,
            'pat_precio_esp' => 172.83,
            'pat_precio_dst' => 132.95,
            'pat_cod_tempo' => '0634',
            'pat_estado' => 0,
            'pat_orden' => 2,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 54,
            'pat_attr' => 15,
            'pat_imagen' => 142,
            'pat_precio_usr' => 352.54,
            'pat_precio_emp' => 264.41,
            'pat_precio_esp' => 229.15,
            'pat_precio_dst' => 176.27,
            'pat_cod_tempo' => '0632',
            'pat_estado' => 1,
            'pat_orden' => 3,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 54,
            'pat_attr' => 4,
            'pat_imagen' => null,
            'pat_precio_usr' => 281.67,
            'pat_precio_emp' => 211.25,
            'pat_precio_esp' => 183.08,
            'pat_precio_dst' => 140.83,
            'pat_cod_tempo' => '0642',
            'pat_estado' => 0,
            'pat_orden' => 4,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 54,
            'pat_attr' => 16,
            'pat_imagen' => 143,
            'pat_precio_usr' => 460.95,
            'pat_precio_emp' => 345.71,
            'pat_precio_esp' => 299.62,
            'pat_precio_dst' => 230.47,
            'pat_cod_tempo' => '0631',
            'pat_estado' => 1,
            'pat_orden' => 5,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 54,
            'pat_attr' => 5,
            'pat_imagen' => null,
            'pat_precio_usr' => 503.36,
            'pat_precio_emp' => 377.52,
            'pat_precio_esp' => 327.18,
            'pat_precio_dst' => 251.68,
            'pat_cod_tempo' => '0090',
            'pat_estado' => 0,
            'pat_orden' => 6,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 54,
            'pat_attr' => 6,
            'pat_imagen' => 144,
            'pat_precio_usr' => 2003.56,
            'pat_precio_emp' => 1502.67,
            'pat_precio_esp' => 1302.31,
            'pat_precio_dst' => 1001.78,
            'pat_cod_tempo' => '0041',
            'pat_estado' => 1,
            'pat_orden' => 7,
            'pat_add' => 1
        ]);

        DB::table('productos_atributos')->insert([
            'pat_prod' => 54,
            'pat_attr' => 7,
            'pat_imagen' => 145,
            'pat_precio_usr' => 3824.93,
            'pat_precio_emp' => 2868.70,
            'pat_precio_esp' => 2486.21,
            'pat_precio_dst' => 1912.47,
            'pat_cod_tempo' => '0616',
            'pat_estado' => 1,
            'pat_orden' => 8,
            'pat_add' => 1
        ]);

    }
}