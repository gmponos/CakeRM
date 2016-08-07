<?php $this->Html->addCrumb($this->Html->link(__('Businesses'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-building-o fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?php echo $this->element('search'); ?>
		<?php echo $this->Html->link(__('Add'), ['action' => 'add'],
			['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
		<?php echo $this->Html->button(__('Filters'), [
			'class' => 'btn btn-info btn-sm',
			'data-toggle' => 'modal',
			'data-target' => '#modal-index-filters',
			'icon' => 'filter',
		]); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped small">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('firm'); ?></th>
					<th><?php echo $this->Paginator->sort('business'); ?></th>
					<th><?php echo __('Phones') ?></th>
					<th class="text-center"><?php echo __('Map') ?></th>
					<th><?php echo $this->Paginator->sort('State.name', __('State')) ?></th>
					<th><?php echo $this->Paginator->sort('City.name', __('City')) ?></th>
					<th><?php echo $this->Paginator->sort('afm', __('afm')) ?></th>
					<th><?php echo __('Actions'); ?> </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($businesses as $business) : ?>
					<tr>
						<td><?php echo $this->Html->link($business['Business']['firm'], [
								'controller' => 'businesses',
								'action' => 'view',
								$business['Business']['id'],
							]); ?></td>
						<td><?php echo h($business['Business']['business']); ?>&nbsp;</td>
						<td>
							<?php if (!empty($business['Business']['phones'])) : ?>
								<strong><?php echo __('Tel:') ?></strong>
								<?php echo h($business['Business']['phones']) ?>
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
						<td><?php echo $this->Html->link($business['State']['name'],
								['controller' => 'states', 'action' => 'view', $business['State']['id']]); ?></td>
						<td><?php echo $this->Html->link($business['City']['name'],
								['controller' => 'cities', 'action' => 'view', $business['City']['id']]); ?></td>
						<td><?php echo h($business['Business']['afm']); ?>&nbsp;</td>
						<td class="text-nowrap">
							<?php echo $this->Element->btnLinkView($business['Business']['id']); ?>
							<?php echo $this->Element->btnLinkEdit($business['Business']['id']); ?>
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
