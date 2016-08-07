<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo $this->Html->link('', ['controller' => 'tasks', 'action' => 'add'], ['class' => 'btn btn-success btn-xs', 'icon' => 'plus']);?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-limited table-striped table-condensed small">
			<tr>
				<th><?php echo __('Created');?></th>
				<th><?php echo __('User');?></th>
				<th><?php echo __('Business');?></th>
				<th><?php echo __('Contact');?></th>
				<th><?php echo __('Description');?></th>
				<th><?php echo __('Received');?></th>
				<th><?php echo __('Repaired');?></th>
				<th><?php echo __('Actions');?></th>
			</tr>
			<?php if (!empty($repairs)) :?>
				<?php foreach ($repairs as $repair) :?>
					<tr>
						<td><time><?php echo $repair['Repair']['date_created']?></time></td>
						<td><?php echo $repair['User']['lastname'];?>&nbsp;</td>
						<td><?php echo (empty($repair['Business']['firm']) ? '' : $repair['Business']['firm'])?>&nbsp;</td>
						<td><?php echo (empty($repair['Contact']['fullname']) ? '' : $repair['Contact']['fullname'])?>&nbsp;</td>
						<td><?php echo $repair['Repair']['description']?></td>
						<td><time><?php echo $repair['Repair']['date_received']?>&nbsp;</time></td>
						<td><time><?php echo $repair['Repair']['date_repaired'];?>&nbsp;</time></td>
						<td>
							<?php echo $this->Html->link(__('View'), ['controller' => 'repairs', 'action' => 'view', $repair['Repair']['id']], ['class' => 'fa fa-zoomin']);?>
							<?php echo $this->Html->link(__('Edit'), ['controller' => 'repairs', 'action' => 'edit', $repair['Repair']['id']], ['class' => 'fa fa-pencil']);?>
						</td>
					</tr>
				<?php endforeach;?>
			<?php endif;?>
		</table>
	</div>
</div>