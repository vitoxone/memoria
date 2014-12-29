<?php echo $this->Html->css(array('bootstrap-editable.css', '/select2/select2.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js', '/select2/select2.js'), array('inline' => false)); ?>

<div class="questions index">
	<h2><?php echo __('Preguntas del Test'); ?></h2>
<table class="table-striped table-bordered table-condensed table-hover" width= "100%">
	<tr>
		<th><?php echo $this->Paginator->sort('Pregunta'); ?></th>
		<th><?php echo $this->Paginator->sort('Estilo Asociado'); ?></th>
		<th><?php echo $this->Paginator->sort('estado'); ?></th>
		<th><?php echo $this->Paginator->sort('Fecha Creación'); ?></th>
		<th><?php echo $this->Paginator->sort('Fecha Modificación'); ?></th>
		<th class="actions">#</th>
	</tr>
	<?php foreach ($questions as $question): ?>
	<tr>
		<td><span class="category"><?php echo $question['Question']['name']; ?></span></td>
		<td><span class="category"><?php echo $question['Style']['name']; ?></span></td>
		<td><?php echo $this->Html->link($this->Html->image('icon_' . $question['Question']['active'] . '.png'), array('controller' => 'questions', 'action' => 'switch', 'active', $question['Question']['id']), array('class' => 'status', 'escape' => false)); ?></td>
		<td><span class="name"><?php echo $question['Question']['created']; ?></span></td>
		<td><span class="name"><?php echo $question['Question']['modified']; ?></span></td>

		<td class="actions" >
			 
			 <?php echo $this->Html->link('Ver', array('action' => 'view', $question['Question']['id']), array('class' => 'btn btn-success')); ?>
            <?php echo $this->Html->link('Editar', array('action' => 'edit', $question['Question']['id']), array('class' => 'btn btn-success')); ?> 
				<?php echo $this->Form->postLink(__('Borrar') , array('action' => 'delete', $question['Question']['id']), null, __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?>
				</td>
	
	<?php endforeach; ?>
</table>
<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New question'), array('action' => 'add')); ?></li>
	</ul>
</div>
