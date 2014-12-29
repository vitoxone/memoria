<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Vocación Utalca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="/vocacion/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome -->
	<link href="/vocacion/css/font-awesome.min.css" rel="stylesheet">

	<!-- Endless -->
	<link href="/vocacion/css/endless.css" rel="stylesheet">
	<link href="/vocacion/css/endless-landing.min.css" rel="stylesheet">

  </head>

  <body class="overflow-hidden">
	<?php require_once ('archives/Mobile_Detect.php');
	$detect = new Mobile_Detect(); ?>
	<!-- Overlay Div -->
	 <div id="overlay">
		<div class="overlay-inner">
			<div id="followingBallsG">
				<div id="followingBallsG_1" class="followingBallsG">
				</div>
				<div id="followingBallsG_2" class="followingBallsG">
				</div>
				<div id="followingBallsG_3" class="followingBallsG">
				</div>
				<div id="followingBallsG_4" class="followingBallsG">
				</div>
			</div>
		</div>
	</div>

	
	<div id="wrapper" class="preload">
		<header class="navbar navbar-fixed-top bg-white">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand"><span class="text-danger">Vocación </span> Utalca</a>
				</div>
				<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
					<ul class="nav navbar-nav navbar-right">
					
			<?php if ($detect->isMobile()== false) { ?>
				<a href="/vocacion/pages/home" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-home"></i>
					</span>
					<span class="text">Home</span>
				</a>
				<a href="/vocacion/pages/about" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-question-circle"></i>
					</span>
					<span class="text">¿Qué es?</span>
				</a>
				<a href="/vocacion/careers/profiles" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa  fa-tasks"></i>
					</span>
					<span class="text">Perfiles de Carrera</span>
				</a>
				<a href="/vocacion/pages/init" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa  fa-user"></i>
					</span>
					<span class="text">Colaborar</span>
				</a>
				<a href="/vocacion/users/collaborators" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-group"></i>
					</span>
					<span class="text">Ya han Colaborado</span>
				</a>
				<a href="/vocacion/users/kmeans" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa-bar-chart-o"></i>
					</span>
					<span class="text">Muestra</span>
				</a>
				<?php } ?>
				<?php if ($detect->isMobile()==true) { ?>

				
						<li>
							<?php echo $this->Html->link('Home', array('controller' => 'pages', 'action' => 'home', 'class'=>'text')); ?>
						</li>
					<li>
						<?php echo $this->Html->link('¿Qué es?', array('controller' => 'pages', 'action' => 'about', 'class'=>'text')); ?>
						</li>
						<li>
						<?php echo $this->Html->link('Perfiles de Carrera', array('controller' => 'careers', 'action' => 'profiles', 'class'=>'text')); ?>
						</li>
						<li>
						<?php echo $this->Html->link('Ya Han Colaborado', array('controller' => 'users', 'action' => 'collaborators')); ?>
						</li>
						<li>
						<?php echo $this->Html->link('Participar', array('controller' => 'pages', 'action' => 'init')); ?>
						</li>

				<?php } ?>
					</ul>
				</nav>
			</div>


		</header>
		<body>
		<div id="landing-content">
				<?php echo $this->Session->flash(); ?>
					 <?php echo $this->fetch('content'); ?>
					<!--<?php echo $this->element('sql_dump'); ?>-->
		</div><!-- /landing-content -->
		</body>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-3 padding-md">
						<p class="font-lg">Links de Interes</p>
						<ul class="list-unstyled useful-link">
							<li>
								<a href="http://www.eligecarrera.cl/" target="_new">
									<small><i class="fa fa-chevron-right"></i> Elige Carrera</small>
								</a>
							</li>
							<li>
								<a href="http://www.utalca.cl/" target="_new">
									<small><i class="fa fa-chevron-right"></i> Universidad de Talca</small>
								</a>
							</li>
						</ul>
					</div><!-- /.col -->
					<div class="col-sm-3 padding-md">
						<p class="font-lg">Sitio Optimizado</p>
						<a href="http://www.google.cl/intl/es-419/chrome/browser/" target="_new">
									<?php echo $this->Html->image('/img/chrome.ico'); ?>
								</a><a href="http://www.mozilla.org/es-CL/firefox/new/" target="_new">
									<?php echo $this->Html->image('/img/firefox.png'); ?>
								</a>
					</div><!-- /.col -->
					<div class="col-sm-3 padding-md">
						<p class="font-lg">Contacto</p>
						Email : vsilva@alumnos.utalca.cl
						<div class="seperator"></div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</footer>
	</div><!-- /wrapper -->

	<a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	<!-- Jquery -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="/vocacion/js/bootstrap.min.js"></script>
   
	<!-- Waypoint -->
	<script src='/vocacion/js/waypoints.min.js'></script>
	
	<!-- LocalScroll -->
	<script src='/vocacion/js/jquery.localscroll.min.js'></script>
	
	<!-- ScrollTo -->
	<script src='/vocacion/js/jquery.scrollTo.min.js'></script>
	
	<!-- Cookie -->
	<script src='/vocacion/js/jquery.cookie.min.js'></script>

	<!-- Endless -->
	<script src="/vocacion/js/endless/endless.js"></script>

	
	
  </body>
</html>