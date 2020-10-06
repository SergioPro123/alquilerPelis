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
<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="post" action="#">
            <div class="row">
                 <label for="username-2">
                    Username:
                    <input type="text" name="username" id="username-2" placeholder="Hugh Jackman" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
            </div>
           
            <div class="row">
                <label for="email-2">
                    your email:
                    <input type="password" name="email" id="email-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password" id="password-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="repassword-2">
                    re-type Password:
                    <input type="password" name="password" id="repassword-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
           <div class="row">
             <button type="submit">sign up</button>
           </div>
        </form>
    </div>
</div>
<!--end of signup form popup-->

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
		<table  id="pelis" class="table">
					<thead>
						<tr class="">
							<th><label>JAJAJJAJA</label></th>
							<th><label>JAJAJJAJA</label></th>
							<th><label>JAJAJJAJA</label></th>
						</tr>
					</thead>
					
					<tbody>
					<?php for($i=0; $i<15 ; $i++) { ?>
						<tr>
							<td>JAJAJJAJA</td>
							<td>JAJAJJAJA</td>
							<td>JAJAJJAJA</td>
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