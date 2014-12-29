
        <script src="/vocacion/js/amcharts.js" type="text/javascript"></script>
        <script src="/vocacion/js/radar.js" type="text/javascript"></script>


<div class="bg-light padding-md" id="feature">
				<div class="container">
				<?php echo $time ?>
			
				<!--	<div class="col-md-4 col-sm-5">
						<h5 class="headline">
							Tu Estilo
							<span class="line"></span>
						</h5>
						
							<div id="chartdiv" style="width:500px; height:500px;"></div>

						
					</div><!-- /.col -->
					

	<h2><?php echo __(''); ?></h2>


								
    
	<?php 

	$i = 1;

	foreach ($careers as $career): ?>
	<div class="col-md-7 col-sm-10">
		<div class="panel panel-default fadeInDown animation-delay2">
		<li class="list-group-item clearfix">
											<div class="activity-icon bg-success small">
												<?php echo $i ?>
											</div>
											<div class="pull-left m-left-sm">
												<h4><?php echo $career['Career']['name']; ?></h4>
												<small class="text-muted"><i class="fa fa-globe"></i> Campus <?php echo $career['Career']['campus'] ?></small>
											</div>	
										</li>	
		<div class="panel-body">
			<div class="col-xs-6 col-sm-12 col-md-6 text-left">
			<?php echo $this->Html->image('/images/careers/' . $career['Career']['img'], array('class' => 'img-rounded')); ?>
		</div>
			<div class="col-xs-6 col-sm-12 col-md-6">
				<div class="seperator"></div>
					<a href=<?php echo $career['Career']['webpage'] ?> target="_new"><i class="fa fa-pencil"></i> Página Web</a>
				</div>


			<div class="pull-right m-right-sm">
				<div class="seperator"></div>
				<div class="seperator"></div>
				<span><p> <?php echo $career['Career']['details'] ?> </p></span> 
			</div>		
		</div>
	</div>
</div><!-- /main-container -->
<div class="col-md-5 col-sm-10 text-center">
	<div class="panel panel-default fadeInDown animation-delay2">
		<div class="pull-left m-left-sm">
			<h4>Perfil de la Carrera </h4>
												
		</div>	
	<div id="chartdiv<?php echo $i ?>" style="width:470px; height:430px;"></div>
	
</div>
	</div>
	<?php

		$activo[$i] = $career['Career']['active_mean'];  

        $i++;
	    endforeach; ?>


			
			
		
		</div><!-- /main-container -->
		</div><!-- /main-container -->
			


<script>
    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
</script>

    <script type="text/javascript">
        
     <?php
      $i = 1;
      //$total = count($careers);
      foreach ($careers as $career): ?>


     var a = <?php  echo $career['Career']['active_mean'] ?>;
     var r = <?php  echo $career['Career']['reflexive_mean'] ?>;
     var t = <?php  echo $career['Career']['theorist_mean'] ?>;
     var p = <?php  echo $career['Career']['pragmatic_mean'] ?>;


      createGraph(datos(a,r,t,p), 'chartdiv<?php echo $i ?>');


      <?php
           $i++;
	    endforeach; ?>   
            	
	    function datos(a,r,t,p) {
   

            chartData = [
                {
                    "country": "Activo",
                    "litres": a
                },
                {
                    "country": "Reflexivo",
                    "litres": r
                },
                {
                    "country": "Teórico",
                    "litres": t
                },
                {
                    "country": "Pragmático",
                    "litres": p
             	}
            ];

            return chartData;

        }


        function createGraph(datos,div) {

        	AmCharts.ready(function () {
                // RADAR CHART
                chart = new AmCharts.AmRadarChart();
                chart.dataProvider = datos;
                chart.categoryField = "country";
                chart.startDuration = 2;

                // VALUE AXIS
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0.20;
                valueAxis.minimum = 0;
                valueAxis.maximum = 20;
                valueAxis.dashLength = 3;
                valueAxis.axisTitleOffset = 20;
                valueAxis.gridCount = 5;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "litres";
                graph.bullet = "round";
                graph.balloonText = "[[value]] ";
                chart.addGraph(graph);

                // WRITE
                chart.write(div);
            });

        }
           
        </script>



        






