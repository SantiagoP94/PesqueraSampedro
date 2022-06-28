<?php 

namespace Controllers;

use Models\Cita;
use Models\CitaServicio;
use Models\Producto;

class APIController {
    public static function index(){
        $productos = Producto::all();
        echo json_encode($productos);
    }
    public static function guardar(){

        //Almacena la cita y devuelve el ID
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();

        $id = $resultado['id'];

        //Almacena los servicios con el Id de la cita
        $idProductos = explode(",", $_POST['productos']);
        foreach($idProductos as $idServicio){
            $args=[
                'citaId' => $id,
                'servicioId' => $idServicio
            ];
            $citaServicio =  new CitaServicio($args);
            $citaServicio->guardar();
        }

        //Retornamos una respuesta       
        echo json_encode([
            'resultado'=> $resultado
        ]);
    }
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $cita = Cita::find($_POST['id']);
            $cita->eliminar();

            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }
}