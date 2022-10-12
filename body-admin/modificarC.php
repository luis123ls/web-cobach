<?php
  session_start();

  if($_SESSION["logueado"] == TRUE) {
  
  	require("../body-php/controlador/bd.php");
	$consulta2 = "SELECT * FROM user WHERE id_user=".$_SESSION['id_user']."";
	if($resultado2 = $conexion->query($consulta2)) 
  	{
		while($row2 = $resultado2->fetch_array()) 
		{
        	$tipo = $row2["tipo"];
        }
	}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>LISTA</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" 	href="../vendors/img/logo-with.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../vendors/img/logo-with.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../vendors/img/logo-with.png">
    
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
    </script>

</head>
<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Search Here">
                    <div class="dropdown">
                        <div class="dropdown-menu dropdown-menu-right">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="header-right">
        <?php
			require("../body-php/controlador/bd.php");
			$consulta = "SELECT d.id_user,d.f_perfil, d.nombre
			FROM user d WHERE id_user=".$_SESSION['id_user']."";  
			$resultado=$conexion->query($consulta);
			while($fila = $resultado->fetch_array()){
				$f_perfil=$fila['f_perfil'];
			}
			?>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="../body-admin/assets/img/<?php echo $f_perfil;?>" alt="">
                    </span>
                    <span class="user-name"><?php echo $_SESSION["usr"]; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Perfil</a>
                    <a class="dropdown-item" href="../body-php/controlador/salir.php"><i class="dw dw-logout"></i>
                        Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>

<body>
    <?php require("menu/menuV.php");?>

    <div class="mobile-menu-overlay"></div>


    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Editar</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Form grid Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Cliente</h4>

                        </div>
                    </div>
                    <!--recogemos los datos enviados del archivo list-client.php-->
                    <?php
                    $id_cliente = $_GET['id_cliente'];
                    $nombreC = $_GET['nombreC'];
                    $direC = $_GET['direC'];
                    $teleC = $_GET['teleC'];
                    $email = $_GET['email'];
                    $curp = $_GET['curp'];
                    $rfc = $_GET['rfc'];
                    $fechaC = $_GET['fechaC'];
                    $lugarNC = $_GET['lugarNC'];
                    $beneC = $_GET['beneC'];
					//Beneficiarios
					$direcB = $_GET['direcB'];
                    $teleB = $_GET['teleB'];
                    $emailB = $_GET['emailB'];
                    $curpB = $_GET['curpB'];
                    $rfcB = $_GET['rfcB'];
                    $fechaNB = $_GET['fechaNB'];
                    $lugarNB = $_GET['lugarNB'];
                    $banco = $_GET['banco'];
                    $claveI = $_GET['claveI'];
                    $fechaF = $_GET['fechaF'];
                    ?>

                    <form action="../body-php/controlador/editC.php" method="post">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Nombre completo</label>
                                    <input type="hidden" name="id_cliente" value="<?php echo $id_cliente;?>">
                                    <input type="text" class="form-control" name="nombreC"
                                        value="<?php echo $nombreC;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control" name="direC" value="<?php echo $direC;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="tel" class="form-control" name="teleC" value="<?php echo $teleC;?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Correo electronico</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Curp</label>
                                    <input type="text" class="form-control" name="curp" value="<?php echo $curp;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>RFC</label>
                                    <input type="text" class="form-control" name="rfc" value="<?php echo $rfc;?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Fecha de nacimiento</label>
                                    <input type="date" class="form-control" name="fechaC" value="<?php echo $fechaC;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Lugar de nacimiento</label>
                                    <input type="text" class="form-control" name="lugarNC"
                                        value="<?php echo $lugarNC;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Beneficiario</label>
                                    <input type="text" class="form-control" name="beneC" value="<?php echo $beneC;?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" name="direcB" value="<?php echo $direcB;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" name="teleB" value="<?php echo $teleB;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Correo electronico</label>
                                    <input type="email" class="form-control" name="emailB"
                                        value="<?php echo $emailB;?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>CURP</label>
                                    <input type="text" class="form-control" name="curpB" value="<?php echo $curpB;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>RFC</label>
                                    <input type="text" class="form-control" name="rfcB" value="<?php echo $rfcB;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Fecha de nacimiento</label>
                                    <input type="date" class="form-control" name="fechaNB"
                                        value="<?php echo $fechaNB;?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Lugar de nacimiento</label>
                                    <input type="text" class="form-control" name="lugarNB"
                                        value="<?php echo $lugarNB;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Nombre del Banco</label>
                                    <input type="text" class="form-control" name="banco" value="<?php echo $banco;?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Clave interbancaria</label>
                                    <input type="text" class="form-control" name="claveI" value="<?php echo $claveI;?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Fecha de firma</label>
                                    <input type="text" class="form-control" name="fechaF" value="<?php echo $fechaF;?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Actualizar"
                                        name="enviar">
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Form grid End -->
                </div>
                <?php require("menu/pie.php");?>
            </div>
        </div>
        <!-- js -->
        <script src="../vendors/scripts/core.js"></script>
        <script src="../vendors/scripts/script.min.js"></script>
        <script src="../vendors/scripts/process.js"></script>
        <script src="../vendors/scripts/layout-settings.js"></script>
</body>
<?php
}
?>

</html>