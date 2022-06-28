<?php 

namespace Controllers;

use Models\Producto;
use MVC\Router;

class ServicioController{
    public static function index(Router $router){
        
        isAdmin();

        $servicio = Producto::all();

        $router->render('servicios/index',[
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicio
        ]);
    }
    public static function crear(Router $router){

        isAdmin();
        $servicio = New Producto;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $servicio->sincronizar($_POST);
            $alertas = $servicio->validar();

            if(empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios');
            }
        }

        $router->render('servicios/crear',[
            'nombre' => $_SESSION['nombre'],
            'servicio' =>$servicio,
            'alertas' => $alertas
        ]);
    }
    public static function actualizar(Router $router){

        isAdmin();
        if(!is_numeric($_GET['id'])) return;

        $servicio = Producto::find($_GET['id']);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar();
            if(empty($alertas)){
                $servicio->guardar();
                header('Location: /servicios');
            }
        }
        $router->render('servicios/actualizar',[
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' =>$alertas
        ]);
    }
    public static function eliminar(){

        isAdmin();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $servicio = Producto::find($id);
            $servicio->eliminar();
            header('Location: /servicios');
        }
    }
}
?>