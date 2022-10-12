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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CALENDARIO</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="../css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">


    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180"    href="../vendors/img/logo-with.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../vendors/img/logo-with.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../vendors/img/logo-with.png">


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../src/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">

    	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
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
                        <img src="assets/img/<?php echo $f_perfil;?>" alt="">
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
    <?php
      include('../body-php/controlador/bd.php');
      
      /*$query   = "SELECT c.id, c.evento, c.color_evento, c.fecha_inicio, c.fecha_fin
      FROM calendar c WHERE id =".$_SESSION['id_user']."";*/

    $query = "SELECT id,evento,color_evento,fecha_inicio,fecha_fin,id_usuario
    FROM calendar  WHERE id_usuario= ".$_SESSION['id_user']."";

        $result = mysqli_query($conexion, $query);

    ?>

    <div class="mobile-menu-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col msjs">
                <?php
                include('msjs.php');
                ?>
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Calendario</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Calendario</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <div class="calendar-wrap">
                      <div id="calendar"></div>
                      <?php  
                      /*include('../modalNuevoEvento.php');
                      include('../modalUpdateEvento.php');*/

                      include('modalNuevoEvento.php');
                      include('modalUpdateEvento.php');
                      ?>
                    </div>
                </div>
            </div>
            
        </div>
        <?php require("menu/pie.php");?>
    </div>

    <script src="../js/jquery-3.0.0.min.js"> </script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../js/moment.min.js"></script>
    <script type="text/javascript" src="../js/fullcalendar.min.js"></script>
    <script></script>
    <script src='../locales/es.js'></script>


    <script type="text/javascript">
    $(document).ready(function() {
        $("#calendar").fullCalendar({
            header: {
                left: "prev,next today",
                center: "title",
                right: "month,agendaWeek,agendaDay"
            },

            locale: 'es',

            defaultView: "month",
            navLinks: true,
            editable: true,
            eventLimit: true,
            selectable: true,
            selectHelper: false,

            //Nuevo Evento
            select: function(start, end) {
                $("#exampleModal").modal();
                $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));

                var valorFechaFin = end.format("DD-MM-YYYY");
                var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format(
                    'DD-MM-YYYY'); //Le resto 1 dia
                $('input[name=fecha_fin').val(F_final);

            },

            events: [
                <?php
                while($dataEvento = mysqli_fetch_array($result)){ ?> {
                    _id: '<?php echo $dataEvento['id'];?>',
                    title: '<?php echo $dataEvento['evento']; ?>',
                    start: '<?php echo $dataEvento['fecha_inicio']; ?>',
                    end: '<?php echo $dataEvento['fecha_fin']; ?>',
                    color: '<?php echo $dataEvento['color_evento']; ?>'
                },
                <?php } ?>
            ],


            //Eliminar Evento
            eventRender: function(event, element) {
                element
                    .find(".fc-content")
                    .prepend(
                        "<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");

                //Eliminar evento
                element.find(".closeon").on("click", function() {

                    var pregunta = confirm("Deseas Borrar este Evento?");
                    if (pregunta) {

                        $("#calendar").fullCalendar("removeEvents", event._id);

                        $.ajax({
                            type: "POST",
                            url: '../body-php/controlador/deleteEvento.php',
                            data: {
                                id: event._id
                            },
                            success: function(datos) {
                                $(".alert-danger").show();

                                setTimeout(function() {
                                    $(".alert-danger").slideUp(500);
                                }, 3000);

                            }
                        });
                    }
                });
            },


            //Moviendo Evento Drag - Drop
            eventDrop: function(event, delta) {
                var idEvento = event._id;
                var start = (event.start.format('DD-MM-YYYY'));
                var end = (event.end.format("DD-MM-YYYY"));

                $.ajax({
                    url: '../body-php/controlador/drag_drop_evento.php',
                    data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
                    type: "POST",
                    success: function(response) {
                        // $("#respuesta").html(response);
                    }
                });
            },

            //Modificar Evento del Calendario 
            eventClick: function(event) {
                var idEvento = event._id;
                $('input[name=idEvento').val(idEvento);
                $('input[name=evento').val(event.title);
                $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
                $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

                $("#modalUpdateEvento").modal();
            },


        });


        //Oculta mensajes de Notificacion
        setTimeout(function() {
            $(".alert").slideUp(300);
        }, 3000);


    });
    </script>

</body>
<?php
}
?>

</html>