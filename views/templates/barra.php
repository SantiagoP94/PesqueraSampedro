<div class="barra">
    <p>Hola: <?php echo $nombre ?? '';?></p>
    <a class="boton" href="/Logout">Cerrar sesión</a>
</div>

<?php if(isset($_SESSION['admin'])) { ?>
        <div class="barra-servicios">
            <a class="boton" href="/admin">Ver pedidos</a>
            <a class="boton" href="/servicios">Ver Productos</a>
            <a class="boton" href="/servicios/crear">Crear nuevo producto</a>
        </div>
<?php } ?>