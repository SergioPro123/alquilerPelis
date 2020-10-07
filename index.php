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
					<a href="movielist.html" class="list"><i class="ion-ios-list-outline "></i></a>
					<a  href="moviegridfw.html" class="grid"><i class="ion-grid active"></i></a>
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


<!--Modal Detalles Pelicula-->
<div class="login-wrapper"  id="modalDetallesPelicula">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Detalles de Pelicula</h3>
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
<!--end of Modal Detalles Pelicula-->
<!-- end of footer section-->

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
<script src="lib/js/pagination.min.js"></script>
<script>
	var dataPeliculaPHP = Array();
</script>
<?php 

for($i = 0;$i<count($datos);$i++){
	?>
<script>
	 dataPeliculaPHP[Number("<?= $i ?>")] = Array();
</script>
<?php 
	for($j = 0; $j<=8; $j++){
?>
<script>
	dataPeliculaPHP[Number("<?= $i ?>")][Number("<?= $j ?>")] = "<?= $datos[$i][$j] ?>";
</script>
<?php }} ?>

<script>

var dataPelicula = [];
console.log(dataPeliculaPHP);
for(let i=0; i<dataPeliculaPHP.length; i++){
	
	dataPelicula[i]="<div class='movie-item-style-2 movie-item-style-1' >"+
						`<img src='${dataPeliculaPHP[i][8]}' alt=''>`+
						"<div class='hvr-inner detallesPelicula' >"+
						"<a  href='#' class='btn' > Detalles<i class='ion-android-arrow-dropright'></i> </a>"+
	            		"</div>"+
						"<div class='mv-item-infor'>"+
						`<h6><a href='#' >${dataPeliculaPHP[i][1]}</a></h6>`+
						`<p class='rate'><i class='ion-android-star'></i><span>${dataPeliculaPHP[i][7]}</span> /10</p>`+
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