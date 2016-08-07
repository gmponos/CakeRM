<?php $this->Html->addCrumb(
	$this->Html->link(__('Businesses'), ['action' => 'index'],
		['icon' => ['class' => 'fa fa-building-o fa-fw']]
	)
); ?>
	<div class="toolbar toolbar-default">
		<?= $this->element('search'); ?>
		<?= $this->Html->link(__('Add'), ['action' => 'add'],
			['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
		<?= $this->Html->button(__('Filters'), [
			'class' => 'btn btn-primary btn-sm',
			'data-toggle' => 'modal',
			'data-target' => '#modal-index-filters',
			'icon' => ['class' => 'fa fa-filter fa-fw'],
		]); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped small">
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('id'); ?></th>
					<th><?= $this->Paginator->sort('firm'); ?></th>
					<th><?= $this->Paginator->sort('business'); ?></th>
					<th><?= __('Phones') ?></th>
					<th class="text-center"><?= __('Map') ?></th>
					<th><?= $this->Paginator->sort('State.name', __('State')) ?></th>
					<th><?= $this->Paginator->sort('City.name', __('City')) ?></th>
					<th><?= $this->Paginator->sort('afm', __('Afm')) ?></th>
					<th class="visible-lg"><?= $this->Paginator->sort('updated') ?></th>
					<th><?= __('Actions'); ?> </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($businesses as $business) : ?>
					<tr>
						<td><?= $business['Business']['id']; ?></td>
						<td><?= $business['Business']['firm']; ?></td>
						<td><?= h($business['Business']['business']); ?>&nbsp;</td>
						<td>
							<?php if (!empty($business['Business']['phones'])) : ?>
								<strong><?= __('Tel:') ?></strong>
								<?= h($business['Business']['phones']) ?>
							<?php endif; ?>
						</td>
						<td class="text-center">
							<?php
							if (!empty($business['Business']['address'])) :
								echo $this->Html->link('',
									['admin' => false, 'action' => 'map', $business['Business']['id']],
									['class' => 'popover-map', 'icon' => 'home']);
							endif;
							?>
						</td>
						<td><?= $this->Html->link($business['State']['name'],
								['controller' => 'states', 'action' => 'view', $business['State']['id']]); ?></td>
						<td><?= $this->Html->link($business['City']['name'],
								['controller' => 'cities', 'action' => 'view', $business['City']['id']]); ?></td>
						<td><?= h($business['Business']['afm']); ?>&nbsp;</td>
						<td class="visible-lg">
							<time><?= h($business['Business']['updated']) ?></time>
						</td>
						<td class="actions">
							<?= $this->Element->btnLinkView($business['Business']['id']); ?>
							<?= $this->Element->btnLinkEdit($business['Business']['id']); ?>
							<?= $this->Element->btnLinkDelete($business['Business']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
echo $this->element('modals/businesses/filters');
echo $this->element('modals/businesses/export');
