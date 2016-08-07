<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped small">
        <tr>
            <th><?= __('id'); ?></th>
            <th><?= __('Active'); ?></th>
            <th><?= __('Verified'); ?></th>
            <th><?= __('Username'); ?></th>
            <th><?= __('Group'); ?></th>
            <th><?= __('Firstname'); ?></th>
            <th><?= __('Lastname'); ?></th>
            <th><?= __('email'); ?></th>
            <th><?= __('Phones'); ?></th>
            <th><?= __('Created'); ?></th>
            <th><?= __('Updated'); ?></th>
            <th class="text-nowrap"><?= __('Actions'); ?></th>
        </tr>
        <?php foreach ($users as $user) : ?>
			<tr>
				<td><?= h($user['User']['id']); ?></td>
				<td><?= $this->Html->status($user['User']['active']); ?></td>
				<td><?= $this->Html->status($user['User']['verified']); ?></td>
				<td><?= h($user['User']['username']); ?></td>
				<td><?= $this->Html->link($user['Group']['name'],
						['controller' => 'groups', 'action' => 'view', $user['Group']['id']]); ?></td>
				<td><?= h($user['User']['firstname']); ?>&nbsp;</td>
				<td><?= h($user['User']['lastname']); ?>&nbsp;</td>
				<td><?= $this->Text->autoLinkEmails($user['User']['email']) ?></td>
				<td><?= h($user['User']['phones']); ?></td>
				<td>
					<time><?= h($user['User']['date_updated']); ?></time>
				</td>
				<td>
					<time><?= h($user['User']['date_updated']); ?></time>
				</td>
				<td class="text-nowrap">
					<?= $this->Element->btnLinkView($user['User']['id']); ?>
					<?= $this->Element->btnLinkEdit($user['User']['id']); ?>
					<?= $this->Element->btnLinkDelete($user['User']['id']); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
