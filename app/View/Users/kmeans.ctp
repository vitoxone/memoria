<div  class="container">
	<h2><?php echo __('Datos de la muestra'); ?></h2>

<div id="controls">
  <button onclick="redraw();">Clasificar</button>
  <button onclick="step();">Step</button>
  <button onclick="changeK(1);">Increase K</button>
  <button onclick="changeK(-1);">Decrease K</button>
</div>


<div id="graph" style="height: 100%; width:100%; background-color:#FFDDDD;"></div>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>x</th>
			<th>y</th>
	</tr>
	<?php foreach ($posts as $part): ?>
	<tr>
		<td><?php echo $part[0] ?>&nbsp;</td>
		<td><?php echo $part[1] ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>

</div>
<script src="http://rawgithub.com/jbeuckm/K-Means/master/build/kmeans.min.js"></script>
<script type="text/javascript" src="http://mbostock.github.com/d3/d3.js"></script>
<script>

  var ranges = [ [0,1], [0,1] ];
  var points = <?php echo $json ?>

  //var points = [ [1.2857, -0.7358], [-2.9860, -3.4649], [4.6991, -0.3918], [5.4888, 6.8625] , [2.4014, 3.6354] , [0.6154, 1.5873] , [1.6013, 1.0153] , [2.7619, -0.9565] , [-3.9719, -2.8929] , [1.2874, -0.9289] , [-4.0884, -3.1182] , [-4.5788, -2.7744] , [1.1109, -0.0311] , [0.8081, -5.8528], [-0.1992, 3.2310], [-3.9333, 4.4957], [-2.3025, 0.3201]];

  var means = [];

  var assignments = kmeans.assignPointsToMeans(points, means);

  var svg = d3.select('#graph').append('svg').attr('width',800).attr('height',800);

  var graph = svg.append('g').attr('transform', 'translate(400,400)');
  var meanLayer = graph.append('g');

  var xScale = d3.scale.linear().domain([0,10]).range([0,500]);
  var yScale = d3.scale.linear().domain([0,10]).range([0,500]);

  var color = d3.scale.category10();

  function redraw() {

  	//changeK(4);

    var assignmentLines = meanLayer.selectAll('.assignmentLines').data(assignments);
    assignmentLines.enter().append('line').attr('class','assignmentLines')
      .attr('x1',function(d, i){ return xScale(points[i][0]); })
      .attr('y1',function(d, i){ return yScale(points[i][1]); })
      .attr('x2',function(d, i){ return xScale(means[d][0]); })
      .attr('y2',function(d, i){ return yScale(means[d][1]); })
      .attr('stroke', function(d) { return color(d); });

    assignmentLines.transition().duration(500)
      .attr('x2',function(d, i){ return xScale(means[d][0]); })
      .attr('y2',function(d, i){ return yScale(means[d][1]); })
      .attr('stroke', function(d) { return color(d); });

    var meanDots = meanLayer.selectAll('.meanDots').data(means);
    meanDots.enter().append('circle').attr('class','meanDots')
      .attr('r', 5)
      .attr('stroke', function(d, i) { return color(i); })
      .attr('stroke-width', 3)
      .attr('fill', 'white')
      .attr('cx',function(d){ return xScale(d[0]); })
      .attr('cy',function(d){ return yScale(d[1]); });
    meanDots.transition().duration(500)
      .attr('cx',function(d){ return xScale(d[0]); })
      .attr('cy',function(d){ return yScale(d[1]); });
    meanDots.exit().remove();

  }

  function redrawPoints() {

    var pointDots = graph.selectAll('.pointDots').data(points);
    pointDots.enter().append('circle').attr('class','pointDots')
      .attr('r', 3)
      .attr('cx',function(d){ return xScale(d[0]); })
      .attr('cy',function(d){ return yScale(d[1]); })
  }


    changeK(25);
    //redraw();
    redrawPoints();


  function step() {

    oldAssignments = assignments;

    kmeans.moveMeansToCenters(points, assignments, means);

    assignments = kmeans.assignPointsToMeans(points, means);

    var changeCount = kmeans.countChangedAssignments(assignments, oldAssignments);

    var aveDistance = kmeans.findAverageDistancePointToMean(points, means, assignments);
    var aveMeanSeparation = kmeans.findAverageMeanSeparation(means);
    var sse = kmeans.sumSquaredError(points, means, assignments);
    redraw();
  }



  function changeK(amt) {
    if (amt > 0) {
      while (amt--) {
        var i = Math.floor(Math.random() * points.length);

       // alert("pivot: "+ i);

        var p = points[i];
        var newPoint = p.slice(0);
console.log("adding new point "+newPoint);
        means.push(newPoint);
      }
    }
    else while (amt < 0) {
      means.pop();
      amt++;
    }
    assignments = kmeans.assignPointsToMeans(points, means);
   // redraw();
  }

</script>

