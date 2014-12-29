<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>

<div class="panel panel-default">
							

<div id="chartdiv"></div>							


</div><!-- panel -->

<script>

var datos = [{
        "career": "United States",
        "number": 7252
    }, {
        "career": "China",
        "number": 3882
    }, {
        "career": "Japan",
        "number": 1809
    }, {
        "career": "Germany",
        "number": 1322
    }, {
        "career": "United Kingdom",
        "number": 1122
    }, {
        "career": "France",
        "number": 414
    }, {
        "career": "India",
        "number": 384
    }, {
        "career": "Spain",
        "number": 211
    }];

var chart = AmCharts.makeChart("chartdiv", {
    "type": "pie",
	"theme": "chalk",
    "titles": [{
        "text": "Total Colaboraciones",
        "size": 16
    }],
    "dataProvider": <?php echo $json ?>,
    "valueField": "number",
    "titleField": "career",
    "startEffect": "elastic",
    "startDuration": 2,
    "labelRadius": 15,
    "innerRadius": "50%",
    "depth3D": 10,
    "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 15,
    "exportConfig":{	
      menuItems: [{
      icon: '/lib/3/images/export.png',
      format: 'png'	  
      }]  
	}
});

</script>