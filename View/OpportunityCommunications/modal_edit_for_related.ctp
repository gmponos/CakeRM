<table class="table table-condensed table-hover table-striped small">
	<tr>
		<th><?php echo __('Description');?></th>
		<th><?php echo __('User');?></th>
		<th><?php echo __('Created');?></th>
		<th><?php echo __('Updated');?></th>
	</tr>
	<?php foreach ($communications as $communication) :?>
		<tr>
			<td><?php echo $communication['OpportunityCommunication']['description'];?></td>
			<td><?php echo $communication['User']['fullname'];?></td>
			<td><?php echo $communication['OpportunityCommunication']['date_created'];?></td>
			<td><?php echo $communication['OpportunityCommunication']['date_updated'];?></td>
		</tr>
	<?php endforeach;?>
</table>