<div class="careers index">
	<h2><?php echo __('Carreras'); ?></h2>
<table class="table-striped table-bordered table-condensed table-hover" width= "100%">
	<tr>
		<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('Estado'); ?></th>
		<th class="actions">#</th>
	</tr>
	<?php foreach ($careers as $career): ?>
	<tr>
		<td><span class="category"><?php echo $career['Career']['name']; ?></span></td>
			<td><?php echo $this->Html->link($this->Html->image('icon_' . $career['Career']['active'] . '.png'), array('controller' => 'careers', 'action' => 'switch', 'active', $career['Career']['id']), array('class' => 'status', 'escape' => false)); ?></td>
		<td class="actions" >
			 <?php echo $this->Html->link(__('Ver'),'/admin/careers/view/'.$career['Career']['id'] ,array('class' => 'btn btn-success')); ?> 
            <?php echo $this->Html->link(__('Editar'),'/admin/careers/edit/'.$career['Career']['id'] ,array('class' => 'btn btn-success')); ?> 
				<?php echo $this->Form->postLink(__('Borrar') , array('action' => 'delete', $career['Career']['id']), null, __('Are you sure you want to delete # %s?', $career['Career']['id'])); ?>
				</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Career'), array('action' => 'add')); ?></li>
	</ul>
</div>
