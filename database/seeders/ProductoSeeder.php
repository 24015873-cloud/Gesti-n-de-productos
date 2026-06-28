<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Laptop Lenovo IdeaPad 15', 'descripcion' => 'Laptop de 15 pulgadas para estudio y oficina, con buen rendimiento para tareas diarias.', 'precio' => 12499.00, 'categoria_id' => 1],
            ['nombre' => 'Monitor Samsung 24 pulgadas', 'descripcion' => 'Monitor Full HD ideal para trabajo, clases en linea y entretenimiento.', 'precio' => 2899.00, 'categoria_id' => 1],
            ['nombre' => 'Teclado inalambrico Logitech', 'descripcion' => 'Teclado compacto inalambrico con teclas silenciosas y conexion estable.', 'precio' => 549.00, 'categoria_id' => 1],
            ['nombre' => 'Mouse optico USB', 'descripcion' => 'Mouse ergonomico con sensor optico preciso para uso diario en computadora.', 'precio' => 189.00, 'categoria_id' => 1],
            ['nombre' => 'Audifonos Bluetooth Sony', 'descripcion' => 'Audifonos inalambricos con sonido claro, microfono integrado y bateria recargable.', 'precio' => 1599.00, 'categoria_id' => 1],
            ['nombre' => 'Bocina Bluetooth JBL Go', 'descripcion' => 'Bocina portatil compacta con conexion Bluetooth y sonido potente para su tamano.', 'precio' => 899.00, 'categoria_id' => 1],
            ['nombre' => 'Memoria USB Kingston 64GB', 'descripcion' => 'Unidad USB de 64GB para guardar documentos, fotos y archivos escolares.', 'precio' => 169.00, 'categoria_id' => 1],
            ['nombre' => 'Disco duro externo 1TB', 'descripcion' => 'Disco externo portatil de 1TB para respaldos y almacenamiento adicional.', 'precio' => 1299.00, 'categoria_id' => 1],
            ['nombre' => 'Cargador USB-C rapido', 'descripcion' => 'Cargador de pared con puerto USB-C compatible con carga rapida para celulares.', 'precio' => 349.00, 'categoria_id' => 1],
            ['nombre' => 'Camara web HD', 'descripcion' => 'Camara web con resolucion HD y microfono integrado para videollamadas.', 'precio' => 699.00, 'categoria_id' => 1],
            ['nombre' => 'Playera basica blanca', 'descripcion' => 'Playera de algodon corte regular, comoda para uso casual diario.', 'precio' => 199.00, 'categoria_id' => 2],
            ['nombre' => 'Playera basica negra', 'descripcion' => 'Playera negra de algodon suave con cuello redondo y ajuste regular.', 'precio' => 199.00, 'categoria_id' => 2],
            ['nombre' => 'Pantalon de mezclilla azul', 'descripcion' => 'Jeans de mezclilla azul con corte recto y bolsas frontales y traseras.', 'precio' => 649.00, 'categoria_id' => 2],
            ['nombre' => 'Sudadera gris con capucha', 'descripcion' => 'Sudadera afelpada con capucha, bolsa frontal y ajuste comodo.', 'precio' => 799.00, 'categoria_id' => 2],
            ['nombre' => 'Chamarra ligera rompevientos', 'descripcion' => 'Chamarra ligera resistente al viento, practica para clima fresco.', 'precio' => 999.00, 'categoria_id' => 2],
            ['nombre' => 'Tenis deportivos negros', 'descripcion' => 'Tenis comodos para caminar, entrenar o usar de forma casual.', 'precio' => 1199.00, 'categoria_id' => 2],
            ['nombre' => 'Gorra ajustable azul', 'descripcion' => 'Gorra casual con broche ajustable y visera curva.', 'precio' => 249.00, 'categoria_id' => 2],
            ['nombre' => 'Camisa manga larga', 'descripcion' => 'Camisa de manga larga para oficina o eventos casuales.', 'precio' => 549.00, 'categoria_id' => 2],
            ['nombre' => 'Short deportivo', 'descripcion' => 'Short ligero con cintura elastica para ejercicio o descanso.', 'precio' => 299.00, 'categoria_id' => 2],
            ['nombre' => 'Calcetas paquete de 3 pares', 'descripcion' => 'Paquete de calcetas suaves y resistentes para uso diario.', 'precio' => 149.00, 'categoria_id' => 2],
            ['nombre' => 'Licuadora Oster 10 velocidades', 'descripcion' => 'Licuadora para preparar jugos, salsas y licuados con vaso resistente.', 'precio' => 1099.00, 'categoria_id' => 3],
            ['nombre' => 'Sarten antiadherente 24 cm', 'descripcion' => 'Sarten antiadherente para cocinar con menos aceite y facil limpieza.', 'precio' => 399.00, 'categoria_id' => 3],
            ['nombre' => 'Juego de platos ceramica', 'descripcion' => 'Juego de platos de ceramica para cuatro personas, ideal para uso diario.', 'precio' => 799.00, 'categoria_id' => 3],
            ['nombre' => 'Set de vasos de vidrio', 'descripcion' => 'Set de seis vasos de vidrio transparente para agua, jugos o refrescos.', 'precio' => 299.00, 'categoria_id' => 3],
            ['nombre' => 'Organizador plastico multiusos', 'descripcion' => 'Organizador con compartimentos para guardar accesorios, herramientas o papeleria.', 'precio' => 249.00, 'categoria_id' => 3],
            ['nombre' => 'Lampara LED de escritorio', 'descripcion' => 'Lampara LED ajustable para lectura, estudio o trabajo en escritorio.', 'precio' => 459.00, 'categoria_id' => 3],
            ['nombre' => 'Almohada matrimonial', 'descripcion' => 'Almohada suave con relleno confortable para descanso diario.', 'precio' => 349.00, 'categoria_id' => 3],
            ['nombre' => 'Toalla de bano grande', 'descripcion' => 'Toalla absorbente de tamano grande, suave al tacto y de secado rapido.', 'precio' => 279.00, 'categoria_id' => 3],
            ['nombre' => 'Cesto para ropa', 'descripcion' => 'Cesto plastico resistente para organizar ropa limpia o sucia.', 'precio' => 229.00, 'categoria_id' => 3],
            ['nombre' => 'Reloj de pared minimalista', 'descripcion' => 'Reloj de pared con diseno sencillo para sala, cocina u oficina.', 'precio' => 319.00, 'categoria_id' => 3],
        ];

        DB::table('productos')->upsert(
            array_map(
                fn (array $producto, int $index) => array_merge($producto, [
                    'id' => $index + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]),
                $productos,
                array_keys($productos)
            ),
            ['id'],
            ['nombre', 'descripcion', 'precio', 'categoria_id', 'updated_at']
        );
    }
}
