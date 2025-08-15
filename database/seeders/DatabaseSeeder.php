<?php

namespace Database\Seeders;

use App\Models\AcabadosContenido;
use App\Models\Banner;
use App\Models\Calidad;
use App\Models\Contacto;
use App\Models\Contenido;
use App\Models\Internacional;
use App\Models\Logo;
use App\Models\Metadato;
use App\Models\Nosotros;
use App\Models\Tarjeta;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuarios
        User::create([
            'name' => 'Pablo',
            'email' => 'pablo@osole.com',
            'password' => Hash::make('pablopablo'),
            'role' => 'admin',
        ]);


        // Crear logos para las secciones
        $logoSecciones = ['login', 'dashboard', 'footer', 'navbar', 'home'];
        foreach ($logoSecciones as $seccion) {
            Logo::create([
                'path' => "logos/{$seccion}-logo.png",
                'seccion' => $seccion,
            ]);
        }

        // Crear metadatos para las secciones
        $metadatos = [
            [
                'seccion' => 'home',
                'keyword' => 'pramet, inicio, productos plásticos',
                'descripcion' => 'Página principal de pramet - Empresa líder en productos plásticos de alta calidad'
            ],
            [
                'seccion' => 'nosotros',
                'keyword' => 'empresa, historia, pramet, quienes somos',
                'descripcion' => 'Conoce más sobre pramet, nuestra historia y compromiso con la calidad'
            ],
            [
                'seccion' => 'productos',
                'keyword' => 'productos plásticos, catálogo, pramet',
                'descripcion' => 'Catálogo completo de productos plásticos de alta calidad de pramet'
            ],
            [
                'seccion' => 'servicios',
                'keyword' => 'servicios, soluciones, pramet',
                'descripcion' => 'Conoce los servicios que pramet ofrece para satisfacer tus necesidades en productos plásticos.'
            ],
            [
                'seccion' => 'clientes',
                'keyword' => 'clientes, testimonios, pramet',
                'descripcion' => 'Descubre quiénes son nuestros clientes y lo que opinan sobre pramet.'
            ],
            [
                'seccion' => 'novedades',
                'keyword' => 'novedades, noticias, pramet',
                'descripcion' => 'Mantente informado sobre las últimas novedades y noticias de pramet.'
            ],
            [
                'seccion' => 'contacto',
                'keyword' => 'contacto, ubicación, teléfono, email pramet',
                'descripcion' => 'Información de contacto y ubicación de pramet'
            ]
        ];
        foreach ($metadatos as $metadato) {
            Metadato::create($metadato);
        }

        // Crear datos de ejemplo para nosotros
        Nosotros::create([
            'path' => 'images/nosotros-banner.jpg',
            'titulo' => 'Sobre pramet',
            'descripcion' => 'Somos una empresa líder en la fabricación de productos plásticos de alta calidad, comprometidos con la innovación y la excelencia.', 
        ]);
        // Crear tarjetas de ejemplo
        $tarjetas = [
            [
                'path' => 'images/mision.png',
                'titulo' => 'Misión',
                'descripcion' => 'Nuestra misión es ofrecer productos plásticos de alta calidad que superen las expectativas de nuestros clientes.',
            ],
            [
                'path' => 'images/vision.png',
                'titulo' => 'Visión',
                'descripcion' => 'Ser líderes en innovación y excelencia en la industria de productos plásticos.',
            ],
            [
                'path' => 'images/calidad.png',
                'titulo' => 'Calidad',
                'descripcion' => 'Comprometidos con la mejora continua y la satisfacción total de nuestros clientes.',
            ],
        ];                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
        foreach ($tarjetas as $tarjeta) {
            Tarjeta::create($tarjeta);
        }

        // Crear contenido de ejemplo
        Contenido::create([
            'path' => 'images/contenido-home-banner.jpg',
            'titulo' => 'Bienvenidos a pramet',
            'descripcion' => 'Tu socio confiable en soluciones plásticas de alta calidad para todas las industrias.'
        ]);
        
        $banners = [
            [
                'banner' => 'images/contenido-home-banner.jpg',
                'seccion' => 'nosotros'
            ],
            [
                'banner' => 'images/contenido-secundario.jpg',
                'seccion' => 'productos'
            ],
            [
                'banner' => 'images/contenido-servicios.jpg',
                'seccion' => 'servicios'
            ],
            [
                'banner' => 'images/contenido-clientes.jpg',
                'seccion' => 'clientes'
            ],
            [
                'banner' => 'images/contenido-novedades.jpg',
                'seccion' => 'novedades'
            ],
            [
                'banner' => 'images/contenido-contacto.jpg',
                'seccion' => 'contacto'
            ]
        ];
        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
