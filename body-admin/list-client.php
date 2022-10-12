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
        <div class="card-box mb-20 table-responsive">
            <h2 class="h4 pd-20">Clientes</h2>
            <table class="data-table table nowrap table">
                <thead>
                <tbody>
                    <tr>

                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>CURP</th>
                        <th>RFC</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Lugar de Nacimiento</th>
                        <th>Beneficiario</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>CURP</th>
                        <th>RFC</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Lugar de Nacimiento</th>
                        <th>Banco</th>
                        <th>Clave Interbancaria</th>
                        <th>Fecha de Firma</th>
                        <th class="datatable-nosort">Accion</th>

                        <?php
							require("../body-php/controlador/bd.php");

							$buscador="";
							if(isset($_GET['buscador'])){
								$buscador=$_GET['buscador'];
							}

							$consulta = "SELECT d.id_cliente, d.nombreC, d.direC, d.teleC, d.email, d.curp, d.rfc, d.fechaC, d.lugarNC, beneC,d.direcB, d.teleB, d.emailB, d.curpB, d.rfcB, d.fechaNB, d.lugarNB, d.banco, d.claveI, fechaF 
							FROM cliente d WHERE id_cliente"; 

							$resultado=$conexion->query($consulta);

							while($fila = $resultado->fetch_array()){
													
							echo "<tr>";
							echo "<td>".$fila['nombreC']."</td>";
							echo "<td>".$fila['direC']."</td>";
							echo "<td>".$fila['teleC']."</td>";
							echo "<td>".$fila['email']."</td>";
							echo "<td>".$fila['curp']."</td>";
							echo "<td>".$fila['rfc']."</td>";
							echo "<td>".$fila['fechaC']."</td>";
							echo "<td>".$fila['lugarNC']."</td>";
							echo "<td>".$fila['beneC']."</td>";
							echo "<td>".$fila['direcB']."</td>";
							echo "<td>".$fila['teleB']."</td>";
							echo "<td>".$fila['emailB']."</td>";
							echo "<td>".$fila['curpB']."</td>";
							echo "<td>".$fila['rfcB']."</td>";
							echo "<td>".$fila['fechaNB']."</td>";
							echo "<td>".$fila['lugarNB']."</td>";
							echo "<td>".$fila['banco']."</td>";
							echo "<td>".$fila['claveI']."</td>";
							echo "<td>".$fila['fechaF']."</td>";
							echo "<td>
							<div class='dropdown'>
								<a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#' role='button' data-toggle='dropdown'>
									<i class='dw dw-more'></i>
								</a>
								<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
										<a class='dropdown-item' href='modificarC.php?id_cliente=".$fila['id_cliente']."&nombreC=".$fila['nombreC']."&direC=".$fila['direC']."&teleC=".$fila['teleC']."&email=".$fila['email']."&curp=".$fila['curp']."&rfc=".$fila['rfc']."&fechaC=".$fila['fechaC']."&lugarNC=".$fila['lugarNC']."&beneC=".$fila['beneC']."&direcB=".$fila['direcB']."&teleB=".$fila['teleB']."&emailB=".$fila['emailB']."&curpB=".$fila['curpB']."&rfcB=".$fila['rfcB']."&fechaNB=".$fila['fechaNB']."&lugarNB=".$fila['lugarNB']."&banco=".$fila['banco']."&claveI=".$fila['claveI']."&fechaF=".$fila['fechaF']."'><i class='dw dw-edit2'></i> Editar</a>
										<a class='dropdown-item' href='../body-php/controlador/deleteC.php?id_cliente=".$fila['id_cliente']."'><i class='dw dw-delete-3'></i> Eliminar</a>
									</div>
								</div>
							</td>
							
							</td>";
							echo "</tr>";
							}
							$conexion->close();
							?>
                    </tr>
                    </thead>
                </tbody>
            </table>
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