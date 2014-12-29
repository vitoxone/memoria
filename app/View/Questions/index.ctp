<?php echo $this->Html->css(array('bootstrap-editable.css', '/select2/select2.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js', '/select2/select2.js'), array('inline' => false)); ?>
		<div class="bg-light padding-md" id="feature">
			<div class="padding-md">
				<div class="row">
					<div class="col-md-10">	
						<h2 class="headline m-top-md">
							Cuestionario Honey-Alonso de Estilos de Aprendizaje
							<span class="line"></span>
						</h2>
						<div class="row">	
							<div class="col-md-16">
								<div class="panel">
									<div class="panel-body">
											<h3 class="headline">
									Instrucciones:
								</h3>
								<ul class="category">
									<li><a><i class="fa fa-chevron-right"></i> Este cuestionario ha sido diseñado para identificar su Estilo preferido de Aprendizaje. No es un test de inteligencia , ni de personalidad</a></li>

									<li><a><i class="fa fa-chevron-right"></i> No hay límite de tiempo para contestar al Cuestionario. No le ocupará más de 15 minutos</a></li>

									<li><a><i class="fa fa-chevron-right"></i> No hay respuestas correctas o erróneas. Será útil en la medida que sea sincero/a en sus respuestas</a></li>

									<li><a><i class="fa fa-chevron-right"></i> Si está más de acuerdo que en desacuerdo con el ítem seleccione 'Mas (+)'. Si, por el contrario, está más en desacuerdo que de acuerdo, seleccione 'Menos (-)'</a></li>

									<li><a><i class="fa fa-chevron-right"></i> Por favor conteste a todos los items</a></li>

									<li><a><i class="fa fa-chevron-right"></i> El Cuestionario es anónimo</a></li>
								</ul>
									</div>

									<table class="table-striped table-bordered table-condensed table-hover" width= "100%">
										<tr>
											<th class="actions">Más (+)</th>
											<th class="actions">Menos (-)</th>
											<th class="actions"> # </th>
											<th><?php echo $this->Paginator->sort('Pregunta'); ?></th>
											
										</tr>

										<?php

										$i = 1; 

										 foreach ($questions as $question): ?>
										<tr>
											<td></td>
											<td></td>
											<td><span class="category"><?php echo $i ?></span></td>
											<td><span class="category"><?php echo $question['Question']['name']; ?></span></td>
										

										<?php

										$i++;
										 endforeach; ?>
									</table>

									
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.padding-md -->
		</div><!-- /.landing -->
