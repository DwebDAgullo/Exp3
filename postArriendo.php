<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>FlockFuster, circa 1996</title>
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<?php 
	$pelicula = isset($_POST['pelicula']) ? $_POST['pelicula'] : '';
	$unidad = isset($_POST['units']) ? $_POST['units'] : '';
	$despacho = isset($_POST['despacho']) ? $_POST['despacho'] : '';

	$peli1 = "Matrix";
	$peli2 = "Psicosis";

	$error = '';
	    if( (strcmp($pelicula,$peli1) == 0 && $unidad > 2) || 
	    	(strcmp($pelicula,$peli2) == 0 && $unidad > 3)
	    	) {
	      $error = 'No tenemos tantas películas.';
	    } else if (strcmp($pelicula,$peli1) !== 0 &&
	    	strcmp($pelicula,$peli2) !== 0 ) {
	    	$error = 'No existe pelicula.';
	    }
	    // Vista de error
	    if(!empty($error)) {
	    ?>
	    <div class="alert alert-info">
	      <i class="glyphicon glyphicon-info-sign"></i>
	      <?php echo $error; ?>
	    </div>
	    <a href="./" class="btn btn-warning">
	      <i class="glyphicon glyphicon-chevron-left"></i>
	      Volver
	    </a>

	    <?php
	    
	    } else {
	    ?>
	    <div class="alert alert-info">
	      <i class="glyphicon glyphicon-info-sign"></i>
	      Has arrendado <?php echo $unidad; ?> unidad(es) de <?php echo $pelicula; ?>.
	      </br>
	      Instrucciones de despacho: <?php echo $despacho; ?>
	    </div>
<?php } ?>


<!-- SCRIPTS -->

<script type="text/javascript">
	function checkMovie(value) {
		if(value != "Matrix" && value != "Psicosis") {
			document.getElementById('msgPel').innerHTML = 'No tenemos esa película.';
		} else {
			document.getElementById('msgPel').innerHTML = '';

		}
	}

	function checkUnits(value) {
		if(isNaN(value)) {
			document.getElementById('msgUn').innerHTML = 'Por favor ingrese un número.';
		} else {
			document.getElementById('msgUn').innerHTML = '';
		}
	}


	function checkForm(ev) {
		ev.preventDefault();
		var unid = document.getElementById('units').value;
		var peli = document.getElementById('pelicula').value;

		if( (peli == 'Matrix' && unid > 2) || (peli == 'Psicosis' && unid > 3) ) {
			document.getElementById('msgUn').innerHTML = 'No tenemos tantas peliculas.';
		} else {
			document.getElementById('msgSucc').innerHTML = 'Arrendado Exitosamente!';
		}

	}



</script>

<script type="text/javascript" src="bower_components/jquery/dist/jquery.js" />
<script type="text/javascript" src="bower_components/ajax/dist/ajax.min.js" />
<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"/>
</html>