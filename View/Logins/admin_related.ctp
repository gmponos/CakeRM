<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered small">
        <tr>
            <th><?php echo __('id'); ?></th>
			<th><?php echo __('browser'); ?></th>
			<th><?php echo __('IP'); ?></th>
			<th><?php echo __('modified'); ?></th>
			<th><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($logins as $login) : ?>
			<tr>
				<td><?php echo h($login['Login']['id']); ?>&nbsp;</td>
				<td><?php echo h($login['Login']['browser']); ?>&nbsp;</td>
				<td><?php echo h($login['Login']['IP']); ?>&nbsp;</td>
				<td>
					<time><?php echo h($login['Login']['modified']); ?></time>
				</td>
				<td class="text-center text-nowrap">
					<?php echo $this->Element->btnLinkDelete([
						'action' => 'delete_related',
						$login['Login']['id'],
						$this->request->params['named']['user_id'],
					], '', ['data-update' => '#related-logins']); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
