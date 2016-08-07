<?php $this->Html->addCrumb($this->Html->link(__('Opportunities'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-thumbs-o-up fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?php echo $this->Html->link(__('Add'), ['action' => 'add'],
			['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped table-limited small">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('responsible_user_id', __('Responsible')); ?></th>
					<th><?php echo $this->Paginator->sort('OpportunityStatus.status', __('Status')); ?></th>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('business_id'); ?></th>
					<th><?php echo $this->Paginator->sort('contact_id'); ?></th>
					<th><?php echo $this->Paginator->sort('campaign_id'); ?></th>
					<th><?php echo $this->Paginator->sort('channel_id'); ?></th>
					<th><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($opportunities as $opportunity) : ?>
					<tr>
						<td class="text-muted">
							<time><?= h($opportunity['Opportunity']['date_created']); ?></time>
						</td>
						<td>
							<?php echo $this->Html->link($opportunity['ResponsibleUser']['lastname'],
								['controller' => 'user', 'action' => 'view', $opportunity['ResponsibleUser']['id']]); ?>
						</td>
						<td>
							<?php echo $this->Html->link($opportunity['OpportunityStatus']['status'], [
								'controller' => 'opportunity_statuses',
								'action' => 'view',
								$opportunity['OpportunityStatus']['id'],
							], []); ?>
						</td>
						<td>
							<?php echo $this->Text->autoParagraph($opportunity['Opportunity']['description']); ?>&nbsp;
							<?php
							if ($opportunity['Opportunity']['opportunity_communication_count'] != 0) {
								echo $this->Html->icon('comments',
									$opportunity['Opportunity']['opportunity_communication_count']);
							}
							?>
						</td>
						<td>
							<?php
							echo $this->Html->link($opportunity['Business']['firm'],
								['controller' => 'businesses', 'action' => 'view', $opportunity['Business']['id']], [
									'class' => 'popover-remote',
									'data-remote' => $this->Html->url([
										'admin' => false,
										'controller' => 'businesses',
										'action' => 'popover_view',
										$opportunity['Business']['id'],
									]),
								]);
							?>
						</td>
						<td>
							<?php echo $this->Html->link($opportunity['Contact']['fullname'],
								['controller' => 'contacts', 'action' => 'view', $opportunity['Contact']['id']], [
									'class' => 'popover-remote',
									'data-remote' => $this->Html->url([
										'admin' => false,
										'controller' => 'contacts',
										'action' => 'popover_view',
										$opportunity['Contact']['id'],
									]),
								]); ?>
						</td>
						<td>
							<?php echo $this->Html->link($opportunity['Campaign']['campaign'],
								['controller' => 'campaigns', 'action' => 'view', $opportunity['Campaign']['id']]); ?>
						</td>
						<td>
							<?php echo $this->Html->link($opportunity['Channel']['channel'],
								['controller' => 'channels', 'action' => 'view', $opportunity['Channel']['id']]); ?>
						</td>
						<td class="text-nowrap">
							<?php echo $this->Element->btnLinkView($opportunity['Opportunity']['id']); ?>
							<?php echo $this->Element->btnLinkEdit($opportunity['Opportunity']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
