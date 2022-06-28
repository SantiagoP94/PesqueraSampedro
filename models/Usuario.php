<?php

namespace Models;

class Usuario extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'telefono', 'admin', 'confirmado', 'token'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? 0;
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
    }

    //Mensajes de validación para creación de una cuenta.

    public function validarNuevaCuenta(){
        if(!$this->nombre) {
            self::$alertas['error'][] = 'el Nombre es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'el Apellido es Obligatorio';
        }
        if(!$this->telefono) {
            self::$alertas['error'][] = 'el Telefono es Obligatorio';
        }
        if(!$this->email) {
            self::$alertas['error'][] = 'el Email es Obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'La Contraseña es Obligatoria';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'La contraseña debe contener mínimo 6 carácteres';
        }
        if(strlen($this->telefono) < 10){
            self::$alertas['error'][] = 'El telefono debe ser de 10 dígitos';
        }
        return self::$alertas;
    }

    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }

        return self::$alertas;
    }

    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        return  self::$alertas;
    }
    public function validarPassword(){
        if(!$this->password){
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El Password Debe tener al menos 6 caracteres';
        }
        return  self::$alertas;
    }

    //Revisa si el usuario ya existe
    public function existeUsuario() {
        $query = "SELECT * FROM ". self::$tabla . " WHERE email = '". $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            self::$alertas['error'][] = 'el usuario ya está registrado';
        }
        return $resultado;
    }

    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT); 
    }
    public function crearToken(){
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password){
        $resultado = password_verify($password, $this->password);
        if(!$resultado || !$this->confirmado){
            self::$alertas['error'][]='Password Incorrecto o tú cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }
}
?>