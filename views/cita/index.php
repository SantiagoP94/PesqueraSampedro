<h1 class="nombre-pagina">Menú</h1>
<p class="descripcion-pagina">Elige tús productos e ingresa datos de envío: </p>

<?php 
    include_once __DIR__ . '/../templates/barra.php';
?>

<div id="app">
    <nav class="tabs">
        <button type="button" data-paso="1">Productos</button>
        <button type="button" data-paso="2">Datos y Envío</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>    

    <div id="paso-1" class="seccion">
        <h2>Productos</h2>
        <p class="text-center">Elige tús productos a continuación: </p>        
        <div id="servicios" class="listado-servicios"></div>
        
    </div>
    <div id="paso-2" class="seccion">
        <h2>Datos de Envío</h2>
        <p class="text-center">Ingresa tús datos, fecha y dirección: </p>

        <form class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input
                    id="nombre"
                    type="text" 
                    placeholder="Tú Nombre"
                    value="<?php echo $nombre; ?>"
                    disabled
                />
            </div>
            <div class="campo">
                <label for="fecha">fecha</label>
                <input
                    id="fecha"
                    type="date"
                    min="<?php echo date('Y-m-d') ?>"
                />
            </div>
            
            <div class="campo">
                <label for="hora">Hora</label>
                <input
                    id="hora"
                    type="time"
                />
            </div>
            <input type="hidden" id="id" value="<?php echo $id;?>">
            <div class="campo">
                <label for="direccion">Escribe tú Dirección</label>
                <input
                    id="direccion"
                    type="text"
                    placeholder="Tú Dirección"
                />
            </div>
        </form>
    </div>
    <div id="paso-3" class="seccion contenido-resumen">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la información esté correcta: </p>        
    </div>

    <div class="paginacion">
        <button
            id="anterior"
            class="boton"
        >&laquo; Anterior</button>
        <button
            id="siguiente"
            class="boton"
        >Siguiente &raquo;</button>
    </div>
</div>

<?php 
    $script = "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    ";
?>