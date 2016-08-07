<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped small">
        <tr>
            <th><?php echo __('Username'); ?></th>
			<th><?php echo __('Group'); ?></th>
			<th><?php echo __('Firstname'); ?></th>
			<th><?php echo __('Lastname'); ?></th>
			<th><?php echo __('email'); ?></th>
			<th><?php echo __('Phones'); ?></th>
			<th><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($users as $user) : ?>
			<tr>
				<td><?php echo h($user['User']['username']); ?></td>
				<td><?php echo $this->Html->link(
					$user['Group']['name'],
					['controller' => 'groups', 'action' => 'view', $user['Group']['id']]
				); ?></td>
				<td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
				<td><?php echo $this->Text->autoLinkEmails($user['User']['email']) ?></td>
				<td><?php echo h($user['User']['phones']); ?></td>
				<td><?php echo $this->Element->btnLinkView($user['User']['id']); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
