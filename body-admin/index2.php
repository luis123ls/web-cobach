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
    <title>Partner Jr</title>
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
    <link rel="stylesheet" type="text/css" href="../src/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
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
        <div class="pd-ltr-20">


            <!-- Input Validation Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="text-center">
                        <h4 class="text-blue h4">PARTNER JR</h4>
                        <p class="mb-30"></p>
                    </div>
                </div>
                <form>
                    <div class="row">

                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <input type="hidden">
                            </div>
                        </div>


                        <div class="col-md-3 col-sm-12">
                            <div class="form-group text-center">
                                <label>Inversion total</label>
                                <input type="number" class="form-control" name="inversionI" id="inversionI"
                                    onchange="validar()" vallue="<?php echo "$".$inversion;?>">
                            </div>
                            <script type="text/javascript">
                            function validar() {
                                var inversion = document.getElementById("inversionI").value;
                                if (inversion < 2000) {
                                    alert("Ingrese una cantidad mayor o igual a $2000");

                                }
                            }
                            </script>
                        </div>
                        <div class="col-md-3 col-sm-12 text-center">
                            <div class="form-group">
                                <label>Plazo</label>
                                <select name="plazo" class="form-control" id="plazo">
                                    <option value="6">6 meses</option>
                                    <option value="9">9 meses</option>
                                    <option value="12">12 meses</option>
                                    <option value="18">18 meses</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <div class="hidden">
                            </div>
                        </div>
                        <?php

                            $inversion=$_GET['inversionI'];
                            $plazo = $_GET['plazo'];
                            $iva = 1.16;
                            $iva2 = 0.16;
                            $mes = 12;

							/*tasa mensual*/
							$tasas = 2.5/100;							
							$tasa=$tasas*$plazo;
							$tasamensual=$tasa*100;	
							
							
                            
                            
                            $tasamensualTru=$tasas*100;
							//echo $tasamensualTru;
                            //echo $tasamensualTru;

							/*tasa mensual*/

                            /*tasa anual 2*/
                            $tsm=$tasas*100;
							$tasaanual=$tsm*$mes;
                            //echo $tasaanual;
                            /*listo*/

                            /*Tasa neta mensual 3*/
                            $Tnm=$tsm/$iva;
                            //echo $Tnm;
                            /*tasa neta mensual*/


                            /*Tasa neta anual 4*/
                            $Tna=$Tnm*$mes;
                            //echo $Tna;
                            /*Tasa neta anual*/


                            /*TABLA*/
                            /*monto invertido*/ 
                            $mI=$inversion/$plazo;
                            /*monto invertido*/ 
                            
                            /*tasa neta*/ 
                            $tN=$mI*$tasas;
                            /*tasa neta*/ 

                            /*IVA*/
                            $ivResultado = $tN*$iva2;
                            /*IVA*/


                            /*RENDIMIENTO*/
                            $rendimiento=$tN+$ivResultado;
                            /*RENDIMIENTO*/

							
                              
							/**/
							$DateAndTime = date('m-d-Y ');  
							$obj = 	(object)[
								
								"fechaInicio" => $DateAndTime,
								"numPago" => 1,
								"montoInvertido" => $mI,
								"tasaNeta" => $tN,
								"ivaR" => $ivResultado,
								"rendimientoP" => $rendimiento
								//"devcapi" => $inversion
								
								
							];
							$tabla = array();
							$tabla[0] = $obj;
                            

							$acTasa = $tN;
							$acRen = $ivResultado;
							$acrendi = $rendimiento;
							
							for($i = 2; $i <= $plazo; $i++) 
							{	
								$fechaInicioTemp =  $DateAndTime;
								$ii = $i - 2;
								$montoInvertidoTemp = array_values($tabla)[$ii]->montoInvertido;
								$tasaNetaTemp = $tN;
								$ivaTemp = $tasaNetaTemp * $iva2;
								$rendimientoTemp = $tasaNetaTemp + $ivaTemp;
								//$devcapitalTemp = $inversion;


								$acTasa = $acTasa + $tN;
								$acRen = $acRen + $ivaTemp;
								$acrendi = $acrendi + $rendimientoTemp;

								$tabla2 = (object)[
									"fechaInicio" => $fechaInicioTemp,
									"numPago" => $i,
									"montoInvertido" => $montoInvertidoTemp,
									"tasaNeta" => $acTasa,
									"ivaR" => $acRen,
									"rendimientoP" => $acrendi
									//"devCapital" => $devcapitalTemp	
								];
								$tabla[$i - 1] = $tabla2;
								//print_r($tabla2);
							}

							?>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-12 hidden"></div>
                        <div class="col-md-6 col-sm-12">
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Calcular"
                                name="Calcular" id="Calcular">
                        </div>
                        <div class="col-md-3 col-sm-12 hidden"></div>
                    </div>
                </form>

                <!-- Input Validation End -->
            </div>
        </div>

        <div class="card-box mb-30 table-responsive">
            <!--<h2 class="h4 pd-20 text-center">ANEXO A</h2>-->
            <h2 class="h6 pd-20 text-center">DESGLOSE DEL PAGO MENSUAL</h2>
            <a class="col-md-2" href="../body-php/controlador/pdf2.php"><i class="con-copy fa fa-file-pdf-o"></i>
                Generar PDF</a>
            <table class="data-table table nowrap">
                <thead>
                    <tr>

                        <th>Fecha</th>
                        <th>Mes</th>
                        <th>Monto Invertido</th>
                        <th>Tasa Neta</th>
                        <th>IVA</th>
                        <th>Rendimiento</th>
                        <!--<th>Dev Capital</th>-->


                        <!-- <th>Devolucion capital</th> -->

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
								
								
							$idx = 0;
							$rendimientoTotal = $rendimiento;

							$fecha = '';
							$mes = '';
							$monto = '';
							$$tasa = '';
							$ivaTa = '';
							$rendiTa = '';
							$devta = '';

								
							while($idx < $plazo){

									
									echo "<tr>";
									$v1=($fechaInicioTemp);
									$v2=(array_values($tabla)[$idx]->numPago);
									$v3=(array_values($tabla)[$idx]->montoInvertido);
									$v4=((int)array_values($tabla)[$idx]->tasaNeta);
									$v5=((int)array_values($tabla)[$idx]->ivaR);
									$v6=(array_values($tabla)[$idx]->rendimientoP);
									echo "</tr>";


									echo '<td>'.$v1.'</td>';
									echo '<td>'.$v2.'</td>';
									echo '<td>'.$v3.'</td>';
									echo '<td>'.$v4.'</td>';
									echo '<td>'.$v5.'</td>';
									echo '<td>'.$v6.'</td>';


									$fecha    =  $fecha.$v1.',';
									$mes      =  $mes.$v2.',';
									$monto    =  $monto.$v3.',';
									$tasa     =  $tasa.$v4.',';
									$ivaTa    =  $ivaTa.$v5.',';
									$rendiTa  =  $rendiTa.$v6.',';
									$devta    =  $inversionTotal;
									$idx++;




								$rendimientoTotal = array_values($tabla)[$idx]->rendimientoP+$rendimientoTotal;
								$inversionTotal = $inversion;
								$mFinal = $rendimientoTotal + $inversionTotal;
										
									
							}

							$rendimientoTotal;
							$mFinal;
							$tasamensualTru;
							$tasaanual;
							$Tnmensual=(int)$Tnm;
							$tnAnual=(int)$Tna;

							$query = "INSERT INTO partnerpdf (inversionT,plazo,rTotal,mFinal,tMensual,tAnual,tnMensual,tnAnual,fecha,mes,mInvertido,tNeta,iva,rendimiento,dCapital) 
							VALUES ('$inversion','$plazo','$rendimientoTotal','$mFinal','$tasamensualTru','$tasaanual','$Tnmensual','$tnAnual','$fecha','$mes','$monto','$tasa','$ivaTa','$rendiTa','$inversion')"; //,'$fecha','$mes','$monto','$tasa','$ivaTa','$rendimientoTotal','$devta')";
							$result = mysqli_query($conexion, $query);
			
									
							// $query = "INSERT INTO cotizador (inversio,plazo,tMensual,tAnual,tnmensual,tnAnual,rPeriodo,mFinal) 
							// VALUES ('$inversion','$plazo','$tasamensual','$tasaanual','$tasanetamunsual','$tasanetaanual','$rendimientoPeriodoTemp','$montoFinalTemp')";
							// $result = mysqli_query($conexion, $query);		
						?>
                    </tr>
                </tbody>
            </table>
            <?php
				//echo "Inversion total:  $".$inversionTotal."  * ";							
				echo "El rendimiento total:  $".$rendimientoTotal."  * ";
				echo "El monto final:  $".$mFinal."  * ";
				echo "La tasa mensual: ".$tasamensualTru."%  * ";
				echo "La tasa anual: ".$tasaanual."%  * ";
				echo "La tasa neta mensual: ".$Tnmensual."%  * ";
				echo "La tasa neta anual: ".$tnAnual."%"; 								
			?>
        </div>
        <?php require("menu/pie.php");?>
    </div>
    </div>
    <!-- js -->
    <script src="../vendors/scripts/core.js"></script>
    <script src="../vendors/scripts/script.min.js"></script>
    <script src="../vendors/scripts/process.js"></script>
    <script src="../vendors/scripts/layout-settings.js"></script>
    <script src="../src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
    <script src="../src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
    <script src="../src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
    <script src="../src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="../src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../vendors/scripts/dashboard2.js"></script>
</body>
<?php
}
?>

</html>