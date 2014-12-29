<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>

<div class="panel panel-default">
							

<div id="chartdiv"></div>

<script>
var chart = AmCharts.makeChart("chartdiv", {
    "type": "pie",
	"theme": "chalk",
    "titles": [{
        "text": "Total Colaboraciones por Carrera",
        "size": 18
    }],
    "dataProvider": <?php echo $json ?>,
    "valueField": "number",
    "titleField": "career",
    "startEffect": "<",
    "startDuration": 1,
    "labelRadius": 15,
    "innerRadius": "50%",
    "depth3D": 10,
    "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 15,
    "exportConfig":{	
      menuItems: [{
      icon: '/img/export.png',
      format: 'png'	  
      }]  
	}
});

</script>

