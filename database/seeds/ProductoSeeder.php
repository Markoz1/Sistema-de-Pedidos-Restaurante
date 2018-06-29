<?php

use Illuminate\Database\Seeder;
use App\Model\Producto;
class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'estado_id'=>"1",
            'nombre'=> "pique macho",            
            'Precio'=> "55",
            'descripcion'=> "El Pique Macho es un plato cochabambino muy popular que consiste en trozos de carne de res en su jugo y salchichas fritas acompañados de papas fritas, huevo, rodajas de locoto y tomate.",
            'categoria_id'=> 1,
            'foto'=> "storage/fotos/a.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Pollo al Horno",
            'Precio'=> "35",
            'descripcion'=> "Pollo asado con patatas, elaborado en el día. Acompañado de una rica salsa natural del propio jugo. Importante confirmar la hora de entrega, agregue una nota sobre su pedido.",
            'categoria_id'=> 1,
            'foto'=> "storage/fotos/b.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Medio pollo con patatas",
            'Precio'=> "25",
            'descripcion'=> "Medio pollo con patatas. Importante confirmar la hora de entrega, agregue una nota sobre su pedido.",
            'categoria_id'=> 1,
            'foto'=> "storage/fotos/c.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Lasagna de Champiñones",
            'Precio'=> "40",
            'descripcion'=> "Lasagna de ragout de setas y champiñones, espinacas, pasas, nueces y queso Scamorza. Acompañada de pan de ajo de focaccia.",
            'categoria_id'=> 1,
            'foto'=> "storage/fotos/d.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Entrecot",
            'Precio'=> "28",
            'descripcion'=> "Entrecot de novillo argentino con salsa chimichurri, patatas gajo, judías verdes salteadas y tomate a la plancha.",
            'categoria_id'=> 1,
            'foto'=> "storage/fotos/e.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "BBQ Costillas VIPS",
            'Precio'=> "65",
            'descripcion'=> "Costillas de cerdo a la BBQ, con aros de cebolla, patatas fritas y salsa BBQ Chipotle.",
            'categoria_id'=> 1,
            'foto'=> "storage/fotos/f.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Merluza a la Romana",
            'Precio'=> "80",
            'descripcion'=> "Lomo de merluza a la romana acompañado de arroz con verduras y guarnición a elegir.",
            'categoria_id'=> 1,
            'foto'=> "storage/fotos/g.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Pallarda de Ternera",
            'Precio'=> "30",
            'descripcion'=> "Filete de ternera, judías verdes salteadas y tomate a la plancha.",
            'categoria_id'=> 1,
            'foto'=> "storage/fotos/h.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Pechuga de Pollo Villaroy",
            'Precio'=> "29",
            'descripcion'=> "Dos pechugas de pollo envueltas en bechamel y empanadas, huevo frito, ensalada de lechugas, tomate, patatas fritas y salsa de tomate Concassé.",
            'categoria_id'=> 1,
            'foto'=> "storage/fotos/i.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Langostinos Sriracha",
            'Precio'=> "30",
            'descripcion'=> "Langostinos salteados sobre una base de arroz con verduras y salsa Sriracha.",
            'categoria_id'=> 1,
            'foto'=> "storage/fotos/j.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Salteado de Pollo Oriental",
            'Precio'=> "25",
            'descripcion'=> "Tiras de pechuga de pollo, salsa agridulce de soja y piña, pimientos rojos, brócoli, anacardos y arroz blanco.",
            'categoria_id'=> 1,
            'foto'=> "storage/fotos/k.jpg"
           ]);
           //registramos postres
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Vasito de Yogur y Muesli",
            'Precio'=> "10",
            'descripcion'=> "Yogur, fresas y piña, con muesli crujiente de avena, frutos secos y miel.",
            'categoria_id'=> 2,
            'foto'=> "storage/fotos/l.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Trío de Chocolate",
            'Precio'=> "15",
            'descripcion'=> "Tres capas de bizcocho de chocolate relleno de mousee de chocolate blanco, ganache de chocolate con leche y avellanas gianduia . Cubierta con virutas de chocolate blanco y avellana caramelizada.",
            'categoria_id'=> 2,
            'foto'=> "storage/fotos/m.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Tortitas",
            'Precio'=> "7",
            'descripcion'=> "Tortitas recién hechas con nata montada VIPS y sirope de chocolate, caramelo o fresa.",
            'categoria_id'=> 2,
            'foto'=> "storage/fotos/n.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Americano",
            'Precio'=> "25",
            'descripcion'=> "Dos de nuestras famosas tortitas acompañadas de huevos revueltos o fritos, crujiente bacon ahumado y patatas recién fritas o patatas gajo.",
            'categoria_id'=> 2,
            'foto'=> "storage/fotos/o.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Bowl de Yogur y Muesli",
            'Precio'=> "9",
            'descripcion'=> "Yogur acompañado de fresas, plátano y piña, con muesli crujiente de avena, frutos secos y miel.",
            'categoria_id'=> 2,
            'foto'=> "storage/fotos/p.jpg"
           ]);
           //bebidas
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "CocaCola en vaso",
            'Precio'=> "3",
            'descripcion'=> "Refrescos Siempre Lleno refrescante Coca-Cola",
            'categoria_id'=> 3,
            'foto'=> "storage/fotos/q.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Fanta Mandarina en vaso",
            'Precio'=> "3",
            'descripcion'=> "Refrescos Siempre Lleno refrescante Fanta-madarina",
            'categoria_id'=> 3,
            'foto'=> "storage/fotos/r.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Sprite en vaso",
            'Precio'=> "3",
            'descripcion'=> "Refrescos Siempre Lleno refrescante Sprite",
            'categoria_id'=> 3,
            'foto'=> "storage/fotos/s.jpg"
           ]);
           Producto::create([
            'estado_id'=>"1",
            'nombre'=> "Zumo de Limon en vaso",
            'Precio'=> "4",
            'descripcion'=> "Zumo natural de limon",
            'categoria_id'=> 3,
            'foto'=> "storage/fotos/t.jpg"
           ]);
    }
}
