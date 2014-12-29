<?php echo $this->Html->css(array('bootstrap-editable.css', '/select2/select2.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js', '/select2/select2.js'), array('inline' => false)); ?>

<!--

<script>

$(document).ready(function() {
	$('.name').editable({
		type: 'text',
		name: 'name',
		url: '<?php echo $this->webroot; ?>admin/products/editable',
		title: 'Name',
		placement: 'right',
	});


});
</script>
-->
<div class="alert-animated ">
           <h3> Naive Bayes</h3>
          </div>

<table class="table-striped table-bordered table-condensed table-hover" width= "80%">
	<tr>
		<th><?php echo 'Carrera' ?></th>
		<th><?php echo 'Colaboraciones' ?></th>
		<th><?php echo 'Media Activo' ?></th>
		<th><?php echo 'Varianza Activo' ?></th>
		<th><?php echo 'Media Reflexivo' ?></th>
		<th><?php echo 'Varianza Reflexivo' ?></th>
		<th><?php echo 'Media Teórico ' ?></th>
		<th><?php echo 'Varianza Teórico' ?></th>
		<th><?php echo 'Media Pragmático' ?></th>
		<th><?php echo 'Varianza Pragmático' ?></th>
		<th><?php echo 'Probabilidad' ?></th>
	</tr>
	<?php foreach ($careers as $career): ?>
	<tr>

		<td><span class="badge badge-success m-left-bg"><?php echo $career['Career']['name']; ?></span></td>
		<td><?php echo $career['Career']['total_collaborators']; ?></td>

		<td><?php echo $career['Career']['active_mean']; ?> </td>
		<td><?php echo $career['Career']['active_variance']; ?> </td>
		<td> <?php echo $career['Career']['reflexive_mean']; ?> </td>
		<td> <?php echo $career['Career']['reflexive_variance']; ?> </td>
		<td> <?php echo $career['Career']['theorist_mean']; ?></td>
		<td> <?php echo $career['Career']['theorist_variance']; ?></td>
		<td> <?php echo $career['Career']['pragmatic_mean']; ?> </td>
		<td> <?php echo $career['Career']['pragmatic_variance']; ?> </td>
		<td> <?php echo $career['Career']['probability']; ?> </td>

	</tr>
	<?php endforeach; ?>
</table>



<br />


<a class="btn btn-success hidden-print" id="invoicePrint"><i class="fa fa-print"></i> Print</a>

	<script>
		$(function()	{
			$('#invoicePrint').click(function()	{
				window.print();
			});
		});
	</script>
