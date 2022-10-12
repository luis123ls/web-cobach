<?php
date_default_timezone_set('America/Mexico_City');//hora local
    require_once('../../lib/TCPDF/tcpdf_import.php');
    require("bd.php");

    //recoleccion de datos y variables
        
       
//===========================================================================================================
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'UTF-8', false);
    // remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    // set margins
    $pdf->SetMargins("8", "10", "8");
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
    }
    ////--------------impresiones
    // set font
    $pdf->SetFont('arial', 'I', 12);
    // add a page
    $pdf->AddPage();
    $pdf->Image('../../img/logo.png', 20, 10, 0, 20,'', '', '', false, 300, '', false, false, 0);
    // set some text to print
    //_-------------------------------------------------------------------------
    $pdf->SetFont('arial', 'B', 11);
    $html = '<span style="text-align:center; line-height:150%;">DESGLOSE DEL PAGO MENSUAL</span><br>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //--=======================================
    //_-------------------------------------------------------------------------
    /*$pdf->SetFont('arial', '', 11);
    $html = '<span style="text-align:center; line-height:150%;">Tecnología de Información ZM</span><br>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');*/
    //--=======================================
    //_-------------------------------------------------------------------------
    /*$pdf->SetFont('arial', '', 11);
    $html = '<span style="text-align:center; line-height:150%;">Reporte de Bodega '.$fechaA.'</span>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');*/
    //--=======================================
       //_-------------------------------------------------------------------------
       /*$pdf->SetFont('arial', '', 11);
       $html = '<span style="text-align:left; line-height:150%;">Salidas</span>';
       $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');*/
       //--=======================================
    //_-------------------------------------------------------------------------
    $pdf->SetFont('arial', '', 11);
    $html ='<br><br><table border="1">
        <tr>
            <th style="text-align:center;">Plazo de inversion</th>
            <th style="text-align:center;">Inversion total</th>
            <th style="text-align:center;">Rendimiento total</th>
            <th style="text-align:center;">Monto final</th>
            <th style="text-align:center;">Tasa mensual</th>
            <th style="text-align:center;">Tasa anual</th>
            <th style="text-align:center;">TN mensual</th>
            <th style="text-align:center;">TN anual</th>
        </tr>';

        $consulta = "SELECT c.inversionT,c.plazo,c.rTotal,c.mFinal,c.tMensual,c.tAnual,c.tnMensual,c.tnAnual 
        FROM partnerpdf c";
        //WHERE id_jr=".$_SESSION['id_user']."";
        
            $resultado=mysqli_query($conexion, $consulta);
            while($fila = $resultado->fetch_array()){
                //$resultado2=$var += $resultadoC;
                 $html .='<tr>
                            <td border="0.1" style="text-align:center;">'.$fila['plazo'].'</td>
                            <td border="0.1" style="text-align:center;">'."$".$fila['inversionT'].'</td>
                            <td border="0.1" style="text-align:center;">'."$".$fila['rTotal'].'</td>
                            <td border="0.1" style="text-align:center;">'."$".$fila['mFinal'].'</td>
                            <td border="0.1" style="text-align:center;">'.$fila['tMensual']."%".'</td>
                            <td border="0.1" style="text-align:center;">'.$fila['tAnual']."%".'</td>
                            <td border="0.1" style="text-align:center;">'.$fila['tnMensual']."%".'</td>
                            <td border="0.1" style="text-align:center;">'.$fila['tnAnual']."%".'</td>
                        </tr>';
            }
            
    $html .='</table>';
 //-------------------------------------------------------------------------------------------------------
 $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
      //_-------------------------------------------------------------------------
    /*$pdf->SetFont('arial', '', 11);
    $html = '<span style="text-align:left; line-height:150%;"><br>Entradas<br></span>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');*/

    $pdf->SetFont('arial', '', 11);  
   
      
      //--=======================================
    
    $html ='<table border="1">
    <tr>
        <th style="text-align:center;">Fecha</th>
        <th style="text-align:center;">Mes</th>
        <th style="text-align:center;">Monto invertido</th>
        <th style="text-align:center;">Tasa neta</th>
        <th style="text-align:center;">IVA</th>
        <th style="text-align:center;">Rendimiento</th>
       
    </tr>';


        $consulta1 = "SELECT c.fecha,c.mes,c.mInvertido,c.tNeta,c.iva,c.rendimiento,c.dCapital
        FROM partnerpdf c";
        //WHERE id_jr=".$_SESSION['id_user']."";
        
           
            $resultado1=mysqli_query($conexion, $consulta1);
            while($fila1 = $resultado1->fetch_array())
            
            { 
                
                $fecha = explode(',',$fila1['fecha']);
                $mes = explode(',',$fila1['mes']);
                $minvertido = explode(',',$fila1['mInvertido']);
                $tneta = explode(',',$fila1['tNeta']);
                $iva = explode(',',$fila1['iva']);
                $ren = explode(',',$fila1['rendimiento']);
                //$devapital = explode(',',$fila1['dCapital']);
                //$saldo = explode(',',$fila1['saldo']);

                //$resultado2=$var += $resultadoC;
                  for ($idx = 0; $idx < count($fecha)-1; $idx++)
                        {

                            $html .='<tr>
                            <td border="0.1" style="text-align:center;">'.$fecha[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$mes[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$minvertido[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$tneta[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$iva[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$ren[$idx].'</td>
                          
                            
                            </tr>';
                        }
            }
            
    $html .='</table>';
           
    //-------------------------------------------------------------------------------------------------------
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    $pdf->endPage();
    $pdf->Output("COTIZADOR PARTNER JR",'D');

    $conexion->close();  //serramos mysql 

//fin de verificacion de boton
?>