<?php if (empty($contract['Contract']) || $contract['Contract']['date_end'] < date("Y-m-d")) :?>
	<div class="alert alert-danger">
		<?php echo __('The customer does not have a contract')?>
	</div>
<?php else :?>
	<div class="alert alert-success">
		<?php echo __('The customer has a contract ending at %s', $contract['Contract']['end']);?>
	</div>
<?php endif;?>
<table class="table table-striped small">
	<tr>
		<th><?php echo __('Created')?></th>
		<th><?php echo __('Description')?></th>
		<th><?php echo __('Contact')?></th>
		<th></th>
		<th><?php echo __('Completed')?></th>
	</tr>
	<?php if (!empty($tasks)) :?>
		<tbody>
			<?php foreach ($tasks as $task) :?>
				<tr>
					<td>
						<div><?php echo $task['CreatedUser']['lastname']?></div>
						<div><time><?php echo $task['Task']['date_created']?></time></div>
					</td>
					<td><?php echo $task['Task']['description']?></td>
					<td><?php echo (empty($task['Contact']['fullname']) ? '' : $task['Contact']['fullname'])?>&nbsp;</td>
					<td class="text-center"><?php echo $this->Html->link('', ['controller' => 'task_statuses', 'action' => 'view', $task['TaskStatus']['id']], ['icon' => $task['TaskStatus']['icon']]);?></td>
					<td><time><?php echo $task['Task']['date_completed'];?>&nbsp;</time></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	<?php endif;?>
</table>