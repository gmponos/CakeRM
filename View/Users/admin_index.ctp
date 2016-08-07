<?php $this->Html->addCrumb($this->Html->link(
	__('Users'),
	['action' => 'index'],
	['icon' => ['class' => 'fa fa-users fa-fw']]
)); ?>
	<div class="toolbar toolbar-default">
		<?= $this->element('search'); ?>
		<?= $this->Html->link(
			__('Add'),
			['action' => 'add'],
			['class' => 'btn btn-success btn-sm', 'icon' => ['class' => 'fa fa-plus fa-fw']]
		); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped small">
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('id'); ?></th>
					<th><?= $this->Paginator->sort('active'); ?></th>
					<th><?= $this->Paginator->sort('verified'); ?></th>
					<th><?= $this->Paginator->sort('username'); ?></th>
					<th><?= $this->Paginator->sort('Group.id', __('Group')); ?></th>
					<th><?= $this->Paginator->sort('firstname'); ?></th>
					<th><?= $this->Paginator->sort('lastname'); ?></th>
					<th><?= $this->Paginator->sort('email'); ?></th>
					<th><?= $this->Paginator->sort('phone'); ?></th>
					<th><?= $this->Paginator->sort('cellphone'); ?></th>
					<th><?= $this->Paginator->sort('created'); ?></th>
					<th><?= $this->Paginator->sort('updated'); ?></th>
					<th><?= __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user) : ?>
					<tr>
						<td><?= h($user['User']['id']); ?></td>
						<td class="text-center"><?= $this->Html->status($user['User']['active']); ?></td>
						<td class="text-center"><?= $this->Html->status($user['User']['verified']); ?></td>
						<td><?= h($user['User']['username']); ?></td>
						<td><?= $this->Html->link(
							$user['Group']['name'],
							['controller' => 'groups', 'action' => 'view', $user['Group']['id']]
						); ?></td>
						<td><?= h($user['User']['firstname']); ?>&nbsp;</td>
						<td><?= h($user['User']['lastname']); ?>&nbsp;</td>
						<td><?= $this->Text->autoLinkEmails($user['User']['email']) ?></td>
						<td><?= h($user['User']['phone']); ?></td>
						<td><?= h($user['User']['cellphone']); ?></td>
						<td>
							<time><?= h($user['User']['created']); ?></time>
						</td>
						<td>
							<time><?= h($user['User']['updated']); ?></time>
						</td>
						<td class="text-nowrap">
							<?= $this->Element->btnLinkView($user['User']['id']); ?>
							<?= $this->Element->btnLinkEdit($user['User']['id']); ?>
							<?= $this->Element->btnLinkDelete($user['User']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	</div>
<?= $this->element('pagination/paging'); ?>
<?= $this->element('pagination/pagination');
