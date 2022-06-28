<h1 class="nombre-pagina">Recuperar password</h1>
<p class="descripcion-pagina">Ingresa tú nuevo password a continuación</p>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<?php if($error) return?>

<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="Tú nuevo password"
        />
    </div>
    <input type="submit" class="boton" value="Guardar Nuevo Password"/>
</form>

<div class="acciones">
    <a href="/">¿Ya tienes cuenta? Inicia sesión</a>
    <a href="/crear-cuenta">Aún no tienes cuenta? Obtener una</a>
</div>