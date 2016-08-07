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
					<td><?php echo $this->Html->link($business['Business']['firm'],
							['controller' => 'businesses', 'action' => 'view', $business['Business']['id']]); ?></td>
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