	<!-- amCharts javascript sources -->
		<script src="/vocacion/js/amcharts.js" type="text/javascript"></script>
		<script type="text/javascript" src="http://cdn.amcharts.com/lib/3/serial.js"></script>
		<script type="text/javascript" src="http://cdn.amcharts.com/lib/3/pie.js"></script>
		<script type="text/javascript" src="http://cdn.amcharts.com/lib/3/themes/light.js"></script>

	<div class="bg-light padding-md" id="feature">
		</br>
		</br>


				<div class="panel panel-default">
					<div class="panel-body">
						<form action="search" method="post" class="form-inline no-margin pull-right">
							<div class="form-group">
							    <input name="fname" type="text" class="form-control input-md" placeholder="Código a buscar">
							</div><!-- /form-group -->
							<button type="submit" class="btn btn-sm btn-success">Buscar</button>
						</form>
					</div>
				</div><!-- /panel -->
				</br>
				<div class="row">
					<div class="col-md-3 col-sm-3">
						<div class="row">
							<div id="pieChart" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
						</div><!-- /.row -->
						
						<div class="row">
							<div id="pieChart2" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
						</div><!-- /.row -->
					</div><!-- /.col -->
					<div class="col-md-9 col-sm-9">
						<div class="tab-content">

								<div class="row">
									<div class="col-md-11">
										<div class="panel panel-default fadeInDown animation-delay2">
											<div class="panel-body">
											<div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
											</div>
										</div><!-- /panel -->
										<div class="panel panel-default table-responsive">
									<div class="panel-heading">
										Listado
									</div>
									<table class="table table-bordered table-condensed table-hover table-striped table-vertical-center">
										<thead>
											<tr>
												<th class="text-center">Nombre</th>
												<th class="text-center">Carrera</th>
												<th class="text-center">Activo</th>
												<th class="text-center">Reflexivo</th>
												<th class="text-center">Teórico</th>
												<th class="text-center">Pragmático</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($users as $user): ?>
											<tr>
												<td class="text-left">
													<?php echo $user['User']['name'] ?>
												</td>
												<td class="text-left">
													<?php echo $user['Career']['name'] ?>
												</td>
											<?php if($user['User']['active_style']< 7){  ?>
											<td><span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span></td>
											<?php }?>
											<?php if($user['User']['active_style'] == 7 ||  $user['User']['active_style'] == 8){  ?>
											<td><span class="label label-low pull-right"><?php echo 'Baja'?></span></td>
											<?php }?>
											<?php if($user['User']['active_style'] > 8 &&  $user['User']['active_style'] < 13){  ?>
											<td><span class="label label-medium pull-right"><?php echo 'Moderada'?></span></td>
											<?php }?>
											<?php if($user['User']['active_style'] == 13 ||  $user['User']['active_style'] == 14){  ?>
											<td><span class="label label-higth pull-right"><?php echo 'Alta'?></span></td>
											<?php }?>
											<?php if($user['User']['active_style'] > 14 &&  $user['User']['active_style'] < 21){  ?>
											<td><span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span></td>
											<?php }?>
												<?php if($user['User']['reflexive_style'] < 11){  ?>
											<td><span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span></td>
											<?php }?>
											<?php if($user['User']['reflexive_style']  > 10 &&  $user['User']['reflexive_style']  < 14){  ?>
											<td><span class="label label-low pull-right"><?php echo 'Baja'?></span></td>
											<?php }?>
											<?php if($user['User']['reflexive_style']  > 13 &&  $user['User']['reflexive_style']  < 18){  ?>
											<td><span class="label label-medium pull-right"><?php echo 'Moderada'?></span></td>
											<?php }?>
											<?php if($user['User']['reflexive_style']  == 18 ||  $user['User']['reflexive_style']  == 19){  ?>
											<td><span class="label label-higth pull-right"><?php echo 'Alta'?></span></td>
											<?php }?>
											<?php if($user['User']['reflexive_style']  == 20){  ?>
											<td><span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span></td>
											<?php }?>
											
											<?php if($user['User']['theorist_style']< 7){  ?>
											<td><span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span></td>
											<?php }?>
											<?php if($user['User']['theorist_style'] > 6 &&  $user['User']['theorist_style'] < 10){  ?>
											<td><span class="label label-low pull-right"><?php echo 'Baja'?></span></td>
											<?php }?>
											<?php if($user['User']['theorist_style'] > 9 &&  $user['User']['theorist_style'] < 14){  ?>
											<td><span class="label label-medium pull-right"><?php echo 'Moderada'?></span></td>
											<?php }?>
											<?php if($user['User']['theorist_style'] == 14 ||  $user['User']['theorist_style'] == 15){  ?>
											<td><span class="label label-higth pull-right"><?php echo 'Alta'?></span></td>
											<?php }?>
											<?php if($user['User']['theorist_style'] > 15 &&  $user['User']['theorist_style'] < 21){  ?>
											<td><span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span></td>
											<?php }?>

											<?php if($user['User']['pragmatic_style']< 9){  ?>
											<td><span class="label label-lowlow pull-right"><?php echo 'Muy Baja' ?></span></td>
											<?php }?>
											<?php if($user['User']['pragmatic_style'] == 9 ||  $user['User']['pragmatic_style'] == 10){  ?>
											<td><span class="label label-low pull-right"><?php echo 'Baja'?></span></td>
											<?php }?>
											<?php if($user['User']['pragmatic_style'] > 10 &&  $user['User']['pragmatic_style'] < 14){  ?>
											<td><span class="label label-medium pull-right"><?php echo 'Moderada'?></span></td>
											<?php }?>
											<?php if($user['User']['pragmatic_style'] == 14 ||  $user['User']['pragmatic_style'] == 15){  ?>
											<td><span class="label label-higth pull-right"><?php echo 'Alta'?></span></td>
											<?php }?>
											<?php if($user['User']['pragmatic_style'] > 15 &&  $user['User']['pragmatic_style'] < 21){  ?>
											<td><span class="label label-veryhigth pull-right"><?php echo 'Muy Alta'?></span></td>
											<?php }?>
											</tr>
<?php endforeach; ?>
										</tbody>
									</table>
								</div><!-- /panel -->
											
									</div><!-- /.col -->
								</div><!-- /.row -->
									
								
						</div><!-- /tab-content -->

						
					</div><!-- /.col -->
				</div><!-- /.row -->

			</div><!-- /.padding-md -->



			<script type="text/javascript">
			AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"pathToImages": "http://cdn.amcharts.com/lib/3/images/",
					"categoryField": "category",
					"startDuration": 1,
					"categoryAxis": {
						"gridPosition": "start"
					},
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[title]] [[value]] estudiantes",
							"bullet": "round",
							"id": "AmGraph-1",
							"title": "Activo",
							"type": "smoothedLine",
							"valueField": "active"
						},
						{
							"balloonText": "[[title]] [[value]] estudiantes",
							"bullet": "square",
							"id": "AmGraph-2",
							"title": "Reflexivo",
							"type": "smoothedLine",
							"valueField": "reflexive"
						},
						{
							"balloonText": "[[title]] [[value]] estudiantes",
							"bullet": "square",
							"id": "AmGraph-3",
							"title": "Teórico",
							"type": "smoothedLine",
							"valueField": "theorist"
						},
						{
							"balloonText": "[[title]] [[value]] estudiantes",
							"bullet": "square",
							"id": "AmGraph-4",
							"title": "Pragmático",
							"type": "smoothedLine",
							"valueField": "pragmatic"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "N° ESTUDIANTES"
						},
						{
							"id": "ValueAxis-2",
							"title": "N° ESTUDIANTES"
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Gráfico Total"
						}
					],
					"dataProvider": <?php echo $json ?>
					
				}
			);
		</script>

		<!-- amCharts javascript code -->
		<script type="text/javascript">
			AmCharts.makeChart("pieChart",
				{
					"type": "pie",
					"pathToImages": "http://cdn.amcharts.com/lib/3/images/",
					"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
					"depth3D": 15,
					"innerRadius": "40%",
					"labelRadius": -10,
					"pullOutRadius": "30%",
					"startRadius": "419%",
					"pullOutDuration": 0,
					"pullOutEffect": "easeOutSine",
					"startDuration": 0,
					"titleField": "gender",
					"valueField": "total",
					"visibleInLegendField": "Not set",
					"theme": "light",
					"allLabels": [],
					"balloon": {},
					"titles": [],
					"dataProvider": <?php echo $genders ?>,
					"titles": [
					{
						"id": "Title-1",
						"text": "Distribucion por Género"
					}
				],
				}
			);
		</script>


				<!-- amCharts javascript code -->
		<script type="text/javascript">
			AmCharts.makeChart("pieChart2",
				{
					"type": "pie",
					"pathToImages": "http://cdn.amcharts.com/lib/3/images/",
					"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
					"depth3D": 15,
					"innerRadius": "40%",
					"labelRadius": -1,
					"pullOutRadius": "30%",
					"startRadius": "41%",
					"pullOutDuration": 0,
					"pullOutEffect": "easeOutSine",
					"startDuration": 0,
					"titleField": "career",
					"valueField": "number",
					"visibleInLegendField": "Not set",
					"theme": "light",
					"allLabels": [],
					"balloon": {},
					"titles": [],
					"dataProvider": <?php echo $careers ?>,
					"titles": [
					{
						"id": "Title-1",
						"text": "Distribucion por Carrera"
					}
				],
				}
			);
		</script>
