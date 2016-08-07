<?php $this->Html->addCrumb($this->Html->link(__('Opportunities'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-tasks fa-fw']])); ?>
<?php echo $this->Form->create('Opportunity'); ?>
	<ul class="nav nav-tabs" role="tablist">
		<?= $this->Html->tab(__('General'), '#general', ['li' => ['class' => 'active']]); ?>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="general">
			<div class="row">
				<div class="col-sm-7">
					<div class="form-group">
						<?php echo $this->Form->label('business_id') ?>
						<div class="input-group">
							<?php echo $this->Form->chosen('business_id', [
								'data-toggle' => 'operate',
								'data-operate' => '#OpportunityContactId',
								'data-remote' => $this->Html->url([
									'admin' => false,
									'controller' => 'contacts',
									'action' => 'viewByBusinessIdForSelect',
								]),
								'div' => false,
								'label' => false,
							]); ?>
							<div class="input-group-btn">
								<?php echo $this->Html->link('',
									['admin' => false, 'action' => 'modalEditBusiness'], [
										'class' => 'btn btn-primary btn-modal-update',
										'data-update' => '#OpportunityBusinessId',
										'icon' => 'phone',
									]); ?>
								<?php echo $this->Html->button('', [
									'class' => 'btn btn-primary',
									'data-toggle' => 'modal',
									'data-target' => '#business-add-modal',
									'icon' => 'plus',
								]); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="form-group">
						<?php echo $this->Form->label('contact_id') ?>
						<div class="input-group">
							<?php echo $this->Form->chosen('contact_id', ['div' => false, 'label' => false]); ?>
							<div class="input-group-btn">
								<?php echo $this->Html->link('',
									['admin' => false, 'action' => 'modalEditContact'], [
										'class' => 'btn btn-primary btn-modal-update',
										'data-update' => '#OpportunityContactId',
										'icon' => 'phone',
									]); ?>
								<?php echo $this->Html->button('', [
									'class' => 'btn btn-primary',
									'data-toggle' => 'modal',
									'data-target' => '#contact-add-modal',
									'icon' => 'plus',
								]); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php echo $this->Form->input('description', ['rows' => '5', 'placeholder' => false]); ?>
			<div class="row">
				<div class="col-sm-6">
					<?php echo $this->Form->chosen('responsible_user_id',
						['empty' => false, 'selected' => $this->Session->read('Auth.User.id')]); ?>
				</div>
				<div class="col-sm-4">
					<?php echo $this->Form->chosen('status_id', ['empty' => false]); ?>
					<?php echo $this->Form->chosen('campaign_id'); ?>
					<?php echo $this->Form->chosen('channel_id', ['empty' => false]); ?>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->element('forms/buttons-bottom'); ?>
<?php echo $this->Form->end(); ?>
<?php
echo $this->element('modals/businesses/business-add', [
		'action' => [
			'admin' => false,
			'controller' => 'businesses',
			'action' => 'addForSelect',
		],
		'update' => 'select#OpportunityBusinessId, select#BusinessBusiness',
	]
);
echo $this->element('modals/contacts/contact-add', [
		'action' => [
			'admin' => false,
			'controller' => 'contacts',
			'action' => 'addForSelect',
		],
		'update' => 'select#OpportunityContactId, select#ContactContact',
	]
);
echo $this->element('modals/businessTypes/business-type-add', [
	'action' => 'addForSelect',
	'update' => '#BusinessBusinessTypeId',
]);
echo $this->element('modals/cities/city-add', [
		'action' => 'addForSelect',
		'update' => '#BusinessCityId, #ContactCityId',
	]
);
echo $this->element('modals/taxoffices/taxoffice-add', [
		'action' => [
			'admin' => false,
			'action' => 'addForSelect',
			'controller' => 'taxoffices',
		],
		'update' => '#BusinessTaxofficeId',
	]
);