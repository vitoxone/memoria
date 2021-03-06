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
           <h3> Usuarios Registrados</h3>
          </div>
  <?php
$this->Html->addCrumb('Usuarios');

?>
<!--li><?php echo $this->Html->link('users CSV Export', array('controller' => 'users', 'action' => 'csv')); ?></li>-->


<table class="table-striped table-bordered table-condensed table-hover" width= "100%">
	<tr>
		<th><?php echo $this->Paginator->sort('Rol'); ?></th>
		<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('Rut'); ?></th>
		<th><?php echo $this->Paginator->sort('Username'); ?></th>
		<th><?php echo $this->Paginator->sort('email'); ?></th>
		<th><?php echo $this->Paginator->sort('Género'); ?></th>
		<th><?php echo $this->Paginator->sort('Carrera'); ?></th>
		<th><?php echo $this->Paginator->sort('Estado'); ?></th>
		<th><?php echo $this->Paginator->sort('Activo'); ?></th>
		<th><?php echo $this->Paginator->sort('Reflexivo'); ?></th>
		<th><?php echo $this->Paginator->sort('Teórico'); ?></th>
		<th><?php echo $this->Paginator->sort('Pragmático'); ?></th>
		<th><?php echo $this->Paginator->sort('Fecha Creación'); ?></th>
		<th><?php echo $this->Paginator->sort('Última Modificación'); ?></th>
		<th class="actions">#</th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>

		<td><span class="badge badge-success m-left-bg"><?php echo $user['Role']['name']; ?></span></td>
		<td><span class="name"><?php echo $user['User']['name']; ?></span></td>
		<td><span class="name"><?php echo $user['User']['rut']; ?></span></td>
		<td><span class="name"><?php echo $user['User']['username']; ?></span></td>
		<td><span class="name"><?php echo $user['User']['email']; ?></span></td>
		<td><span class="name"><?php echo $user['Gender']['name']; ?></span></td>
		<td><span class="name"><?php echo $user['Career']['name']; ?></span></td>
		<td><?php echo $this->Html->link($this->Html->image('icon_' . $user['User']['active'] . '.png'), array('controller' => 'users', 'action' => 'switch', 'active', $user['User']['id']), array('class' => 'status', 'escape' => false)); ?></td>
		<td><span class="name"><?php echo $user['User']['active_style']; ?></span></td>
		<td><span class="name"><?php echo $user['User']['reflexive_style']; ?></span></td>
		<td><span class="name"><?php echo $user['User']['theorist_style']; ?></span></td>
		<td><span class="name"><?php echo $user['User']['pragmatic_style']; ?></span></td>					
		<td><span class="name"><?php echo $user['User']['created']; ?></span></td>
		<td><span class="name"><?php echo $user['User']['modified']; ?></span></td>

		<td class="actions" >
			 <?php echo $this->Html->link(__('Ver'),'/users/view/'.$user['User']['id'] ,array('class' => 'btn btn-success')); ?> 
            <?php echo $this->Html->link(__('Editar'),'/users/edit/'.$user['User']['id'] ,array('class' => 'btn btn-success')); ?> 
				<?php echo $this->Form->postLink(__('Borrar') , array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
				</td>
	</tr>
	<?php endforeach; ?>
</table>



<br />


<?php echo $this->element('pagination'); ?>

<a class="btn btn-success hidden-print" id="invoicePrint"><i class="fa fa-print"></i> Print</a>

	<script>
		$(function()	{
			$('#invoicePrint').click(function()	{
				window.print();
			});
		});
	</script>
