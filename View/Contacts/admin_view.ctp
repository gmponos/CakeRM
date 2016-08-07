<?php $this->Html->addCrumb($this->Html->link(__('Contacts'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-book fa-fw']])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($contact['Contact']['id']); ?>
<nav class="toolbar toolbar-default" role="navigation">
	<?= $this->Element->btnToolbarReturn(); ?>
	<?= $this->Element->btnToolbarAdd(); ?>
	<?= $this->Element->btnLinkEdit($contact['Contact']['id'], __('Edit'), ['class' => "btn btn-success btn-sm"]); ?>
	<?= $this->Element->btnLinkDelete($contact['Contact']['id'], __('Delete'),
		['class' => "btn btn-danger btn-sm"]); ?>
</nav>
<?= $this->Html->pageHeader($contact['Contact']['fullname'], 'h4'); ?>
<div class="row">
	<div class="col-lg-5">
		<dl class="dl-table">
			<dt><?= __('Lastname'); ?></dt>
			<dd>
				<?= h($contact['Contact']['lastname']); ?>
				&nbsp;
			</dd>
			<dt><?= __('Firstname'); ?></dt>
			<dd>
				<?= h($contact['Contact']['firstname']); ?>
				&nbsp;
			</dd>
			<dt><?= __('Contact Type'); ?></dt>
			<dd>
				<?= $this->Html->link($contact['ContactType']['type'],
					['controller' => 'contact_types', 'action' => 'view', $contact['ContactType']['id']]); ?>
				&nbsp;
			</dd>
			<dt><?= __('Phone'); ?></dt>
			<dd>
				<?= h($contact['Contact']['phone']); ?>
				&nbsp;
			</dd>
			<dt><?= __('Cellphone'); ?></dt>
			<dd>
				<?= h($contact['Contact']['cellphone']); ?>
				&nbsp;
			</dd>
			<dt><?= __('Email'); ?></dt>
			<dd>
				<?= $this->Text->autoLinkEmails($contact['Contact']['email']); ?>
				&nbsp;
			</dd>
			<dt><?= __('State'); ?></dt>
			<dd>
				<?= $this->Html->link($contact['State']['name'],
					['controller' => 'states', 'action' => 'view', $contact['State']['id']]); ?>
				&nbsp;
			</dd>
			<dt><?= __('City'); ?></dt>
			<dd>
				<?= $this->Html->link($contact['City']['name'],
					['controller' => 'cities', 'action' => 'view', $contact['City']['id']]); ?>
				&nbsp;
			</dd>
			<dt><?= __('Comments'); ?></dt>
			<dd>
				<?= h($contact['Contact']['comments']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
</div>
<ul class="nav nav-tabs">
	<li class="active"><?= $this->Html->link(__('Tasks'), '#related-tasks', ["data-toggle" => "tab"]) ?></li>
	<li><?= $this->Html->link(__('Business'), '#related-businesses', ["data-toggle" => "tab"]) ?></li>
</ul>
<div class="tab-content">
	<div id="related-tasks" class="tab-pane active">
		<?= $this->requestAction([
			'controller' => 'tasks',
			'action' => 'related',
			'contact_id' => $contact['Contact']['id'],
		], ['return']); ?>
	</div>
	<div id="related-businesses" class="tab-pane">
		<div class="table-responsive">
			<table class="table table-hover table-striped small">
				<thead>
					<tr>
						<th><?= __('Business'); ?></th>
						<th><?= __('Firm'); ?></th>
						<th><?= __('Phone one'); ?></th>
						<th><?= __('Phone two'); ?></th>
						<th><?= __('State'); ?></th>
						<th><?= __('City'); ?></th>
						<th><?= __('Afm'); ?></th>
						<th><?= __('Business Type'); ?></th>
						<th><?= __('Doy'); ?></th>
						<th><?= __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($contact['Business'])) : ?>
						<?php foreach ($contact['Business'] as $business) : ?>
							<tr>
								<td><?= $business['business']; ?>&nbsp;</td>
								<td><?= $business['firm']; ?>&nbsp;</td>
								<td><?= $business['phone_one']; ?>&nbsp;</td>
								<td><?= $business['phone_two']; ?>&nbsp;</td>
								<td><?php echo (empty($business['State']['name']) ? '' : $business['State']['name']); ?></td>
								<td><?php echo (empty($business['City']['name']) ? '' : $business['City']['name']); ?></td>
								<td><?= $business['afm']; ?>&nbsp;</td>
								<td><?php echo (empty($business['BusinessType']['type']) ? '' : $business['BusinessType']['type']); ?></td>
								<td><?php echo (empty($business['Taxoffice']['name']) ? '' : $business['Taxoffice']['name']); ?></td>
								<td class="actions">
									<?= $this->Element->btnLinkView([
										'controller' => 'contacts',
										'action' => 'view',
										$business['id'],
									]); ?>
									<?= $this->Element->btnLinkEdit([
										'controller' => 'contacts',
										'action' => 'edit',
										$business['id'],
									]); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
