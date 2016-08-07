<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped table-limited small">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('browser'); ?></th>
			<th><?php echo $this->Paginator->sort('IP'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($logins as $login) : ?>
			<tr>
				<td><?php echo h($login['Login']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link(
						$login['User']['fullname'],
						['controller' => 'users', 'action' => 'view', $login['User']['id']]
					); ?>
				</td>
				<td><?php echo h($login['Login']['browser']); ?></td>
				<td><?php echo h($login['Login']['IP']); ?></td>
				<td><?php echo h($login['Login']['modified']); ?></td>
				<td>
					<?php echo $this->Element->btnLinkDelete($login['Login']['id']); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
