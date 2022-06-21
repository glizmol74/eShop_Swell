<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use App\Models\User;

class Sliders extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::table('bibliotecas')->truncate();
        if ( 1 == 1) {
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Informacion.jpg',
                'bib_url' => '/storage/sliders/home/Informacion.jpeg',
                'bib_add' => '1',
            ]); // 1
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Informacion_m.jpg',
                'bib_url' => '/storage/sliders/home/Informacion_m.jpeg',
                'bib_add' => '1',
            ]); //2
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpieza.jpg',
                'bib_url' => '/storage/sliders/home/Limpieza.jpeg',
                'bib_add' => '1',
            ]); //3
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpieza_m.jpg',
                'bib_url' => '/storage/sliders/home/Limpieza_m.jpeg',
                'bib_add' => '1',
            ]); //4
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Higiene.jpg',
                'bib_url' => '/storage/sliders/home/Higiene.jpeg',
                'bib_add' => '1',
            ]); //5
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Higiene_m.jpg',
                'bib_url' => '/storage/sliders/home/Higiene_m.jpeg',
                'bib_add' => '1',
            ]); //6
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'industria.jpg',
                'bib_url' => '/storage/sliders/home/industria.jpg',
                'bib_add' => '1',
            ]); //7
    
    
            // imagenes de categoria
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'cuida_tu_ropa.jpg',
                'bib_url' => '/storage/sliders/categoria/cuida_tu_ropa.jpg',
                'bib_add' => '1',
            ]); //8
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Cobranding.jpeg',
                'bib_url' => '/storage/sliders/categoria/Cobranding.jpeg',
                'bib_add' => '1',
            ]); //9
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Hogar_Radiante.jpeg',
                'bib_url' => '/storage/sliders/categoria/hogar_radiante.jpg',
                'bib_add' => '1',
            ]); //10
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'banner_inf.jpg',
                'bib_url' => '/storage/sliders/categoria/banner_inf_m.jpeg',
                'bib_add' => '1',
            ]); //11
    
            // imagenes para Cobranding
            DB::table('bibliotecas')->insert([
                'bib_nombre' => '01.jpg',
                'bib_url' => '/storage/images/cobranding/01.jpg',
                'bib_add' => '1',
            ]); //12
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => '02.jpg',
                'bib_url' => '/storage/images/cobranding/02.jpg',
                'bib_add' => '1',
            ]); //13
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => '03.jpg',
                'bib_url' => '/storage/images/cobranding/03.jpg',
                'bib_add' => '1',
            ]); //14
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => '04.jpg',
                'bib_url' => '/storage/images/cobranding/04.jpg',
                'bib_add' => '1',
            ]); //15
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => '05.jpg',
                'bib_url' => '/storage/images/cobranding/05.jpg',
                'bib_add' => '1',
            ]); //16
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => '06.jpg',
                'bib_url' => '/storage/images/cobranding/06.jpeg',
                'bib_add' => '1',
            ]); //17
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => '07.jpg',
                'bib_url' => '/storage/images/cobranding/07.jpeg',
                'bib_add' => '1',
            ]); //18
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => '09.jpg',
                'bib_url' => '/storage/images/cobranding/09.jpeg',
                'bib_add' => '1',
            ]); //19
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => '10.jpeg',
                'bib_url' => '/storage/images/cobranding/10.jpeg',
                'bib_add' => '1',
            ]); //20
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => '11.jpeg',
                'bib_url' => '/storage/images/cobranding/11.jpeg',
                'bib_add' => '1',
            ]); //21
    
            // imagenes como comprar
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'swell_01.png',
                'bib_url' => '/storage/images/comocomprar/swell_01.png',
                'bib_add' => '1',
            ]); //22
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'swell_02.png',
                'bib_url' => '/storage/images/comocomprar/swell_02.png',
                'bib_add' => '1',
            ]); //23
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'swell_03.png',
                'bib_url' => '/storage/images/comocomprar/swell_03.png',
                'bib_add' => '1',
            ]); //24
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'swell_04.png',
                'bib_url' => '/storage/images/comocomprar/swell_04.png',
                'bib_add' => '1',
            ]); //25
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'swell_05.png',
                'bib_url' => '/storage/images/comocomprar/swell_05.png',
                'bib_add' => '1',
            ]); //26
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'swell_06.png',
                'bib_url' => '/storage/images/comocomprar/swell_06.png',
                'bib_add' => '1',
            ]); //27
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'swell_07.png',
                'bib_url' => '/storage/images/comocomprar/swell_07.png',
                'bib_add' => '1',
            ]); //28
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'swell_08.png',
                'bib_url' => '/storage/images/comocomprar/swell_08.png',
                'bib_add' => '1',
            ]); //29
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'swell_09.png',
                'bib_url' => '/storage/images/comocomprar/swell_09.png',
                'bib_add' => '1',
            ]); //30
    
            // imagenes seccion de categiria 
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 's_hogar_jpeg',
                'bib_url' => '/storage/sliders/pag_cat/s_hogar.jpeg',
                'bib_add' => '1',
            ]); //31
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 's_higiene.jpeg',
                'bib_url' => '/storage/sliders/pag_cat/s_higiene.jpeg',
                'bib_add' => '1',
            ]); //32
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 's_ropa.jpeg',
                'bib_url' => '/storage/sliders/pag_cat/s_ropa.jpeg',
                'bib_add' => '1',
            ]); //33
    
            // imgenes de productos
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'AntigrasaMultiuso500ML.jpg',
                'bib_url' => '/storage/images/tienda/AntigrasaMultiuso500ML.jpg',
                'bib_add' => '1',
            ]); //34
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Antigrasa_Multiuso_1L_sin_gatillo.jpg',
                'bib_url' => '/storage/images/tienda/Antigrasa_Multiuso_1L_sin_gatillo.jpg',
                'bib_add' => '1',
            ]); //35
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Antigrasa_Multiuso_1L_con_gatillo.jpg',
                'bib_url' => '/storage/images/tienda/Antigrasa_Multiuso_1L_con_gatillo.jpg',
                'bib_add' => '1',
            ]); //36
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'DesengrasanteMultiuso5ooML.jpg',
                'bib_url' => '/storage/images/tienda/DesengrasanteMultiuso5ooML.jpg',
                'bib_add' => '1',
            ]); //37
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Desengrasante_Multiuso_1L.jpg',
                'bib_url' => '/storage/images/tienda/Desengrasante_Multiuso_1L.jpg',
                'bib_add' => '1',
            ]); //38
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Desengrasante-Multiuso-5L.jpg',
                'bib_url' => '/storage/images/tienda/Desengrasante-Multiuso-5L.jpg',
                'bib_add' => '1',
            ]); //39
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Desengrasante-Multiuso-10L.jpgg',
                'bib_url' => '/storage/images/tienda/Desengrasante-Multiuso-10L.jpg',
                'bib_add' => '1',
            ]); //40
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Espuma_alcalina_desengrasante_1L.jpg',
                'bib_url' => '/storage/images/tienda/Espuma_alcalina_desengrasante_1L.jpg',
                'bib_add' => '1',
            ]); //41
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Espuma-alcalina-desengrasante-5L.jpg',
                'bib_url' => '/storage/images/tienda/Espuma-alcalina-desengrasante-5L.jpg',
                'bib_add' => '1',
            ]); //42
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Destapa_cañerias_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Destapa_cañerias_500ML.jpg',
                'bib_add' => '1',
            ]); //43
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Destapa_cañerias_5L.jpg',
                'bib_url' => '/storage/images/tienda/Destapa_cañerias_5L.jpg',
                'bib_add' => '1',
            ]); //44
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Destapa_cañerias_10L.jpg',
                'bib_url' => '/storage/images/tienda/Destapa_cañerias_10L.jpg',
                'bib_add' => '1',
            ]); //45
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Lavavajillas_Limon_1L.jpg',
                'bib_url' => '/storage/images/tienda/Lavavajillas_Limon_1L.jpg',
                'bib_add' => '1',
            ]); //46
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Lavavajillas_Limon_5L.jpg',
                'bib_url' => '/storage/images/tienda/Lavavajillas_Limon_5L.jpg',
                'bib_add' => '1',
            ]); //47
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Lavavajillas_Limon_10L.jpg',
                'bib_url' => '/storage/images/tienda/Lavavajillas_Limon_10L.jpg',
                'bib_add' => '1',
            ]); //48
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Detergente_Lavavajilla_Biodegradable_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Detergente_Lavavajilla_Biodegradable_500ML.jpg',
                'bib_add' => '1',
            ]); //49
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Detergente_Lavavajilla_Biodegradable_5L.jpg',
                'bib_url' => '/storage/images/tienda/Detergente_Lavavajilla_Biodegradable_5L.jpg',
                'bib_add' => '1',
            ]); //50
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Detergente_Lavavajilla_Biodegradable_10L.jpg',
                'bib_url' => '/storage/images/tienda/Detergente_Lavavajilla_Biodegradable_10L.jpg',
                'bib_add' => '1',
            ]); //51
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Detergente_Lavavajilla_con_desinfectante_1L.jpg',
                'bib_url' => '/storage/images/tienda/Detergente_Lavavajilla_con_desinfectante_1L.jpg',
                'bib_add' => '1',
            ]); //52
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Detergente-concentrado-1L.jpg',
                'bib_url' => '/storage/images/tienda/Detergente-concentrado-1L.jpg',
                'bib_add' => '1',
            ]); //53
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Detergente-concentrado-1L.jpg',
                'bib_url' => '/storage/images/tienda/Detergente-concentrado-5L.jpg',
                'bib_add' => '1',
            ]); //54
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Detergente-concentrado-10L.jpg',
                'bib_url' => '/storage/images/tienda/Detergente-concentrado-10L.jpg',
                'bib_add' => '1',
            ]); //55
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Abrillantador-de-vajillas-4L.jpg',
                'bib_url' => '/storage/images/tienda/Abrillantador-de-vajillas-4L.jpg',
                'bib_add' => '1',
            ]); //56
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Fajinador-de-vajilla 500ML.jpg',
                'bib_url' => '/storage/images/tienda/Fajinador-de-vajilla 500ML.jpg',
                'bib_add' => '1',
            ]); //57
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Fajinador-de-vajilla 5L.jpg',
                'bib_url' => '/storage/images/tienda/Fajinador-de-vajilla 5L.jpg',
                'bib_add' => '1',
            ]); //58
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Gel_Clorado_1L.jpg',
                'bib_url' => '/storage/images/tienda/Gel_Clorado_1L.jpg',
                'bib_add' => '1',
            ]); //59
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Gel_Clorado_1L.jpg',
                'bib_url' => '/storage/images/tienda/Gel_Clorado_5L.jpg',
                'bib_add' => '1',
            ]); //60
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Gel_Clorado_10L.jpg',
                'bib_url' => '/storage/images/tienda/Gel_Clorado_10L.jpg',
                'bib_add' => '1',
            ]); //61
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Agua_Lavandina_Concentrada_1L.jpg',
                'bib_url' => '/storage/images/tienda/Agua_Lavandina_Concentrada_1L.jpg',
                'bib_add' => '1',
            ]); //62
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Agua_Lavandina_Concentrada_5L.jpg',
                'bib_url' => '/storage/images/tienda/Agua_Lavandina_Concentrada_5L.jpg',
                'bib_add' => '1',
            ]); //63
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Agua_Lavandina_Concentrada_10L.jpg',
                'bib_url' => '/storage/images/tienda/Agua_Lavandina_Concentrada_10L.jpg',
                'bib_add' => '1',
            ]); //64
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Agua_Lavandina_1L.jpg',
                'bib_url' => '/storage/images/tienda/Agua_Lavandina_1L.jpg',
                'bib_add' => '1',
            ]); //65
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Cloro_5L.jpg',
                'bib_url' => '/storage/images/tienda/Cloro_5L.jpg',
                'bib_add' => '1',
            ]); //66
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Cloro_10L.jpg',
                'bib_url' => '/storage/images/tienda/Cloro_10L.jpg',
                'bib_add' => '1',
            ]); //67
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Hipoclorito_de_Sodio_5L.jpg',
                'bib_url' => '/storage/images/tienda/Hipoclorito_de_Sodio_5L.jpg',
                'bib_add' => '1',
            ]); //68
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Benzalquat_10L.jpg',
                'bib_url' => '/storage/images/tienda/Benzalquat_10L.jpg',
                'bib_add' => '1',
            ]); //69
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Benzalquat_5ta_generacion_5L.jpg',
                'bib_url' => '/storage/images/tienda/Benzalquat_5ta_generacion_5L.jpg',
                'bib_add' => '1',
            ]); //70
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_antibacterial_250ML.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_antibacterial_250ML.jpg',
                'bib_add' => '1',
            ]); //71
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_antibacterial_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_antibacterial_500ML.jpg',
                'bib_add' => '1',
            ]); //72
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_antibacterial_1L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_antibacterial_1L.jpg',
                'bib_add' => '1',
            ]); //73
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_desinfectante_1L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_desinfectante_1L.jpg',
                'bib_add' => '1',
            ]); //74
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_rosa_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_rosa_500ML.jpg',
                'bib_add' => '1',
            ]); //75
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_rosa_1L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_rosa_1L.jpg',
                'bib_add' => '1',
            ]); //76
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_rosa_5L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_rosa_5L.jpg',
                'bib_add' => '1',
            ]); //77
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_marina_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_marina_500ML.jpg',
                'bib_add' => '1',
            ]); //78
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_marina_1L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_marina_1L.jpg',
                'bib_add' => '1',
            ]); //79
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_marina_5L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_marina_5L.jpg',
                'bib_add' => '1',
            ]); //80
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_coco_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_coco_500ML.jpg',
                'bib_add' => '1',
            ]); //81
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_coco_1L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_coco_1L.jpg',
                'bib_add' => '1',
            ]); //82
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_manos_coco_5L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_manos_coco_5L.jpg',
                'bib_add' => '1',
            ]); //83
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_la_ropa_country_1L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_la_ropa_country_1L.jpg',
                'bib_add' => '1',
            ]); //84
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_la_ropa_country_5L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_la_ropa_country_5L.jpg',
                'bib_add' => '1',
            ]); //85
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_la_ropa_ocean_1L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_la_ropa_ocean_1L.jpg',
                'bib_add' => '1',
            ]); //86
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Jabon_para_la_ropa_ocean_10L.jpg',
                'bib_url' => '/storage/images/tienda/Jabon_para_la_ropa_ocean_10L.jpg',
                'bib_add' => '1',
            ]); //87
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Suavizante_para_ropa_cielo_1L.jpg',
                'bib_url' => '/storage/images/tienda/Suavizante_para_ropa_cielo_1L.jpg',
                'bib_add' => '1',
            ]); //88
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Suavizante_para_ropa_cielo_5L.jpg',
                'bib_url' => '/storage/images/tienda/Suavizante_para_ropa_cielo_5L.jpg',
                'bib_add' => '1',
            ]); //89
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Suavizante_para_ropa_cielo_10L.jpg',
                'bib_url' => '/storage/images/tienda/Suavizante_para_ropa_cielo_10L.jpg',
                'bib_add' => '1',
            ]); //90
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Suavizante_para_ropa_brisa_1L.jpg',
                'bib_url' => '/storage/images/tienda/Suavizante_para_ropa_brisa_1L.jpg',
                'bib_add' => '1',
            ]); //91
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Suavizante_para_ropa_brisa_10L.jpg',
                'bib_url' => '/storage/images/tienda/Suavizante_para_ropa_brisa_10L.jpg',
                'bib_add' => '1',
            ]); //92
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Perfumina_250ML.jpg',
                'bib_url' => '/storage/images/tienda/Perfumina_250ML.jpg',
                'bib_add' => '1',
            ]); //93
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Perfumina_arpege_5L.jpg',
                'bib_url' => '/storage/images/tienda/Perfumina_arpege_5L.jpg',
                'bib_add' => '1',
            ]); //94
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiador_desengrasante_neutro_5L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiador_desengrasante_neutro_5L.jpg',
                'bib_add' => '1',
            ]); //95
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiador_desengrasante_neutro_10L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiador_desengrasante_neutro_10L.jpg',
                'bib_add' => '1',
            ]); //96
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiavidrios_1L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiavidrios_1L.jpg',
                'bib_add' => '1',
            ]); //97
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiavidrios_con_gatillo_1L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiavidrios_con_gatillo_1L.jpg',
                'bib_add' => '1',
            ]); //98
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiavidrios_5L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiavidrios_5L.jpg',
                'bib_add' => '1',
            ]); //99
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiavidrios_10L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiavidrios_10L.jpg',
                'bib_add' => '1',
            ]); //100
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiador_desodorante_para_pisos_pino_1L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiador_desodorante_para_pisos_pino_1L.jpg',
                'bib_add' => '1',
            ]); //101
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiador_desodorante_para_pisos_pino_5L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiador_desodorante_para_pisos_pino_5L.jpg',
                'bib_add' => '1',
            ]); //102
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiador_desodorante_para_pisos_pino_10L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiador_desodorante_para_pisos_pino_10L.jpg',
                'bib_add' => '1',
            ]); //103
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiador_desodorante_para_pisos_floral_1L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiador_desodorante_para_pisos_floral_1L.jpg',
                'bib_add' => '1',
            ]); //104
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiador_desodorante_para_pisos_floral_5L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiador_desodorante_para_pisos_floral_5L.jpg',
                'bib_add' => '1',
            ]); //105
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiador_desodorante_para_pisos_floral_10L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiador_desodorante_para_pisos_floral_10L.jpg',
                'bib_add' => '1',
            ]); //106
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiador_desodorante_para_pisos_limon_1L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiador_desodorante_para_pisos_limon_1L.jpg',
                'bib_add' => '1',
            ]); //107
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiador_desodorante_para_pisos_limon_5L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiador_desodorante_para_pisos_limon_5L.jpg',
                'bib_add' => '1',
            ]); //108
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Limpiador_desodorante_para_pisos_cherry_1L.jpg',
                'bib_url' => '/storage/images/tienda/Limpiador_desodorante_para_pisos_cherry_1L.jpg',
                'bib_add' => '1',
            ]); //109
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Desodorante_para_pisos_concentrado_lavanda_5L.jpg',
                'bib_url' => '/storage/images/tienda/Desodorante_para_pisos_concentrado_lavanda_5L.jpg',
                'bib_add' => '1',
            ]); //110
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Desodorante_para_pisos_concentrado_floral_10L.jpg',
                'bib_url' => '/storage/images/tienda/Desodorante_para_pisos_concentrado_floral_10L.jpg',
                'bib_add' => '1',
            ]); //111
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'LustraMuebles_500ML.jpg',
                'bib_url' => '/storage/images/tienda/LustraMuebles_500ML.jpg',
                'bib_add' => '1',
            ]); //112
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'LustraMuebles_1L.jpg',
                'bib_url' => '/storage/images/tienda/LustraMuebles_1L.jpg',
                'bib_add' => '1',
            ]); //113
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'QuitaSarro_500ML.jpg',
                'bib_url' => '/storage/images/tienda/QuitaSarro_500ML.jpg',
                'bib_add' => '1',
            ]); //114
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'QuitaSarro_5L.jpg',
                'bib_url' => '/storage/images/tienda/QuitaSarro_5L.jpg',
                'bib_add' => '1',
            ]); //115
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Removedor_de_Ceras_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Removedor_de_Ceras_500ML.jpg',
                'bib_add' => '1',
            ]); //116
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Removedor_de_Ceras_1L.jpg',
                'bib_url' => '/storage/images/tienda/Removedor_de_Ceras_1L.jpg',
                'bib_add' => '1',
            ]); //117
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Removedor_de_Ceras_5L.jpg',
                'bib_url' => '/storage/images/tienda/Removedor_de_Ceras_5L.jpg',
                'bib_add' => '1',
            ]); //118
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Cera_AutoBrillo_Natural_1L.jpg',
                'bib_url' => '/storage/images/tienda/Cera_AutoBrillo_Natural_1L.jpg',
                'bib_add' => '1',
            ]); //119
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Cera_AutoBrillo_Natural_10L.jpg',
                'bib_url' => '/storage/images/tienda/Cera_AutoBrillo_Natural_10L.jpg',
                'bib_add' => '1',
            ]); //120
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Cera_liquida_para_madera_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Cera_liquida_para_madera_500ML.jpg',
                'bib_add' => '1',
            ]); //121
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Cera_liquida_para_madera_1L.jpg',
                'bib_url' => '/storage/images/tienda/Cera_liquida_para_madera_1L.jpg',
                'bib_add' => '1',
            ]); //122
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Cera_liquida_para_madera_5L.jpg',
                'bib_url' => '/storage/images/tienda/Cera_liquida_para_madera_5L.jpg',
                'bib_add' => '1',
            ]); //123
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Acondicionador_de_Pisos_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Acondicionador_de_Pisos_500ML.jpg',
                'bib_add' => '1',
            ]); //124
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Acondicionador_de_Pisos_1L.jpg',
                'bib_url' => '/storage/images/tienda/Acondicionador_de_Pisos_1L.jpg',
                'bib_add' => '1',
            ]); //125
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Acondicionador_de_Pisos_5L.jpg',
                'bib_url' => '/storage/images/tienda/Acondicionador_de_Pisos_5L.jpg',
                'bib_add' => '1',
            ]); //126
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Shampoo_para_autos_1L.jpg',
                'bib_url' => '/storage/images/tienda/Shampoo_para_autos_1L.jpg',
                'bib_add' => '1',
            ]); //127
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Silicona_para_Tableros_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Silicona_para_Tableros_500ML.jpg',
                'bib_add' => '1',
            ]); //128
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Silicona_para_Tableros_1L.jpg',
                'bib_url' => '/storage/images/tienda/Silicona_para_Tableros_1L.jpg',
                'bib_add' => '1',
            ]); //129
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Silicona_para_Tableros_5L.jpg',
                'bib_url' => '/storage/images/tienda/Silicona_para_Tableros_5L.jpg',
                'bib_add' => '1',
            ]); //130
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Silicona_para_neumaticos_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Silicona_para_neumaticos_500ML.jpg',
                'bib_add' => '1',
            ]); //131
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Silicona_para_neumaticos_1L.jpg',
                'bib_url' => '/storage/images/tienda/Silicona_para_neumaticos_1L.jpg',
                'bib_add' => '1',
            ]); //132
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Silicona_para_neumaticos_5L.jpg',
                'bib_url' => '/storage/images/tienda/Silicona_para_neumaticos_5L.jpg',
                'bib_add' => '1',
            ]); //133
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Cera_para_autos_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Cera_para_autos_500ML.jpg',
                'bib_add' => '1',
            ]); //134
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Cera_para_autos_1L.jpg',
                'bib_url' => '/storage/images/tienda/Cera_para_autos_1L.jpg',
                'bib_add' => '1',
            ]); //135
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Cera_para_autos_5L.jpg',
                'bib_url' => '/storage/images/tienda/Cera_para_autos_5L.jpg',
                'bib_add' => '1',
            ]); //136
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Splash_Col_spray_250ML.jpg',
                'bib_url' => '/storage/images/tienda/Splash_Col_spray_250ML.jpg',
                'bib_add' => '1',
            ]); //137
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Splash_Col_spray_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Splash_Col_spray_500ML.jpg',
                'bib_add' => '1',
            ]); //138
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Splash_Col_gatillo_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Splash_Col_gatillo_500ML.jpg',
                'bib_add' => '1',
            ]); //139
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Splash_Col_5L.jpg',
                'bib_url' => '/storage/images/tienda/Splash_Col_5L.jpg',
                'bib_add' => '1',
            ]); //140
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Splash_Col_10L.jpg',
                'bib_url' => '/storage/images/tienda/Splash_Col_10L.jpg',
                'bib_add' => '1',
            ]); //141
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Alcohol_en_Gel_Gota_250ML.jpg',
                'bib_url' => '/storage/images/tienda/Alcohol_en_Gel_Gota_250ML.jpg',
                'bib_add' => '1',
            ]); //142
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Alcohol_en_Gel_Gota_500ML.jpg',
                'bib_url' => '/storage/images/tienda/Alcohol_en_Gel_Gota_500ML.jpg',
                'bib_add' => '1',
            ]); //143
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Alcohol_en_Gel_1L.jpg',
                'bib_url' => '/storage/images/tienda/Alcohol_en_Gel_1L.jpg',
                'bib_add' => '1',
            ]); //144
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Alcohol_en_Gel_5L.jpg',
                'bib_url' => '/storage/images/tienda/Alcohol_en_Gel_5L.jpg',
                'bib_add' => '1',
            ]); //145
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Alcohol_en_Gel_10L.jpg',
                'bib_url' => '/storage/images/tienda/Alcohol_en_Gel_10L.jpg',
                'bib_add' => '1',
            ]); //146
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Perfumina_Vainilla_5L.jpg',
                'bib_url' => '/storage/images/tienda/Perfumina_Vainilla_5L.jpg',
                'bib_add' => '1',
            ]); //147
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Perfumina_Bebe_5L.jpg',
                'bib_url' => '/storage/images/tienda/Perfumina_Bebe_5L.jpg',
                'bib_add' => '1',
            ]); //148
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Blem_Aerosol.jpg',
                'bib_url' => '/storage/images/tienda/art/Blem_Aerosol.jpg',
                'bib_add' => '1',
            ]); //149
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Bobina_Papel_400m_Hs.jpg',
                'bib_url' => '/storage/images/tienda/art/Bobina_Papel_400m_Hs.jpg',
                'bib_add' => '1',
            ]); //150
    
            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Bobina_Elegante_1035_Papel_Toalla_200x20.jpg',
                'bib_url' => '/storage/images/tienda/art/Bobina_Elegante_1035_Papel_Toalla_200x20.jpg',
                'bib_add' => '1',
            ]); //151

            DB::table('bibliotecas')->insert([
                'bib_nombre' => 'Quita_Grafitti.jpg',
                'bib_url' => '/storage/images/tienda/Quita_Grafitti.jpg',
                'bib_add' => '1',
            ]); //152
        }

        

        DB::table('pagina_homes')->truncate();
        // Banner
        if (1 == 1) {
        
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '1',
                'sli_posicion' => '0',
                'sli_extra' => 'Banner Home 2',
                'sli_align' => 'start',
                'sli_justify' => 'center',
                'sli_padding' => '1% 1%',
                'sli_margin' => '5% 5% 0% 0%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => 'Conoce nuestra linea de productos para tu industria',
                'sli_text_en' => 'Get to know our line of products for your industry',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 7,
                'sli_add' => 1,
            ]);

            DB::table('pagina_homes')->insert([
                'sli_tipo' => '1',
                'sli_posicion' => '0',
                'sli_extra' => 'Banner Home 1',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => 'La limpieza de tu hogar en buenas manos',
                'sli_text_en' => 'Cleaning your home in good hands',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 3,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '1',
                'sli_posicion' => '0',
                'sli_extra' => 'Banner Home 3',
                'sli_align' => 'center',
                'sli_justify' => 'end',
                'sli_padding' => '1%',
                'sli_margin' => '0% 20% 0% 0%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => 'Envianos tu consulta y te brindaremos Información acerca de nuestros productos',
                'sli_text_en' => 'Send us your query and we will provide you with information about our products',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 1,
                'sli_add' => 1,
            ]);
    
        }

        //  imagenes de categorias
        if (1 == 1) {
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '2',
                'sli_posicion' => '1',
                'sli_extra' => '/category/Productos Para Ropa',
                'sli_align' => '6',
                'sli_justify' => '',
                'sli_padding' => '',
                'sli_margin' => '',
                'sli_background_text' => '#000000FF',
                'sli_text_es' => 'CUIDA TU ROPA',
                'sli_text_en' => 'TAKE CARE OF YOUR CLOTHING',
                'sli_class' => 'category_v',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFF72',
                'sli_imagen' => 8,
                'sli_add' => 1,
            ]);
            
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '2',
                'sli_posicion' => '2',
                'sli_extra' => '/cobranding',
                'sli_align' => '6',
                'sli_justify' => '',
                'sli_padding' => '',
                'sli_margin' => '',
                'sli_background_text' => '#000000FF',
                'sli_text_es' => 'COBRANDING',
                'sli_text_en' => 'COBRANDING',
                'sli_class' => 'category_h',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFF80',
                'sli_imagen' => 9,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '2',
                'sli_posicion' => '2',
                'sli_extra' => '/category/Productos%20Liquidos',
                'sli_align' => '6',
                'sli_justify' => '',
                'sli_padding' => '',
                'sli_margin' => 'margin-top:10px',
                'sli_background_text' => '#000000FF',
                'sli_text_es' => 'TU HOGAR RADIANTE',
                'sli_text_en' => 'YOUR RADIANT HOME',
                'sli_class' => 'category_h',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFF80',
                'sli_imagen' => 10,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '2',
                'sli_posicion' => '3',
                'sli_extra' => '/category/Higiene Personal',
                'sli_align' => '12',
                'sli_justify' => '',
                'sli_padding' => '',
                'sli_margin' => '',
                'sli_background_text' => '#000000FF',
                'sli_text_es' => 'EL HABITO DE HIGIENE NOS MANTIENE SANOS',
                'sli_text_en' => 'THE HYGIENE HABIT KEEPS US HEALTHY',
                'sli_class' => 'category_f',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFF80',
                'sli_imagen' => 11,
                'sli_add' => 1,
            ]);
        }
        

        // imagen para cobranding
        if ( 1 == 1) {
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '3',
                'sli_posicion' => '0',
                'sli_extra' => 'Cobranding 1',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 12,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '3',
                'sli_posicion' => '0',
                'sli_extra' => 'Cobranding 2',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 13,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '3',
                'sli_posicion' => '0',
                'sli_extra' => 'Cobranding 3',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 14,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '3',
                'sli_posicion' => '0',
                'sli_extra' => 'Cobranding 4',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 15,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '3',
                'sli_posicion' => '0',
                'sli_extra' => 'Cobranding 5',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 16,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '3',
                'sli_posicion' => '0',
                'sli_extra' => 'Cobranding 6',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 17,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '3',
                'sli_posicion' => '0',
                'sli_extra' => 'Cobranding 7',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 18,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '3',
                'sli_posicion' => '0',
                'sli_extra' => 'Cobranding 8',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 19,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '3',
                'sli_posicion' => '0',
                'sli_extra' => 'Cobranding 9',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 20,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '3',
                'sli_posicion' => '0',
                'sli_extra' => 'Cobranding 10',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 21,
                'sli_add' => 1,
            ]);
        }
        

        // imagenes para como comprar
        if (1 == 1) {
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '4',
                'sli_posicion' => '0',
                'sli_extra' => 'Comprando 1',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 22,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '4',
                'sli_posicion' => '1',
                'sli_extra' => 'Comprando 2',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 23,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '4',
                'sli_posicion' => '2',
                'sli_extra' => 'Comprando 3',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 24,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '4',
                'sli_posicion' => '3',
                'sli_extra' => 'Comprando 4',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 25,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '4',
                'sli_posicion' => '4',
                'sli_extra' => 'Comprando 5',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 26,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '4',
                'sli_posicion' => '5',
                'sli_extra' => 'Comprando 6',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 27,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '4',
                'sli_posicion' => '6',
                'sli_extra' => 'Comprando 7',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 28,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '4',
                'sli_posicion' => '7',
                'sli_extra' => 'Comprando 8',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 29,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '4',
                'sli_posicion' => '8',
                'sli_extra' => 'Comprando 9',
                'sli_align' => 'center',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 30,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '5',
                'sli_posicion' => '0',
                'sli_extra' => 'hogar',
                'sli_align' => '12',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 31,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '5',
                'sli_posicion' => '0',
                'sli_extra' => 'higiene',
                'sli_align' => '12',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 32,
                'sli_add' => 1,
            ]);
    
            DB::table('pagina_homes')->insert([
                'sli_tipo' => '5',
                'sli_posicion' => '0',
                'sli_extra' => 'ropa',
                'sli_align' => '12',
                'sli_justify' => 'start',
                'sli_padding' => '1% 1%',
                'sli_margin' => '20% 0% 0% 5%',
                'sli_background_text' => '#FFFFFF80',
                'sli_text_es' => '',
                'sli_text_en' => '',
                'sli_class' => 'display-1 font-weight-light',
                'sli_colortext' => '#000000FF',
                'sli_color' => '#FFFFFFFF',
                'sli_imagen' => 33,
                'sli_add' => 1,
            ]);
    
        }
        

    }
}