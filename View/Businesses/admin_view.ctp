<?php $this->Html->addCrumb($this->Html->link(__('Businesses'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-building-o fa-fw']])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($business['Business']['id']); ?>
<div class="row">
	<div class="col-sm-2">
		<div class="list-group">
			<?php echo $this->Element->listItemLinkReturn(); ?>
			<?php echo $this->Element->listItemLinkAdd(); ?>
			<?php echo $this->Element->listItemLinkEdit($business['Business']['id']); ?>
			<?php echo $this->Element->listItemLinkDelete($business['Business']['id']); ?>
		</div>
	</div>
	<div class="col-sm-10">
		<p class="lead"><?php echo h($business['Business']['fullname']) ?></p>

		<div class="row">
			<div class="col-sm-6">
				<h5><?php echo __('Communication info') ?></h5>
				<dl class="dl-table">
					<dt><?php echo __('Phones'); ?></dt>
					<dd>
						<?php echo h($business['Business']['phones']); ?>&nbsp;
					</dd>
					<dt><?php echo __('Email'); ?></dt>
					<dd>
						<?php echo h($business['Business']['email']); ?>&nbsp;
					</dd>
					<dt><?php echo __('Website'); ?></dt>
					<dd>
						<?php echo h($business['Business']['website']); ?>&nbsp;
					</dd>
				</dl>
				<h5><?php echo __('Logistics') ?></h5>
				<dl class="dl-table">
					<dt><?php echo __('Business Type'); ?></dt>
					<dd>
						<?php echo $this->Html->link($business['BusinessType']['type'],
							['controller' => 'business_types', 'action' => 'view', $business['BusinessType']['id']]); ?>
						&nbsp;
					</dd>
					<dt><?php echo __('Afm'); ?></dt>
					<dd>
						<?php echo h($business['Business']['afm']); ?>&nbsp;
					</dd>
					<dt><?php echo __('Taxoffice'); ?></dt>
					<dd>
						<?php echo $this->Html->link($business['Taxoffice']['name'],
							['controller' => 'taxoffices', 'action' => 'view', $business['Taxoffice']['id']]); ?>&nbsp;
					</dd>
				</dl>
			</div>
			<div class="col-sm-6">
				<h5><?php echo __('Address') ?></h5>
				<dl class="dl-table">
					<dt><?php echo __('State'); ?></dt>
					<dd>
						<?php echo $this->Html->link($business['State']['name'],
							['controller' => 'states', 'action' => 'view', $business['State']['id']]); ?> &nbsp;
					</dd>
					<dt><?php echo __('City'); ?></dt>
					<dd>
						<?php echo $this->Html->link($business['City']['name'],
							['controller' => 'cities', 'action' => 'view', $business['City']['id']]); ?> &nbsp;
					</dd>
					<dt><?php echo __('Address'); ?></dt>
					<dd>
						<?php echo h($business['Business']['address']); ?>&nbsp;
					</dd>
					<dt><?php echo __('Tk'); ?></dt>
					<dd>
						<?php echo h($business['Business']['tk']); ?>&nbsp;
					</dd>
				</dl>
			</div>
			<?php if (!empty($business['Business']['address'])) : ?>
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<?= $this->CakeMap->map([
								'id' => 'business_' . $business['Business']['id'],
								'width' => '100%',
								'height' => '300px',
								'localize' => false,
								'longitude' => null,
								'latitude' => null,
								'address' => $business['Business']['address'] . ' ' . $business['City']['name'],
								'markerTitle' => $business['Business']['address'],
								'windowText' => $business['Business']['address'],
							]);
							?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active"><?php echo $this->Html->link(__('Tasks'),
					['controller' => 'tasks', 'action' => 'related', 'business_id' => $business['Business']['id']],
					["data-toggle" => "tab", 'data-target' => '#tab-tasks-related']) ?></li>
			<li><?php echo $this->Html->link(__('Contacts'), '#tab-contacts-related', ["data-toggle" => "tab"]) ?></li>
			<li><?php echo $this->Html->link(__('Comments'), '#tab-comments', ["data-toggle" => "tab"]) ?></li>
		</ul>
		<div class="tab-content">
			<div id="tab-tasks-related" class="tab-pane active"></div>
			<div id="tab-contacts-related" class="tab-pane">
				<div class="panel panel-default">
					<div class="panel-heading">
						<?php echo $this->Html->link('', ['controller' => 'contacts', 'action' => 'add'],
							['class' => 'btn btn-success btn-xs', 'icon' => 'plus']); ?>
					</div>
					<div class="table-responsive">
						<table class="table table-thin table-hover table-striped small">
							<tr>
								<th><?php echo __('Fullname'); ?></th>
								<th><?php echo __('State'); ?></th>
								<th><?php echo __('City'); ?></th>
								<th><?php echo __('Phone'); ?></th>
								<th><?php echo __('Cellphone'); ?></th>
								<th><?php echo __('Email'); ?></th>
								<th><?php echo __('Contact Type'); ?></th>
								<th><?php echo __('Actions'); ?></th>
							</tr>
							<?php if (!empty($business['Contact'])) : ?>
								<?php foreach ($business['Contact'] as $contact) : ?>
									<tr>
										<td><?php echo $contact['fullname']; ?></td>
										<td><?php echo (empty($contact['State']['name']) ? '' : $contact['State']['name']); ?></td>
										<td><?php echo (empty($contact['City']['name']) ? '' : $contact['City']['name']); ?></td>
										<td><?php echo $contact['phone']; ?></td>
										<td><?php echo $contact['cellphone']; ?></td>
										<td><?php echo $this->Text->autoLinkEmails($contact['email']); ?></td>
										<td><?php echo (empty($contact['ContactType']['type']) ? '' : $contact['ContactType']['type']); ?></td>
										<td>
											<?php echo $this->Element->btnLinkView([
												'controller' => 'contacts',
												'action' => 'view',
												$contact['id'],
											]); ?>
											<?php echo $this->Element->btnLinkEdit([
												'controller' => 'contacts',
												'action' => 'edit',
												$contact['id'],
											]); ?>
											<?php echo $this->Element->btnLinkMail([
												'controller' => 'contacts',
												'action' => 'mail',
												$contact['id'],
											]); ?>
											<?php echo $this->Element->btnLinkDelete([
												'controller' => 'contacts',
												'action' => 'delete',
												$contact['id'],
											]); ?>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</table>
					</div>
				</div>
			</div>
			<div id="tab-comments" class="tab-pane">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="well">
							<?php echo h($business['Business']['comments']); ?>&nbsp;
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
