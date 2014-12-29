<?php echo $this->Html->css(array('bootstrap-editable.css', '/select2/select2.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js', '/select2/select2.js'), array('inline' => false)); ?>

<div class="answers index">
	<h2><?php echo __('Preguntas del Test'); ?></h2>
<table class="table-striped table-bordered table-condensed table-hover" width= "100%">
	<tr>
		<th><?php echo $this->Paginator->sort('#'); ?></th>
		<th><?php echo $this->Paginator->sort('Usuario'); ?></th>
		<th><?php echo $this->Paginator->sort('Pregunta'); ?></th>
		<th><?php echo $this->Paginator->sort('Respuesta'); ?></th>
		<th><?php echo $this->Paginator->sort('Fecha'); ?></th>
		<th class="actions">#</th>
	</tr>
	<?php foreach ($answers as $answer): ?>
	<tr>
		<td><span class="category"><?php echo $answer['Answer']['id']; ?></span></td>
		<td><span class="name"><?php echo $answer['Answer']['users_id']; ?></span></td>
		<td><span class="name"><?php echo $answer['Question']['name']; ?></span></td>
			<td><span class="name"><?php echo $answer['Answer']['value']; ?></span></td>
			<td><span class="name"><?php echo $answer['Answer']['created']; ?></span></td>

		<td class="actions" >
			 
			 <?php echo $this->Html->link('Ver', array('action' => 'view', $answer['Answer']['id']), array('class' => 'btn btn-success')); ?>
            <?php echo $this->Html->link('Editar', array('action' => 'edit', $answer['Answer']['id']), array('class' => 'btn btn-success')); ?> 
				<?php echo $this->Form->postLink(__('Borrar') , array('action' => 'delete', $answer['Answer']['id']), null, __('Are you sure you want to delete # %s?', $answer['Answer']['id'])); ?>
				</td>
	
	<?php endforeach; ?>
</table>
<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New answer'), array('action' => 'add')); ?></li>
	</ul>
</div>
