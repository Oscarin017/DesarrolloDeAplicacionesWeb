<nav class="navbar navbar-inverse" role="navigation">
	<div class="container container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="Main.php">TechGears</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Profesores<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="RegistroProfesor.php">Registrar</a></li>
						<li><a href="ConsultarProfesor.php">Consultar</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnos<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="RegistroAlumno.php">Registrar</a></li>
						<li><a href="ConsultarAlumno.php">Consultar</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Grupos<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="RegistroGrupo.php">Registrar</a></li>
						<li><a href="ConsultarGrupo.php">Consultar</a></li>
						<li><a href="AlumnoGrupo.php">Asignacion Alumnos-Grupos</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Asistencia<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Toma de Asistencia</a></li>
						<li><a href="#">Consultar</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<script type="text/javascript">
    if(!sessionStorage.IDProfesor)
    {
    	window.location = "Index.php";
    }
</script>