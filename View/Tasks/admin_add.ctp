<?php $this->Html->addCrumb($this->Html->link(__('Tasks'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-tasks fa-fw']])); ?>
<?php $this->Html->addCrumb(__('Create')); ?>
<?= $this->Form->create('Task'); ?>
	<ul class="nav nav-tabs" role="tablist">
		<?= $this->Html->tab(__('Task'), '#task', ['li' => ['class' => 'active']]); ?>
		<?= $this->Html->tab(__('Properties'), '#properties'); ?>
		<?= $this->Html->tab(__('Dates'), '#dates'); ?>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="task">
			<div class="row">
				<div class="col-lg-7">
					<div class="form-group">
						<?= $this->Form->label('business_id', __('Business')) ?>
						<div class="input-group">
							<?= $this->Form->chosen('business_id', [
								'data-toggle' => 'BusinessContact',
								'data-operate' => '#TaskContactId',
								'data-remote' => $this->Html->url([
									'admin' => false,
									'controller' => 'contacts',
									'action' => 'viewByBusinessIdForSelect',
								]),
								'data-reset' => $this->Html->url([
									'admin' => false,
									'controller' => 'businesses',
									'action' => 'viewByContactIdForSelect',
								]),
								'div' => false,
								'label' => false,
							]); ?>
							<div class="input-group-btn">
								<?= $this->Html->link('',
									['admin' => false, 'controller' => 'businesses', 'action' => 'viewLatestInfo'], [
										'class' => 'btn btn-primary btn-modal-update',
										'data-update' => '#TaskBusinessId',
										'icon' => 'info',
									]); ?>
								<?= $this->Html->link('',
									['modal' => true, 'controller' => 'businesses', 'action' => 'edit'], [
										'class' => 'btn btn-primary btn-modal-update',
										'data-update' => '#TaskBusinessId',
										'icon' => 'phone',
									]); ?>
								<?= $this->Html->button('', [
									'class' => 'btn btn-primary',
									'data-toggle' => 'modal',
									'data-target' => '#business-add-modal',
									'icon' => 'plus',
								]); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="form-group">
						<?= $this->Form->label('contact_id', __('Contact')) ?>
						<div class="input-group">
							<?= $this->Form->chosen('contact_id', [
								'data-toggle' => 'BusinessContact',
								'data-operate' => '#TaskBusinessId',
								'data-remote' => $this->Html->url([
									'admin' => false,
									'controller' => 'businesses',
									'action' => 'viewByContactIdForSelect',
								]),
								'data-reset' => $this->Html->url([
									'admin' => false,
									'controller' => 'contacts',
									'action' => 'viewByBusinessIdForSelect',
								]),
								'div' => false,
								'label' => false,
							]); ?>
							<div class="input-group-btn">
								<?= $this->Html->link('',
									['modal' => true, 'controller' => 'contacts', 'action' => 'edit'], [
										'class' => 'btn btn-primary btn-modal-update',
										'data-update' => '#TaskContactId',
										'icon' => 'phone',
									]); ?>
								<?= $this->Html->button('', [
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
			<?= $this->Form->input('description', ['rows' => '7', 'placeholder' => false]); ?>
		</div>
		<div class="tab-pane" id="properties">
			<div class="row">
				<div class="col-sm-6">
					<?= $this->Form->chosen('responsible_user_id', [
						'selected' => $this->Session->read('Auth.User.id'),
						'label' => __('Responsible to complete from'),
					]); ?>
				</div>
				<div class="col-sm-6">
					<?= $this->Form->chosen('task_type_id',
						['label' => __('Type'), 'selected' => 4, 'empty' => false]); ?>
					<?= $this->Form->chosen('task_status_id',
						['label' => __('Status'), 'selected' => 1, 'empty' => false]); ?>
					<?= $this->Form->chosen('task_priority_id', ['label' => __('Priority')]); ?>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="dates">
			<div class="row">
				<div class="col-sm-6">
					<?= $this->Form->datepicker('target',
						['placeholder' => '0000-00-00', 'label' => __('Target')]); ?>
					<?= $this->Form->datepicker('completed',
						['placeholder' => '0000-00-00', 'label' => __('Completed')]); ?>
					<?= $this->Form->input('duration', ['placeholder' => '00:00']); ?>
				</div>
				<div class="col-md-6">
					<?= $this->Form->datepicker('date_created',
						['placeholder' => '0000-00-00', 'label' => __('Created')]); ?>
					<?= $this->Form->datepicker('date_updated',
						['placeholder' => '0000-00-00', 'label' => __('Updated')]); ?>
				</div>
			</div>
		</div>
	</div>
<?= $this->element('forms/buttons-bottom'); ?>
<?= $this->Form->end(); ?>
<?php
echo $this->element('modals/businesses/business-add', [
		'action' => [
			'admin' => false,
			'controller' => 'businesses',
			'action' => 'addForSelect',
		],
		'update' => 'select#TaskBusinessId, select#BusinessBusiness',
	]
);
echo $this->element('modals/contacts/contact-add', [
		'action' => [
			'admin' => false,
			'controller' => 'contacts',
			'action' => 'addForSelect',
		],
		'update' => 'select#TaskContactId, select#ContactContact',
	]
);
echo $this->element('modals/businessTypes/business-type-add', [
		'action' => [
			'admin' => false,
			'controller' => 'business_types',
			'action' => 'addForSelect',
		],
		'update' => '#BusinessBusinessTypeId',
	]
);
echo $this->element('modals/cities/city-add', [
		'action' => [
			'admin' => false,
			'action' => 'addForSelect',
			'controller' => 'cities',
		],
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
echo $this->Html->script('BusinessContacts');
