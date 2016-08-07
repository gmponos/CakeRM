<?php $this->Html->addCrumb($this->Html->link(__('Contacts'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-book fa-fw']])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($contact['Contact']['id']); ?>
<div class="toolbar toolbar-default">
	<?php echo $this->Element->btnToolbarReturn(); ?>
	<?php echo $this->Element->btnToolbarAdd(); ?>
	<?php echo $this->Element->btnToolbarEdit($contact['Contact']['id']); ?>
</div>
<dl class="dl-table">
	<dt><?php echo __('Lastname'); ?></dt>
	<dd>
		<?php echo h($contact['Contact']['lastname']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Firstname'); ?></dt>
	<dd>
		<?php echo h($contact['Contact']['firstname']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Contact Type'); ?></dt>
	<dd>
		<?php echo $this->Html->link($contact['ContactType']['type'],
			['controller' => 'contact_types', 'action' => 'view', $contact['ContactType']['id']]); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Phone'); ?></dt>
	<dd>
		<?php echo h($contact['Contact']['phone']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Cellphone'); ?></dt>
	<dd>
		<?php echo h($contact['Contact']['cellphone']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Email'); ?></dt>
	<dd>
		<?php echo $this->Text->autoLinkEmails($contact['Contact']['email']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('State'); ?></dt>
	<dd>
		<?php echo $this->Html->link($contact['State']['name'],
			['controller' => 'states', 'action' => 'view', $contact['State']['id']]); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('City'); ?></dt>
	<dd>
		<?php echo $this->Html->link($contact['City']['name'],
			['controller' => 'cities', 'action' => 'view', $contact['City']['id']]); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Comments'); ?></dt>
	<dd>
		<?php echo h($contact['Contact']['comments']); ?>
		&nbsp;
	</dd>
</dl>
<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link(__('Tasks'), '#related-tasks',
			["data-toggle" => "tab"]) ?></li>
	<li><?php echo $this->Html->link(__('Business'), '#related-businesses', ["data-toggle" => "tab"]) ?></li>
</ul>
<div class="tab-content">
	<div id="related-tasks" class="tab-pane active">
		<?php echo $this->requestAction([
			'controller' => 'tasks',
			'action' => 'related',
			'contact_id' => $contact['Contact']['id'],
		], ['return']); ?>
	</div>
	<div id="related-businesses" class="tab-pane">
		<div class="table-responsive">
			<table class="table table-hover table-striped small">
				<tr>
					<th><?php echo __('Business'); ?></th>
					<th><?php echo __('Firm'); ?></th>
					<th><?php echo __('Phones'); ?></th>
					<th><?php echo __('State'); ?></th>
					<th><?php echo __('City'); ?></th>
					<th><?php echo __('Afm'); ?></th>
					<th><?php echo __('Business Type'); ?></th>
					<th><?php echo __('Doy'); ?></th>
					<th><?php echo __('Actions'); ?></th>
				</tr>
				<?php if (!empty($contact['Business'])) : ?>
					<?php foreach ($contact['Business'] as $business) : ?>
						<tr>
							<td><?php echo $business['business']; ?>&nbsp;</td>
							<td><?php echo $business['firm']; ?>&nbsp;</td>
							<td><?php echo $business['phones']; ?>&nbsp;</td>
							<td><?php echo (empty($business['State']['name']) ? '' : $business['State']['name']); ?></td>
							<td><?php echo (empty($business['City']['name']) ? '' : $business['City']['name']); ?></td>
							<td><?php echo $business['afm']; ?>&nbsp;</td>
							<td><?php echo (empty($business['BusinessType']['type']) ? '' : $business['BusinessType']['type']); ?></td>
							<td><?php echo (empty($business['Taxoffice']['name']) ? '' : $business['Taxoffice']['name']); ?></td>
							<td class="text-nowrap">
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
								<?= $this->Element->btnLinkMail([
									'controller' => 'contacts',
									'action' => 'mail',
									$business['id'],
								]); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</table>
		</div>
	</div>
</div>