<div class="studyLevels view">
<h2><?php echo __('Study Level'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($studyLevel['StudyLevel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($studyLevel['StudyLevel']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Study Level'), array('action' => 'edit', $studyLevel['StudyLevel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Study Level'), array('action' => 'delete', $studyLevel['StudyLevel']['id']), null, __('Are you sure you want to delete # %s?', $studyLevel['StudyLevel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Study Levels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Study Level'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($studyLevel['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Rut'); ?></th>
		<th><?php echo __('Register'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Gender Id'); ?></th>
		<th><?php echo __('Careers Id'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th><?php echo __('Study Level Id'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($studyLevel['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['rut']; ?></td>
			<td><?php echo $user['register']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['gender_id']; ?></td>
			<td><?php echo $user['careers_id']; ?></td>
			<td><?php echo $user['role_id']; ?></td>
			<td><?php echo $user['study_level_id']; ?></td>
			<td><?php echo $user['year']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
