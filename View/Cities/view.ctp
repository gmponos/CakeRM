<?php $this->Html->addCrumb($this->Html->link(__('Cities'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-home fa-fw']])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($city['City']['id']); ?>
<div class="list-group">
	<?php echo $this->Element->btnToolbarAdd(); ?>
	<?php echo $this->Element->btnToolbarReturn(); ?>
</div>
<dl class="dl-horizontal">
	<dt><?php echo __('State'); ?></dt>
	<dd>
		<?php echo $this->Html->link($city['State']['name'],
			['controller' => 'states', 'action' => 'view', $city['State']['id']]); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('City'); ?></dt>
	<dd>
		<?php echo h($city['City']['name']); ?>
	</dd>
</dl>
<ul class="nav nav-tabs nav-tabs-remote">
	<li class="active"><?php echo $this->Html->link(__('Businesses'),
			['controller' => 'businesses', 'action' => 'related', 'city_id' => $city['City']['id']],
			["data-toggle" => "tab", 'data-target' => '#tab-business-related']) ?></li>
	<li><?php echo $this->Html->link(__('Contacts'),
			['controller' => 'contacts', 'action' => 'related', 'city_id' => $city['City']['id']],
			["data-toggle" => "tab", 'data-target' => '#tab-contacts-related']) ?></li>
</ul>
<div class="tab-content">
	<div id="tab-business-related" class="tab-pane active">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $this->Html->link('', ['controller' => 'businesses', 'action' => 'add'],
					['class' => 'btn btn-success btn-xs', 'icon' => 'plus']); ?>
			</div>
			<div class="table-responsive">
				<table class="table table-hover table-striped small">
					<tr>
						<th><?php echo __('Firm'); ?></th>
						<th><?php echo __('Business'); ?></th>
						<th><?php echo __('Phones') ?></th>
						<th><?php echo __('Map') ?></th>
						<th><?php echo __('State') ?></th>
						<th><?php echo __('City') ?></th>
						<th><?php echo __('Actions'); ?> </th>
					</tr>
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
							<td>
								<?php
								if (!empty($business['Business']['address'])) :
									echo $this->Html->link('',
										['admin' => false, 'action' => 'map', $business['Business']['id']],
										['class' => 'popover-map']);
								endif;
								?>
							</td>
							<td><?php echo $this->Html->link($business['State']['name'],
									['controller' => 'states', 'action' => 'view', $business['State']['id']]); ?></td>
							<td><?php echo $this->Html->link($business['City']['name'],
									['controller' => 'cities', 'action' => 'view', $business['City']['id']]); ?></td>
							<td class="actions">
								<?php echo $this->Element->btnLinkView($business['Business']['id']); ?>
								<?php echo $this->Element->btnLinkEdit($business['Business']['id']); ?>
								<?php echo $this->Element->btnLinkMail($business['Business']['id']); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
	<div id="tab-contacts-related" class="tab-pane"></div>
</div>
