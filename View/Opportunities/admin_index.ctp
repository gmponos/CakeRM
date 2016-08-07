<?php $this->Html->addCrumb($this->Html->link(__('Opportunities'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-thumbs-o-up fa-fw']])); ?>
	<div class="toolbar toolbar-default">
		<?= $this->Element->btnToolbarAdd(); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped table-limited small">
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('created'); ?></th>
					<th><?= $this->Paginator->sort('responsible_user_id', __('Responsible')); ?></th>
					<th><?= $this->Paginator->sort('OpportunityStatus.status', __('Status')); ?></th>
					<th><?= $this->Paginator->sort('description'); ?></th>
					<th></th>
					<th><?= $this->Paginator->sort('business_id'); ?></th>
					<th><?= $this->Paginator->sort('contact_id'); ?></th>
					<th><?= $this->Paginator->sort('campaign_id'); ?></th>
					<th><?= $this->Paginator->sort('channel_id'); ?></th>
					<th><?= __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($opportunities as $opportunity) : ?>
					<tr>
						<td class="text-muted">
							<time><?= h($opportunity['Opportunity']['date_created']); ?></time>
						</td>
						<td>
							<?= $this->Html->link($opportunity['ResponsibleUser']['lastname'],
								['controller' => 'user', 'action' => 'view', $opportunity['ResponsibleUser']['id']]); ?>
						</td>
						<td>
							<?= $this->Html->link($opportunity['OpportunityStatus']['status'], [
								'controller' => 'opportunity_statuses',
								'action' => 'view',
								$opportunity['OpportunityStatus']['id'],
							]); ?>
						</td>
						<td><?= $this->Text->autoParagraph($opportunity['Opportunity']['description']); ?>&nbsp;</td>
						<td class="text-nowrap">
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
							<?php
							echo $this->Html->link($opportunity['Contact']['fullname'],
								['controller' => 'contacts', 'action' => 'view', $opportunity['Contact']['id']], [
									'class' => 'popover-remote',
									'data-remote' => $this->Html->url([
										'admin' => false,
										'controller' => 'contacts',
										'action' => 'popover_view',
										$opportunity['Contact']['id'],
									]),
								]);
							?>
						</td>
						<td>
							<?= $this->Html->link($opportunity['Campaign']['campaign'], [
								'controller' => 'campaigns',
								'action' => 'view',
								$opportunity['Campaign']['id'],
							]); ?>
						</td>
						<td>
							<?= $this->Html->link($opportunity['Channel']['channel'], [
								'controller' => 'channels',
								'action' => 'view',
								$opportunity['Channel']['id'],
							]); ?>
						</td>
						<td class="text-nowrap">
							<?= $this->Element->btnLinkView($opportunity['Opportunity']['id']); ?>
							<?= $this->Element->btnLinkEdit($opportunity['Opportunity']['id']); ?>
							<?= $this->Element->btnLinkMail($opportunity['Opportunity']['id']); ?>
							<?= $this->Element->btnLinkDelete($opportunity['Opportunity']['id']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
