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
    if (@file_exists(dirname(__FILE__).'hj.png')) {
      require(dirname(__FILE__).'hj.png');
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
            <th style="text-align:center;">Inversión</th>
            <th style="text-align:center;">Plazo</th>
            <th style="text-align:center;">Tasa Mensual</th>
            <th style="text-align:center;">Tasa anual</th>
            <th style="text-align:center;">Tasa neta mensual</th>
            <th style="text-align:center;">Tasa neta anual</th>
            <th style="text-align:center;">R periodo</th>
            <th style="text-align:center;">Monto final</th>
        </tr>';

        $consulta = "SELECT c.inversio,c.plazo,c.tMensual,c.tAnual,c.tnmensual,c.tnAnual,c.rPeriodo,c.mFinal
        FROM cotizador c";
        
            $resultado=mysqli_query($conexion, $consulta);
            while($fila = $resultado->fetch_array()){
                //$resultado2=$var += $resultadoC;
                 $html .='<tr>
                            <td border="0.1" style="text-align:center;">'.$fila['inversio'].'</td>
                            <td border="0.1" style="text-align:center;">'.$fila['plazo']." Meses".'</td>
                            <td border="0.1" style="text-align:center;">'.$fila['tMensual'].'</td>
                            <td border="0.1" style="text-align:center;">'.$fila['tAnual'].'</td>
                            <td border="0.1" style="text-align:center;">'.$fila['tnmensual'].'</td>
                            <td border="0.1" style="text-align:center;">'.$fila['tnAnual'].'</td>
                            <td border="0.1" style="text-align:center;">'.$fila['rPeriodo'].'</td>
                            <td border="0.1" style="text-align:center;">'.$fila['mFinal'].'</td>
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
        <th style="text-align:center;">N° pago</th>
        <th style="text-align:center;">Monto invertido</th>
        <th style="text-align:center;">Pago mensual</th>
        <th style="text-align:center;">Tasa neta</th>
        <th style="text-align:center;">IVA</th>
        <th style="text-align:center;">Abono a capital</th>
        <th style="text-align:center;">Rendimiento</th>
        <th style="text-align:center;">Saldo</th>
    </tr>';


    $consulta1 = "SELECT c.fecha,c.numPago,c.mInvertido,c.pagoMensual,c.tasaNeta,c.ivaT,c.rendimiento,c.abonoCapital,c.saldo
    FROM cotizador c";
        
        $resultado1=mysqli_query($conexion, $consulta1);
        while($fila1 = $resultado1->fetch_array())
            
            { 
                
                $fecha = explode(',',$fila1['fecha']);
                $pago = explode(',',$fila1['numPago']);
                $inversion = explode(',',$fila1['mInvertido']);
                $pmensual = explode(',',$fila1['pagoMensual']);
                $tneta = explode(',',$fila1['tasaNeta']);
                $ivat = explode(',',$fila1['ivaT']);
                $ren = explode(',',$fila1['rendimiento']);
                $acapital = explode(',',$fila1['abonoCapital']);
                $saldo = explode(',',$fila1['saldo']);

                //$resultado2=$var += $resultadoC;
                for ($idx = 0; $idx < count($fecha)-1; $idx++)
                        {

                            $html .='<tr>

                            <td border="0.1" style="text-align:center;">'.$fecha[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$pago[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$inversion[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$pmensual[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$tneta[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$ivat[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$ren[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$acapital[$idx].'</td>
                            <td border="0.1" style="text-align:center;">'.$saldo[$idx].'</td>
                            </tr>';
                        }
            }
            
    $html .='</table>';
           
    //-------------------------------------------------------------------------------------------------------
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    $pdf->endPage();
    $pdf->Output("Cotizador PDF",'D');

    $conexion->close();  //serramos mysql 

//fin de verificacion de boton
?>