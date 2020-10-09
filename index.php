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
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">



</head>
<body>
<?php

require_once ("php/script_gestionPelis.php");
$peliculas = new misPelis();
$datos = $peliculas->consultarPelis();
?>
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
					<h1>Alquiler de Peliculas</h1>
					<ul class="breadcumb">
						<li class="active" style="padding-right: 20px;"><a href="index.php">Peliculas</a></li>
						<li ><a href="peliculas.php">Gestionar Peliculas</a></li>

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="topbar-filter fw">
					<p>Se encontro <span><?= count($datos)?> Peliculas</span> en total</p>
					<label>Ordenar por:</label>
					<select>
						<option value="popularity">Popularidad Descendente</option>
						<option value="popularity">Popularidad Ascendente</option>
						<option value="date">Fecha de lanzamiento Descendente</option>
						<option value="date">Fecha de lanzamiento ascendente</option>
					</select>
				</div>

				<div class="flex-wrap-movielist mv-grid-fw" id="contenedorPelis">
					<?php for($j = 0; $j<30; $j++){ ?>
						<div class="movie-item-style-2 movie-item-style-1" id="<?php  echo "pelicula-".$j ?>">
							<img src="images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
							<a  href="#" class="btn signupLink"> Detalles<i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	
				<?php } ?>
					
				</div>		


				<div class="topbar-filter">
					<label>Peliculas por pagina:</label>
					<select>
						<option value="range">24 Peliculas</option>
						<option value="saab">12 Peliculas</option>
					</select>
					<div id="pagination-container" class="pagination2"></div>
				</div>
			</div>
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

<!-- Modal DETALLES DE FACTURA -->
<div class="login-wrapper"  id="modalFacturaPelicula" >
    <div class="login-content" style="width: 500px;">
        <a href="#" class="close">x</a>
        <h3 class="m-0 mb-5">Precios</h3>
        <form method="post" action="php/peliculasMetodos.php">
            <div class="row mt-3">
				<div class="col">
					<label  class="mb-0">Dias a Alquilar</label>
				</div>
				<div class="col">
					<p class="mt-0 mb-0"  id="diasFactura">
						12 Dias
					</p>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col">
					<label  class="mb-0">Precio Por Día</label>
				</div>
				<div class="col">
					<p class="mt-0 mb-0"  id="precioDiaFactura">
						$ 5000
					</p>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col">
					<label  class="mb-0 " >Multa Por Día</label>
				</div>
				<div class="col">
					<p class="mt-0 mb-0" id="multaDiaFactura">
						$ 6.000
					</p>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col">
					<label  class="mb-0 " >Precio Total</label>
				</div>
				<div class="col">
				<strong>
					<p class="mt-0 mb-0" id="precioTotalFactura">
						$ 10.000
					</p>
				</strong>
				</div>
			</div>
			<input type="text" name="idPelicula" style="display:none" value="">
           <div class="row mt-5">
             <button type="submit" name="alquilar">Aceptar</button>
           </div>
        </form>
    </div>
</div>
<!-- FIN Modal DETALLES DE FACTURA -->
<!--Modal Detalles Pelicula-->
<div class="login-wrapper m-2"  id="modalDetallesPelicula">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <form method="post" action="#">
            
			<div class="row">
				<div class="col">
					<img src="uploads/images/898253070-imagenes-buenos-dias-snoopy-7.jpg" id="imagen" style="height: 100%;">
				</div>

				<div class="col">
					<div class="row">
						<div class="col">
							<h3 style="margin-bottom: 20px;" id="nombre">Flash</h3>
						</div>
					</div>
					<div class="row">
						<div class="col">
						<label class="mb-0">Descripción</label>
								<p class="mt-0" id="descripcion" style="height: 120px;">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos repellat perferendis velit nihil possimus similique quae harum eos aliquam? Accusantium aspernatur deserunt, praesentium voluptates maiores facilis. Consectetur magni odio ad.
								</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label  class="mb-0" >Categoria</label>
							<p class="mt-0" id="categoria">
								Terror
							</p>
						</div>
						<div class="col">
							<label  class="mb-0" >Calificación</label>
								<p class="mt-0" id="calificacion">
									8 Puntos
								</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label  class="mb-0" >Precio por Día</label>
							<p class="mt-0" id="precioDia">
								6.000
							</p>
						</div>
						<div class="col">
							<label  class="mb-0" >Multa por Día</label>
								<p class="mt-0" id="multaDia">
									8.000
								</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label  class="mb-0" >Cantidad de Visitas</label>
							<p class="mt-0" id="numeroAlquilados">
								6.000
							</p>
						</div>
						<div class="col">
							<label  class="mb-0" id="multaDia">Cantidad de Dias
								<input type="number" min="1" value="1" id="dias" >
							</label>
								
						</div>
					</div>
					<div class="row">
						<div class="col">
						<button type="submit" class="facturaPelicula" id="" style="margin-top: 13px;">Alquilar Pelicula</button>
						</div>
					</div>
				</div>
            </div>
        </form>
    </div>
</div>
<!--end of Modal Detalles Pelicula-->
<!-- end of footer section-->

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="lib/js/pagination.min.js"></script>
<script>
	var dataPeliculaPHP = Array();
</script>
<?php 

for($i = 0;$i<count($datos);$i++){
	?>
<script>
	 dataPeliculaPHP["id-"+Number("<?= $datos[$i][0] ?>")] = Array();
</script>
<?php 
	for($j = 0; $j<=9; $j++){
?>
<script>
	dataPeliculaPHP["id-"+Number("<?= $datos[$i][0] ?>")][Number("<?= $j ?>")] = "<?= $datos[$i][$j] ?>";
</script>
<?php }} ?>
<script src="js/custom.js"></script>

<script>

var dataPelicula = [];
for(let i=0; i<Object.keys(dataPeliculaPHP).length; i++){
	
	dataPelicula[i]="<div class='movie-item-style-2 movie-item-style-1' >"+
						`<img src='${dataPeliculaPHP[Object.keys(dataPeliculaPHP)[i]][8]}' alt=''>`+
						`<div class='hvr-inner detallesPelicula' id="id-${dataPeliculaPHP[Object.keys(dataPeliculaPHP)[i]][0]}" >`+
						`<a  href='#' class='btn'  > Detalles<i class='ion-android-arrow-dropright'></i> </a>`+
	            		"</div>"+
						"<div class='mv-item-infor'>"+
						`<h6><a href='#' >${dataPeliculaPHP[Object.keys(dataPeliculaPHP)[i]][1]}</a></h6>`+
						`<p class='rate'><i class='ion-android-star'></i><span>${dataPeliculaPHP[Object.keys(dataPeliculaPHP)[i]][7]}</span> /10</p>`+
						"</div>"+
						"</div>";
}	

$('#pagination-container').pagination({
	dataSource:dataPelicula,
	pageSize:12,
    callback: function(data, pagination) {
        // template method of yourself
        var html = data;
        $('#contenedorPelis').html(html);
    }
});

</script>


</body>

</html>