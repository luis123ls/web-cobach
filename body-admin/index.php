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
    <title>FINANCIERA</title>

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
    <link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/responsive.bootstrap4.min.css">
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
                        <h4 class="text-blue h4">COTIZADOR</h4>
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
                            <div class="form-group">
                                <label>Inversion inicial</label>
                                <input type="number" class="form-control" name="inversionI" id="inversionI"
                                    onchange="validar()" vallue="<?php echo "$".$inversion;?>">
                            </div>
                            <script type="text/javascript">
                            function validar() {
                                var inversion = document.getElementById("inversionI").value;
                                if (inversion < 5000) {
                                    alert("Ingrese una cantidad mayor o igual a $5000");

                                }
                            }
                            </script>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label>Plazo</label>
                                <select name="plazo" class="form-control" id="plazo">
                                    <option value="3">3 meses</option>
                                    <option value="4">4 meses</option>
                                    <option value="5">5 meses</option>
                                    <option value="6">6 meses</option>
                                    <option value="7">7 meses</option>
                                    <option value="8">8 meses</option>
                                    <option value="9">9 meses</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-3 col-sm-12">
                            <div class="hidden">
                            </div>
                        </div>

                        <?php
							/*tasa mensual*/
							$tasas = 2/100;
							$plazo = $_GET['plazo'];
							$tasa=$tasas*$plazo;
							$tasamensual=$tasa*100;							
							/*tasa mensual*/

							/*tase neta mensual*/ 
							$iva = 1.16;
							$tasanetamunsual=$tasamensual/$iva;
							/*tase neta mensual*/ 
							
							$inversion=$_GET['inversionI'];
							$tasaneta=$inversion*$tasanetamunsual/100;	
							
							
							$iva2 = 0.16;
							$ivaresultado=$tasaneta*$iva2;

							$rendimiento=$ivaresultado+$tasaneta;
							
							/*pago mensual*/						
							$r1=($tasamensual/100)*$inversion;
							$r2=$tasamensual/100;
							$r3=(1+$r2)*100;
							$r4=$r3/100;
							$r5=pow($r4,-$plazo);
							$r6=1-$r5;
							$pagomensual=$r1/$r6;
											
							/*tasa anual*/
							$mes = 12;
							$tasaanual=$tasamensual*$mes;
							/*tasa neta anual*/
							$tasanetaanual=$tasanetamunsual*$mes;
							/*abono a capital*/
							$ab1=$tasaneta+$ivaresultado;
							$ab2=$pagomensual-$ab1;
							/*saldo*/
							$saldo=$inversion-$ab2;



							/**/
							$DateAndTime = date('m-d-Y ');  
							$obj = 	(object)[
								
								"fechaInicio" => $DateAndTime,
								"numPago" => 1,
								"montoInvertido" => $inversion,
								"pagoMensual" => $pagomensual,
								"tasaNeta" => $tasaneta,
								"ivaT" => $ivaresultado,
								"rendimientoP" => $rendimiento,
								"abonoCapital" => $ab2,
								"saldo" => $saldo
							];
							$tabla = array();
							$tabla[0] = $obj;
							//print_r(array_values($tabla)[0]->montoInvertido);
							//echo $tabla()[0];
							for($i = 2; $i <= $plazo; $i++) 
							{	
								$fechaInicioTemp =  $DateAndTime;
								$ii = $i - 2;
								$montoInvertidoTemp = array_values($tabla)[$ii]->saldo;
								$tasaNetaTemp = (array_values($tabla)[$ii]->saldo * $tasanetamunsual) / 100;
								$ivaTemp = ($tasaNetaTemp * $iva2);
								$rendimientoTemp = $tasaNetaTemp + $ivaTemp;
								$abonoCapitalTemp = ($pagomensual - $rendimientoTemp);
								$saldoTemp = $montoInvertidoTemp - $abonoCapitalTemp;

								$tabla2 = (object)[
									"fechaInicio" => $fechaInicioTemp,
									"numPago" => $i,
									"montoInvertido" => $montoInvertidoTemp,
									"pagoMensual" => $pagomensual,
									"tasaNeta" => $tasaNetaTemp,
									"ivaT" => $ivaTemp,
									"rendimientoP" => $rendimientoTemp,
									"abonoCapital" => $abonoCapitalTemp,
									"saldo" => $saldoTemp
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
            <!--<a class="col-md-2" href="../body-php/controlador/oterpru.php"><i class="con-copy fa fa-file-pdf-o"></i> Generar PDF</a>-->
            <div class="col-md-2">
                <a href="../body-php/controlador/pdf1.php">
                    <button type="button" class="btn btn-outline-secondary">Generar PDF</button>
                </a>
            </div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>

                        <th>Fecha</th>
                        <th>N° Pago</th>
                        <th>Monto Invertido</th>
                        <th>Pago Mensual</th>
                        <th>Tasa Neta</th>
                        <th>IVA</th>
                        <th>Rendimiento</th>
                        <th>Abono a capital</th>
                        <th>Saldo</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
								//print_r(array_values($tabla));
								$rendimientoPeriodoTemp;	
								$montoFinalTemp;
								$idx = 0;

								$fecha = '';
								$numpago = '';
								$monto = '';
								$pago1 = '';
								$tasa1 = '';
								$iva0 = '';
								$rendi = '';
								$abo = '';
								$sal = '';

								while($idx < $plazo){

																
									echo "<tr>";
									$v0=($fechaInicioTemp);
									$v1=(array_values($tabla)[$idx]->numPago);
									$v2=((int)array_values($tabla)[$idx]->montoInvertido);
									$v3=((int)array_values($tabla)[$idx]->pagoMensual);
									$v4=((int)array_values($tabla)[$idx]->tasaNeta);
									$v5=((int)array_values($tabla)[$idx]->ivaT);
									$v6=((int)array_values($tabla)[$idx]->rendimientoP);
									$v7=((int)array_values($tabla)[$idx]->abonoCapital);
									$v8=((int)array_values($tabla)[$idx]->saldo);
									echo "</tr>";			

									echo '<td>'.$v0.'</td>';
									echo '<td>'.$v1.'</td>';
									echo '<td>'.$v2.'</td>';
									echo '<td>'.$v3.'</td>';
									echo '<td>'.$v4.'</td>';
									echo '<td>'.$v5.'</td>';
									echo '<td>'.$v6.'</td>';
									echo '<td>'.$v7.'</td>';
									echo '<td>'.$v8.'</td>';

									$fecha = $fecha.$v0.',';
									$numpago=$numpago.$v1.',';
									$monto=$monto.$v2.',';
									$pago1=$pago1.$v3.',';
									$tasa1=$tasa1.$v4.',';
									$iva0=$iva0.$v5.',';
									$rendi=$rendi.$v6.',';
									$abo=$abo.$v7.',';
									$sal=$sal.$v8.',';
																					
									//guardarDatosTabla(array_values($tabla)[$idx]);
									$rendimientoPeriodoTemp = array_values($tabla)[$idx]->rendimientoP+$rendimientoPeriodoTemp;									
									//$bonificacion= $_GET['bonificacion'];									
									$montoFinalTemp = array_values($tabla)[$idx]->pagoMensual+$montoFinalTemp;
									//$montoFinalTemp = $pagoMensualTemp+$bonificacion;
									$idx++;
									
								}

								$tasamensual;
								$entasanetamensual = (int)$tasanetamunsual;
								$entasanetaanual = (int)$tasanetaanual;
								$tasaanual;
								$enrendipe = (int)$rendimientoPeriodoTemp;
								$enmontofina = (int)$montoFinalTemp;

								/*if(isset($_GET["Guardar"])) {
									$query = "INSERT INTO cotizador (inversio,plazo,tMensual,tAnual,tnmensual,tnAnual,rPeriodo,mFinal,fecha,numPago,mInvertido,pagoMensual,tasaNeta,ivaT,rendimiento,abonoCapital,saldo) 
									VALUES ('$inversion','$plazo','$tasamensual','$entasanetamensual','$entasanetaanual','$tasaanual','$enrendipe','$enmontofina','$fecha','$numpago','$monto','$pago1','$tasa1','$iva0','$rendi','$abo','$sal')";
									$result = mysqli_query($conexion, $query);

								}*/


													
							?>

                        <br>
                    </tr>
                </tbody>
            </table>
            <?php
				echo "El rendimiento en el periodo es: $".$enrendipe."     *  ";
				echo "El monto final es: $".$enmontofina."   *  ";
				echo "La tasa mensual es: ".$tasamensual."%"."    * ";
				echo "La tasa neta mensual: ".$entasanetamensual."%"."     * ";;
				echo "La tasa anual es: ".$tasaanual."%"."     * ";
				echo "La tasa neta anual es: ".$entasanetaanual."%"."";;
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
    <script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="../vendors/scripts/dashboard.js"></script>
</body>
<?php
}
?>

</html>