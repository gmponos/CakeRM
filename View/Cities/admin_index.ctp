<?php $this->Html->addCrumb($this->Html->link(__('Cities'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-home fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?php echo $this->element('search'); ?>
		<?php echo $this->Html->link(__('Add'), ['action' => 'add'],
			['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped small">
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('State.name', __('State')); ?></th>
				<th><?php echo $this->Paginator->sort('modified'); ?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($cities as $city) : ?>
				<tr>
					<td><?php echo h($city['City']['id']); ?></td>
					<td><?php echo h($city['City']['name']) ?></td>
					<td>
						<?php echo $this->Html->link($city['State']['name'],
							['controller' => 'states', 'action' => 'view', $city['State']['id']]); ?>
					</td>
					<td><?php echo h($city['City']['modified']) ?></td>
					<td class="actions">
						<?php echo $this->Element->btnLinkView($city['City']['id']); ?>
						<?php echo $this->Element->btnLinkEdit($city['City']['id']); ?>
						<?php echo $this->Element->btnLinkDelete($city['City']['id']); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
