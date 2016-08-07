<div class="projectActions form">
<?php echo $this->Form->create('ProjectAction'); ?>
	<fieldset>
		<legend><?php echo __('Edit Project Action'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description');
		echo $this->Form->input('project_id');
		echo $this->Form->input('modified_user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $this->Form->value('ProjectAction.id')], [], __('Are you sure you want to delete # %s?', $this->Form->value('ProjectAction.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Project Actions'), ['action' => 'index']); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), ['controller' => 'projects', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), ['controller' => 'projects', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), ['controller' => 'users', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Modified User'), ['controller' => 'users', 'action' => 'add']); ?> </li>
	</ul>
</div>
