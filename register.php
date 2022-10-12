<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Registrar</title>

	<!-- Site favicon -->
	<!--Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/logo-with.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/logo-with.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/logo-with.png">


	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<div class="center">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Registrar</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="login.php">Login</a></li>
									<li class="breadcrumb-item active" aria-current="page"></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Form grid Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Bienvenidos</h4>
							<p class="mb-30">Ingrese sus datos</p>
						</div>
					</div>
					<form action="body-php/controlador/alta-user.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label>Nombre completo</label>
									<input type="text" class="form-control" name="nombre" required>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" class="form-control" name="pwd" required>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label>Foto de perfil</label>
									<input type="file" class="form-control" name="f_perfil" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" name="email" required>
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label>Fecha de nacimiento</label>
									<input type="date" class="form-control" name="fechaN" required>
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label>Telefono</label>
									<input type="text" class="form-control" name="telefono" required>
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label>Ciudad</label>
									<input type="text" class="form-control" name="ciudad" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>Estado</label>
									<input type="text" class="form-control" name="estado" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>Codigo postal</label>
									<input type="text" class="form-control" name="Cpostal" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>Direccion</label>
									<input type="text" class="form-control" name="Direccion" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>Tipo de usuario</label>
									<select name="tipo" class="form-control">
									<option value="1">Admin</option>
									<option value="2">Admin Jr</option>
									<option value="3">Cliente</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-12">
								<input class="btn btn-primary btn-lg btn-block" type="submit" value="Registrar" name="Registrar">
							</div>
							
						</div>

					</form>
					<d 	iv class="collapse collapse-box" id="form-grid-form" >
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#form-grid"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#form-grid-form" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>
							<pre><code class="xml copy-pre" id="form-grid">
							</code></pre>
						</div>
					</div>
				</div>
				<!-- Form grid End -->
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>