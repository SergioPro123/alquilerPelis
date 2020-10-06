<!DOCTYPE html>
<head>
	<!-- Basic need -->
	<title>Open Pediatrics</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.22/datatables.min.css"/>
    <link rel="stylesheet" href="css/gestionPeli.css">
 

</head>
<body>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="images/logo1.png" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->



<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Gestión de Peliculas</h1>
					<ul class="breadcumb">
						<li style="padding-right: 20px;"><a href="index.php">Peliculas</a></li>
						<li class="active"><a href="peliculas.php">Gestionar Peliculas</a></li>

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-single">
	<div class="container">
    <div class="row">
        <form class="form-style-1 col-12" action="#">
                                <div class="row">
                                    <div class="col-12 ">
                                        <input class="submit" id="anadirPelicula" type="submit" value="Añadir Pelicula" style="cursor: pointer;">
                                    </div>
                                </div>
        </form>
    </div>
		<table  id="pelis" class="table">
					<thead>
						<tr class="">
							<th>Nombre</th>
							<th>Categoria</th>
							<th>Precio Dia</th>
							<th>Precio Dia</th>
							<th>Multa Dia</th>
							<th>Calificación</th>
							<th>Acción</th>

						</tr>
					</thead>
					
					<tbody>
					<?php for($i=0; $i<15 ; $i++) { ?>
						<tr>
							<td>Prueba 123</td>
							<td>Prueba 123</td>
							<td>Prueba 123</td>
							<td>Prueba 123</td>
							<td>Prueba 123</td>
							<td>Prueba 123</td>
							<td >
							<a href='editarPelicula' class='edit' data-toggle='modal'><i
										class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
							<a href='eliminarPelicula' class='delete' data-toggle='modal' data-target="#danger-header-modal"><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
							</td>

						</tr>
						<?php } ?>
					</tbody>	
					
				</table>
			</div>
	</div>
</div>
<!-- footer section-->
<footer class="ht-footer">
	<div class="container">
		<div class="flex-parent-ft">

		</div>
	</div>
</footer>
<!-- Modal Confirmacion de eliminar -->
<div class="login-wrapper"  id="modalEliminarPelicula">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3 class="m-0">Eliminar Pelicula</h3>
        <form method="post" action="#">
            <div class="row">
                 <p>¿Desea Eliminar la Pelicula?</p>
            </div>
           <div class="row">
             <button type="submit">Eliminar</button>
           </div>
        </form>
    </div>
</div>
<!-- FIN Modal Confirmacion de eliminar -->

<!--Modal Añadir Pelicula-->
<div class="login-wrapper"  id="modalAnadirPelicula">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Añadir Pelicula</h3>
        <form method="post" action="#">
            <div class="row">
                 <label for="nombre" class="col-9 pl-0">
                    Nombre:
                    <input type="text" name="nombre" id="nombre" placeholder="" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
                <label for="anio" class="col-3 pl-15 pr-0   ">
                    Año:
                    <input type="number" name="anio" id="anio" placeholder="" required="required" minlength="0" maxlength="4"/>
                </label>
            </div>
            <div class="row">
                <label for="descripcion">
                    Descripcion:
                    <textarea  name="descripcion" id="descripcion" placeholder=""  rows="2">
                    </textarea>
                </label>
            </div>
             <div class="row">
                <label for="calificacion" class="col-3 pl-0">
                    Calificación:
                    <input type="number" min="0" max="10" name="calificacion" id="calificacion" placeholder="" required="required" />
                </label>
                <label for="calificacion" class="col-9 pl-15 pr-0 ">
                    Categoria:
                    <select  name="calificacion" id="calificacion" required="required" class="mt-3">
                        <option value="terror">Terror</option>
                    </select>
                </label>
            </div>
            <div class="row">
                <label for="precioDia" class="col-6 pl-0">
                    Precio por Día:
                    <input type="number" name="precioDia" id="precioDia" placeholder="" required="required" />
                </label>
                <label for="multaDia" class="col-6 pl-15 pr-0   ">
                    Multa por Día:
                    <input type="number" name="multaDia" id="multaDia" placeholder="" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="image" class="col pl-0">
                    Imagen:
                    <input type="file" accept="image/*" name="password" id="image" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
           <div class="row">
             <button type="submit">Enviar</button>
           </div>
        </form>
    </div>
</div>
<!--fin Modal Añadir Pelicula-->

<!--Modal Editar Pelicula-->
<div class="login-wrapper"  id="modalEditarPelicula">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Editar Pelicula</h3>
        <form method="post" action="#">
            <div class="row">
                 <label for="nombre" class="col-9 pl-0">
                    Nombre:
                    <input type="text" name="nombre" id="nombre" placeholder="" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
                <label for="anio" class="col-3 pl-15 pr-0   ">
                    Año:
                    <input type="number" name="anio" id="anio" placeholder="" required="required" minlength="0" maxlength="4"/>
                </label>
            </div>
            <div class="row">
                <label for="descripcion">
                    Descripcion:
                    <textarea  name="descripcion" id="descripcion" placeholder=""  rows="2">
                    </textarea>
                </label>
            </div>
             <div class="row">
                <label for="calificacion" class="col-3 pl-0">
                    Calificación:
                    <input type="number" min="0" max="10" name="calificacion" id="calificacion" placeholder="" required="required" />
                </label>
                <label for="calificacion" class="col-9 pl-15 pr-0 ">
                    Categoria:
                    <select  name="calificacion" id="calificacion" required="required" class="mt-3">
                        <option value="terror">Terror</option>
                    </select>
                </label>
            </div>
            <div class="row">
                <label for="precioDia" class="col-6 pl-0">
                    Precio por Día:
                    <input type="number" name="precioDia" id="precioDia" placeholder="" required="required" />
                </label>
                <label for="multaDia" class="col-6 pl-15 pr-0   ">
                    Multa por Día:
                    <input type="number" name="multaDia" id="multaDia" placeholder="" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="image" class="col pl-0">
                    Imagen:
                    <input type="file" accept="image/*" name="password" id="image" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
           <div class="row">
             <button type="submit">Actualizar</button>
           </div>
        </form>
    </div>
</div>
<!--fin Modal Editar Pelicula-->

<!-- end of footer section-->

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.22/datatables.min.js"></script>

<script>	
$(document).ready( function () {
    $('#pelis').DataTable({
    language: {
        search: 'Buscar',
        emptyTable: 'No hay datos disponibles en la tabla',
        info: 'Visualizando _START_ a _END_ de _TOTAL_ registros',
        infoEmpty: 'Visualizando 0 a 0 de 0 registros',
        infoFiltered: '(Filtrado de _MAX_ registros totales)',
        infoPostFix: '',
        thousands: ',',
        lengthMenu: 'Visualizar _MENU_ registros',
        loadingRecords: 'Cargando...',
        processing: 'Procesando...',
        zeroRecords: 'No se encontraron registros coincidentes',
        paginate: {
            first: 'Primero',
            last: 'Último',
            next: '>',
            previous: '<',
        },
        aria: {
            sortAscending: ': activar para ordenar la columna ascendente',
            sortDescending: ': activar para ordenar la columna descendente',
        },
    },
});
} );
</script>
</body>

</html>