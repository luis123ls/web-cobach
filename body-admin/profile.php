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
    <title>PERFIL</title>
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
                    <a class="dropdown-item" href="profile.php"><i class="dw dw-user1"></i> Perfil</a>
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
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Profile</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-4 col-md-12 col-sm-12 mb-30">
                        <div class="pd-20 card-box height-100-p">
                            <div class="profile-photo">
                                <img src="assets/img/<?php echo $f_perfil;?>" alt="" class="avatar-photo">
                            </div>
                            <h5 class="text-center h5 mb-0">
                                <p><?php echo $_SESSION["usr"]; ?></p>
                            </h5>
                            <div class="profile-info">

                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href='#' role="button" data-toggle="dropdown">
                                            <i class='dw dw-more'></i>
                                        </a>

                                        <?php
	
								require("../body-php/controlador/bd.php");

								$consulta = "SELECT d.id_user,d.nombre,d.f_perfil,d.email,d.fechaN,d.telefono,d.ciudad,d.estado,d.Cpostal,d.Direccion 
								FROM user d WHERE id_user=".$_SESSION['id_user']."";



								$resultado=$conexion->query($consulta);

								while($fila = $resultado->fetch_array()){
								
								$nombre=$fila['nombre'];
								$email=$fila['email'];
								$f_perfil=$fila['f_perfil'];
								$fechaN=$fila['fechaN'];
								$telefono=$fila['telefono'];
								$ciudad=$fila['ciudad'];
								$estado=$fila['estado'];
								$Cpostal=$fila['Cpostal'];
								$Direccion=$fila['Direccion'];

								
								echo "<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
								<a class='dropdown-item' href='modificarU.php?id_user=".$fila['id_user']."><i class='dw dw-edit2'></i> Editar</a>
								</div>";

								}
								
								?>

                                    </div>
                                </td>
                                </td>
                                <h5 class="mb-20 h5 text-blue">Informacion</h5>
                                <ul>
                                    <li>
                                        <span>Email</span>
                                        <?php echo $email; ?>

                                    </li>
                                    <li>
                                        <span>Fecha de Nacimiento</span>
                                        <?php echo $fechaN; ?>
                                    </li>
                                    <li>
                                        <span>Telefono</span>
                                        <?php echo $telefono; ?>
                                    </li>
                                    <li>
                                        <span>Ciudad</span>
                                        <?php echo $ciudad; ?>
                                    </li>
                                    <li>
                                        <span>Estado</span>
                                        <?php echo $estado; ?>
                                    </li>
                                    <li>
                                        <span>Codigo Postal</span>
                                        <?php echo $Cpostal; ?>
                                    </li>
                                    <li>
                                        <span>Direccion:</span>
                                        <?php echo $Direccion; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require("menu/pie.php"); ?>
        </div>
    </div>
    <!-- js -->
    <script src="../vendors/scripts/core.js"></script>
    <script src="../vendors/scripts/script.min.js"></script>
    <script src="../vendors/scripts/process.js"></script>
    <script src="../vendors/scripts/layout-settings.js"></script>
    <script src="../src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
    <script src="../https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="../src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
    <script src="../vendors/scripts/highchart-setting.js"></script>
</body>
<?php
}
?>

</html>