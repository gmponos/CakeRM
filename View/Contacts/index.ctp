<?php $this->Html->addCrumb($this->Html->link(__('Contacts'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-book fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?= $this->element('search'); ?>
		<?= $this->Element->btnToolbarAdd(); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped small">
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('lastname'); ?></th>
					<th><?= $this->Paginator->sort('firstname'); ?></th>
					<th><?= __('Phones'); ?></th>
					<th><?= $this->Paginator->sort('State.name', __('State')); ?></th>
					<th><?= $this->Paginator->sort('City.name', __('City')); ?></th>
					<th><?= __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($contacts as $contact) : ?>
					<tr>
						<td><?= h($contact['Contact']['lastname']); ?>&nbsp;</td>
						<td><?= h($contact['Contact']['firstname']); ?>&nbsp;</td>
						<td>
							<?php if (!empty($contact['Contact']['phones'])) : ?>
								<strong><?= __('Tel:') ?></strong>
								<?= $contact['Contact']['phones']; ?>
							<?php endif; ?>
							&nbsp;
						</td>
						<td><?= $this->Html->link($contact['State']['name'],
								['controller' => 'states', 'action' => 'view', $contact['State']['id']]) ?></td>
						<td><?= $this->Html->link($contact['City']['name'],
								['controller' => 'cities', 'action' => 'view', $contact['City']['id']]) ?></td>
						<td class="actions">
							<?= $this->Element->btnLinkView($contact['Contact']['id']); ?>
							<?= $this->Element->btnLinkEdit($contact['Contact']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
