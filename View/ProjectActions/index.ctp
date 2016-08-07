<div class="projectActions index">
	<h2><?php echo __('Project Actions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projectActions as $projectAction) : ?>
	<tr>
		<td><?php echo h($projectAction['ProjectAction']['id']); ?>&nbsp;</td>
		<td><?php echo h($projectAction['ProjectAction']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectAction['Project']['title'], ['controller' => 'projects', 'action' => 'view', $projectAction['Project']['id']]); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectAction['ModifiedUser']['id'], ['controller' => 'users', 'action' => 'view', $projectAction['ModifiedUser']['id']]); ?>
		</td>
		<td><?php echo h($projectAction['ProjectAction']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $projectAction['ProjectAction']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $projectAction['ProjectAction']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectAction['ProjectAction']['id']], [], __('Are you sure you want to delete # %s?', $projectAction['ProjectAction']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter([
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	]);
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), [], null, ['class' => 'prev disabled']);
		echo $this->Paginator->numbers(['separator' => '']);
		echo $this->Paginator->next(__('next') . ' >', [], null, ['class' => 'next disabled']);
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Project Action'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), ['controller' => 'projects', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), ['controller' => 'projects', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), ['controller' => 'users', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Modified User'), ['controller' => 'users', 'action' => 'add']); ?> </li>
	</ul>
</div>
