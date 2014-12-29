
        <script src="/vocacion/js/amcharts.js" type="text/javascript"></script>
        <script src="/vocacion/js/radar.js" type="text/javascript"></script>

        <!-- Dropzone -->
	<link href='/vocacion/css/dropzone/dropzone.css' rel="stylesheet"/>


<div id="landing-container">

			
			<div class="padding-md">
				<div class="row">
					<div class="col-md-4 col-sm-2">
						<div class="panel">
						


<!--<a href="javascript:fbShare('http://www.curicochile.cl', 'Fb Share', 'Descubre tu estilo de aprendizaje aquí', 'http://goo.gl/dS52U', 520, 350)">Share</a>-->
						</div><!-- /panel -->
						
						<h5 class="headline">
							
							<span class="line"></span>
						</h5>
						
							<div id="chartdiv" style="width:500px; height:500px;"></div>

						
					</div><!-- /.col -->
					<div class="col-md-6 col-sm-9">

	<h2><?php echo __('Preferencias de Estilo de Aprendizaje'); ?></h2>
		<div class="panel panel-default">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Estilo</th>
										<th>Cantidad</th>
										<th></th>
										<!--<th></th>-->
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Activo</td>
										
										<!--<td><span class="category"><?php echo $collaborator['Collaborator']['active_style']; ?></span></td>-->
											<?php if($collaborator['Collaborator']['active_style']< 7){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-lowlow animated-bar" style="width:5%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['active_style'] == 7 ||  $collaborator['Collaborator']['active_style'] == 8){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-low animated-bar" style="width:25%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-low pull-right"><?php echo 'Baja'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['active_style'] > 8 &&  $collaborator['Collaborator']['active_style'] < 13){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-medium animated-bar" style="width:50%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-medium pull-right"><?php echo 'Moderada'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['active_style'] == 13 ||  $collaborator['Collaborator']['active_style'] == 14){  ?>
											<td>
											<dd>
											<div class="progress progress-striped primary">
											<div class="progress-bar progress-bar-higth animated-bar" style="width:75%"></div>
											</div>
											</dd>

										</td>
											<td><span class="label label-higth pull-right"><?php echo 'Alta'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['active_style'] > 14 &&  $collaborator['Collaborator']['active_style'] < 21){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-veryhigth animated-bar" style="width:100%"></div>
											</div>
											</dd>
											<td><span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span></td>
											<?php }?>
									</tr>
									<tr>
										<td>Reflexivo</td>
										
										<!--<td><span class="category"><?php echo $collaborator['Collaborator']['reflexive_style']; ?></span></td>-->
											<?php if($collaborator['Collaborator']['reflexive_style']< 11){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-lowlow animated-bar" style="width:5%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['reflexive_style'] > 10 &&  $collaborator['Collaborator']['reflexive_style'] < 14){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-low animated-bar" style="width:25%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-low pull-right"><?php echo 'Baja'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['reflexive_style'] > 13 &&  $collaborator['Collaborator']['reflexive_style'] < 18){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-medium animated-bar" style="width:50%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-medium pull-right"><?php echo 'Moderada'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['reflexive_style'] == 18 ||  $collaborator['Collaborator']['reflexive_style'] == 19){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-higth animated-bar" style="width:75%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-higth pull-right"><?php echo 'Alta'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['reflexive_style'] == 20){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-veryhigth animated-bar" style="width:100%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span></td>
											<?php }?>
									</tr>
									<tr>
										<td>Teórico</td>
										
									<!--	<td><span class="category"><?php echo $collaborator['Collaborator']['theorist_style']; ?></span></td>-->
										<?php if($collaborator['Collaborator']['theorist_style']< 7){  ?>
										<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-lowlow animated-bar" style="width:5%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['theorist_style'] > 6 &&  $collaborator['Collaborator']['theorist_style'] < 10){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-low animated-bar" style="width:25%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-low pull-right"><?php echo 'Baja'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['theorist_style'] > 9 &&  $collaborator['Collaborator']['theorist_style'] < 14){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-medium animated-bar" style="width:50%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-medium pull-right"><?php echo 'Moderada'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['theorist_style'] == 14 ||  $collaborator['Collaborator']['theorist_style'] == 15){  ?>
											<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-higth animated-bar" style="width:75%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-higth pull-right"><?php echo 'Alta'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['theorist_style'] > 15 &&  $collaborator['Collaborator']['theorist_style'] < 21){  ?>
											<td>
											<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-veryhigth animated-bar" style="width:100%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span></td>
											<?php }?>
									</tr>
									<tr>
										<td>Pragmático</td>
										<!--<td><span class="category"><?php echo $collaborator['Collaborator']['pragmatic_style']; ?></span></td>-->
											<?php if($collaborator['Collaborator']['pragmatic_style']< 9){  ?>
												<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-lowlow animated-bar" style="width:5%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['pragmatic_style'] == 9 ||  $collaborator['Collaborator']['pragmatic_style'] == 10){  ?>
												<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-low animated-bar" style="width:25%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-low pull-right"><?php echo 'Baja'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['pragmatic_style'] > 10 &&  $collaborator['Collaborator']['pragmatic_style'] < 14){  ?>
												<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-medium animated-bar" style="width:50%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-medium pull-right"><?php echo 'Moderada'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['pragmatic_style'] == 14 ||  $collaborator['Collaborator']['pragmatic_style'] == 15){  ?>
												<td>
											<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-higth animated-bar" style="width:75%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-higth pull-right"><?php echo 'Alta'?></span></td>
											<?php }?>
											<?php if($collaborator['Collaborator']['pragmatic_style'] > 15 &&  $collaborator['Collaborator']['pragmatic_style'] < 21){  ?>
												<td>
												<dd>
											<div class="progress progress-striped">
											<div class="progress-bar progress-bar-veryhigth animated-bar" style="width:100%"></div>
											</div>
											</dd>
										</td>
											<td><span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span></td>
											<?php }?>
									</tr>
								</tbody>
							</table>
						</div><!-- /panel -->

						<div class="panel panel-default">
						
							
									
						<a href="/vocacion/careers/result/<?php echo $collaborator['Collaborator']['id'] ?>">
							<div class="panel panel-default panel-stat2 bg-success">
								<div class="panel-body">
									<span class="stat-icon">
										<i class="fa fa-bar-chart-o"></i>
									</span>
								<div class="pull-right text-right">
									<div class="title"><span class="text-danger"><h1>Ver Carreras Compatibles</h1></span></div>
									</div>
								</div>
						</a>
								
							
						</div><!-- /panel -->	


						<div class="panel panel-default">
									<div class="col-md-18">
										<div class="panel panel-default fadeInDown animation-delay2">
											<div class="panel-heading">
												Sobre Estilos de Aprendizaje
											</div>
											<div class="panel-body">
												<h4>El estilo Activo  		
											<?php if($collaborator['Collaborator']['active_style']< 7){  ?>
											<span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['active_style'] == 7 ||  $collaborator['Collaborator']['active_style'] == 8){  ?>
											<span class="label label-low pull-right"><?php echo 'Baja'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['active_style'] > 8 &&  $collaborator['Collaborator']['active_style'] < 13){  ?>
											<span class="label label-medium pull-right"><?php echo 'Moderada'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['active_style'] == 13 ||  $collaborator['Collaborator']['active_style'] == 14){  ?>
											<span class="label label-higth pull-right"><?php echo 'Alta'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['active_style'] > 14 &&  $collaborator['Collaborator']['active_style'] < 21){  ?>
											<span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span>
											<?php }?></h4>
						<p>
El estudiante activo es flexible y de mente abierta, listo para
la acción, le gusta exponerse a nuevas situaciones, es optimista hacia 
lo novedoso y le disgusta resistirse al cambio. Tiene la tendencia 
a realizar acciones obvias de manera inmediata sin pensar en las 
consecuencias, toma riesgos innecesarios, tiende a hacer demasiado 
el mismo y acaparar la atención, impetuoso para la acción sin suficiente preparación.</p>

											</div>
											<div class="panel-body">
<h4>El estilo Reflexivo  <?php if($collaborator['Collaborator']['reflexive_style']< 11){  ?>
											<span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['reflexive_style'] > 10 &&  $collaborator['Collaborator']['reflexive_style'] < 14){  ?>
											<span class="label label-low pull-right"><?php echo 'Baja'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['reflexive_style'] > 13 &&  $collaborator['Collaborator']['reflexive_style'] < 18){  ?>
											<span class="label label-medium pull-right"><?php echo 'Moderada'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['reflexive_style'] == 18 ||  $collaborator['Collaborator']['reflexive_style'] == 19){  ?>
											<span class="label label-higth pull-right"><?php echo 'Alta'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['reflexive_style'] == 20){  ?>
											<span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span></td>
											<?php }?></h4>
											<p>
El estudiante reflexivo es cauteloso, minucioso y metódico,
pensativo, bueno para escuchar a otros y asimilar información, raramente llega a dar conclusiones. Tiende a mantenerse al margen en la participación directa, lento para aportar y enriquecer decisiones, tiende a ser demasiado cauteloso y no se arriesga, no es autoritario.</p> 

											</div>
											<div class="panel-body">
<h4>El estilo Teórico  <?php if($collaborator['Collaborator']['theorist_style']< 7){  ?>
											<span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['theorist_style'] > 6 &&  $collaborator['Collaborator']['theorist_style'] < 10){  ?>
											<span class="label label-low pull-right"><?php echo 'Baja'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['theorist_style'] > 9 &&  $collaborator['Collaborator']['theorist_style'] < 14){  ?>
											<span class="label label-medium pull-right"><?php echo 'Moderada'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['theorist_style'] == 14 ||  $collaborator['Collaborator']['theorist_style'] == 15){  ?>
											<span class="label label-higth pull-right"><?php echo 'Alta'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['theorist_style'] > 15 &&  $collaborator['Collaborator']['theorist_style'] < 21){  ?>
											<span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span>
											<?php }?></h4>

<p>
El estudiante teórico es lógico, pensador vertical, racional y objetivo, bueno para generar preguntas, disciplinado, comprende el marco general. Restringido en el pensamiento lateral, baja tolerancia hacia la incertidumbre, el desorden y la ambigüedad, intolerante hacia lo subjetivo o intuitivo, lleno de ‘deberías’.
</p>

											</div>

											<div class="panel-body">
<h4>El estilo Pragmático  	<?php if($collaborator['Collaborator']['pragmatic_style']< 9){  ?>
											<span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['pragmatic_style'] == 9 ||  $collaborator['Collaborator']['pragmatic_style'] == 10){  ?>
											<span class="label label-low pull-right"><?php echo 'Baja'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['pragmatic_style'] > 10 &&  $collaborator['Collaborator']['pragmatic_style'] < 14){  ?>
											<span class="label label-medium pull-right"><?php echo 'Moderada'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['pragmatic_style'] == 14 ||  $collaborator['Collaborator']['pragmatic_style'] == 15){  ?>
											<span class="label label-higth pull-right"><?php echo 'Alta'?></span>
											<?php }?>
											<?php if($collaborator['Collaborator']['pragmatic_style'] > 15 &&  $collaborator['Collaborator']['pragmatic_style'] < 21){  ?>
											<span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span>
											<?php }?></h4>
<p>
El estudiante pragmático es entusiasta al poner las ideas en práctica, es práctico, con los pies en la tierra, realista, negociante, orientado a lo técnico. Tiene la tendencia a rechazar lo que no tenga  una aplicación obvia, no se interesa mucho en las teorías o principios básicos, tiende a quedarse con la primera solución de un problema, impaciente con las indecisiones, más orientado hacia la tarea que hacia las personas. Su filosofía es que “si funciona es bueno”</p>

											</div>
										</div><!-- /panel -->
											
								
									</div><!-- /.col -->
									
								</div><!-- /.row -->		

			
			
		</div><!-- /main-container -->
		</div><!-- /main-container -->

<!-- Dropzone -->
	<script src='/vocacion/js/dropzone.min.js'></script>			


<script>
    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
</script>

    <script type="text/javascript">

var chartData = [
                {
                    "country": "Activo",
                    "media": <?php  echo $collaborator['Collaborator']['active_style'] ?>
                },
                {
                    "country": "Reflexivo",
                    "media": <?php  echo $collaborator['Collaborator']['reflexive_style'] ?>
                },
                {
                    "country": "Teórico",
                    "media": <?php  echo $collaborator['Collaborator']['theorist_style'] ?>
                },
                {
                    "country": "Pragmático",
                    "media": <?php  echo $collaborator['Collaborator']['pragmatic_style'] ?>
             	}
            ];


var chart = AmCharts.makeChart("chartdiv", {
    "type": "radar",
    "theme": "none",
    "dataProvider":chartData,
    "valueAxes": [{
        "axisTitleOffset": 20,
        "minimum": 0,
        "axisAlpha": 0.15
    }],
    "startDuration": 2,
    "graphs": [{
        "balloonText": "[[value]] puntaje",
        "bullet": "round",
        "valueField": "media"
    }],
    "categoryField": "country",
    "exportConfig": {
        "menuTop":"10px",
        "menuRight":"10px",
        "menuItems": [{
            "icon": '/lib/3/images/export.png',
            "format": 'png'
        }]
    }
});
        </script>


