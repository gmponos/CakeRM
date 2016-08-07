<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['controller' => 'tasks', 'action' => 'index'], ['icon' => ['class' => 'fa fa-tasks fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Tasks Statuses'), ['action' => 'index']));?>
<div class="table-responsive">
	<table class="table tablever table-striped small">
		<tr>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($taskStatuses as $taskStatus) :?>
			<tr>
				<td><?php echo h($taskStatus['TaskStatus']['status']);?>&nbsp;</td>
				<td>
					<?php echo $this->Element->btnLinkView($taskStatus['TaskStatus']['id']);?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>