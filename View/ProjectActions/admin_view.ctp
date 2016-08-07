<div class="projectActions view">
<h2><?php echo __('Project Action'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectAction['ProjectAction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($projectAction['ProjectAction']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectAction['Project']['title'], ['controller' => 'projects', 'action' => 'view', $projectAction['Project']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectAction['ModifiedUser']['id'], ['controller' => 'users', 'action' => 'view', $projectAction['ModifiedUser']['id']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($projectAction['ProjectAction']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Action'), ['action' => 'edit', $projectAction['ProjectAction']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Action'), ['action' => 'delete', $projectAction['ProjectAction']['id']], [], __('Are you sure you want to delete # %s?', $projectAction['ProjectAction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Actions'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Action'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), ['controller' => 'projects', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), ['controller' => 'projects', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), ['controller' => 'users', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Modified User'), ['controller' => 'users', 'action' => 'add']); ?> </li>
	</ul>
</div>
