<?php $this->Html->addCrumb($this->Html->link(__('Businesses'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-building-o fa-fw']])); ?>
<?php $this->Html->addCrumb(__('Create')); ?>
<?= $this->Form->create('Business'); ?>
	<ul class="nav nav-pills" role="tablist">
		<li class="active"><?= $this->Html->link(__('General'), '#general',
				["data-toggle" => 'tab', 'role' => 'tab']); ?></li>
		<?= $this->Html->tab(__('Communication'), '#communication'); ?>
		<?= $this->Html->tab(__('Logistics'), '#logistics'); ?>
		<?= $this->Html->tab(__('Misc.'), '#misc'); ?>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="general">
			<div class="row">
				<div class="col-md-12 col-lg-8">
					<?= $this->Form->input('business', ['type' => 'text']) ?>
					<?= $this->Form->input('firm', ['type' => 'text']) ?>
					<div class="form-group">
						<?= $this->Form->label('Contact', __('Contact')) ?>
						<div class="input-group">
							<?= $this->Form->chosen('Contact', [
								'empty' => true,
								'div' => false,
								'label' => false,
							]); ?>
							<div class="input-group-btn">
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
		</div>
		<div class="tab-pane" id="logistics">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<?= $this->Form->label('business_type_id', __('Business Type')) ?>
						<div class="input-group">
							<?= $this->Form->chosen('business_type_id',
								['empty' => true, 'selected' => false, 'label' => false, 'div' => false]); ?>
							<div class="input-group-btn">
								<?= $this->Html->button('', [
									'class' => 'btn btn-primary',
									'data-toggle' => 'modal',
									'data-target' => '#business-type-add-modal',
									'icon' => 'plus',
								]); ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<?= $this->Form->label('taxoffice_id', __('Taxoffice')) ?>
						<div class="input-group">
							<?= $this->Form->chosen('taxoffice_id',
								['empty' => true, 'selected' => false, 'label' => false, 'div' => false]); ?>
							<div class="input-group-btn">
								<?= $this->Html->button('', [
									'class' => 'btn btn-primary',
									'data-toggle' => 'modal',
									'data-target' => '#taxoffice-add-modal',
									'icon' => 'plus',
								]); ?>
							</div>
						</div>
					</div>
					<?= $this->Form->input('afm'); ?>
				</div>
				<div class="col-lg-6">
					<?= $this->Form->chosen('bank_account_id'); ?>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="communication">
			<div class="row">
				<div class="col-md-6">
					<?= $this->Form->chosen('state_id', [
						'selected' => false,
						'empty' => true,
						'data-toggle' => 'operate',
						'data-operate' => '#BusinessCityId',
						'data-remote' => $this->Html->url([
							'controller' => 'cities',
							'action' => 'viewByStateIdForSelect',
						]),
					]); ?>
					<div class="form-group">
						<?= $this->Form->label('city_id', __('City')) ?>
						<div class="input-group">
							<?= $this->Form->chosen('city_id', [
								'empty' => true,
								'selected' => false,
								'label' => false,
								'div' => false,
							]); ?>
							<div class="input-group-btn">
								<?= $this->Html->button('', [
									'class' => 'btn btn-primary',
									'data-toggle' => 'modal',
									'data-target' => '#city-add-modal',
									'icon' => 'plus',
								]); ?>
							</div>
						</div>
					</div>
					<?= $this->Form->input('address'); ?>
					<?= $this->Form->input('tk', []); ?>
				</div>
				<div class="col-md-6">
					<?= $this->Form->input('phone_one', ['placeholder' => __('Phone')]) ?>
					<?= $this->Form->input('phone_two', ['placeholder' => __('Phone')]) ?>
					<?= $this->Form->input('fax') ?>
					<?= $this->Form->input('email'); ?>
					<?= $this->Form->input('website', ['placeholder' => 'www.example.com']); ?>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="misc">
			<?= $this->Form->input('comments', ['rows' => '7', 'placeholder' => '']); ?>
		</div>
	</div>
<?= $this->element('forms/buttons-bottom'); ?>
<?= $this->Form->end(); ?>

	<div id="contact-add-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<?= $this->Html->modalHeader(__('Create New Contact')); ?>
				<div class="modal-body">
					<?= $this->Form->create('Contact', [
						'url' => ['admin' => false, 'action' => 'addForSelect'],
						'data-toggle' => 'modal-form',
						'data-update' => 'select#ContactContact',
						'data-hide' => '#contact-add-modal',
					]) ?>
					<div class="row">
						<div class="col-sm-6">
							<?= $this->Form->input('lastname'); ?>
						</div>
						<div class="col-sm-6">
							<?= $this->Form->input('firstname'); ?>
						</div>
						<div class="col-sm-6">
							<?= $this->Form->chosen('department_id', ['empty' => true, 'selected' => false]); ?>
						</div>
						<div class="col-sm-6">
							<?= $this->Form->chosen('contact_type_id',
								['empty' => true, 'selected' => false]); ?>
						</div>
						<div class="col-sm-4">
							<?= $this->Form->input('phone') ?>
							<?= $this->Form->input('cellphone') ?>
						</div>
						<div class="col-sm-8">
							<?= $this->Form->input('email') ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<?= $this->Form->chosen('state_id', [
								'empty' => true,
								'selected' => false,
								'data-toggle' => 'operate',
								'data-operate' => '#ContactCityId',
								'data-remote' => $this->Html->url([
									'controller' => 'cities',
									'action' => 'viewByStateIdForSelect',
								]),
							]); ?>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<?= $this->Form->label('city_id', __('City')) ?>
								<div class="input-group">
									<?= $this->Form->chosen('city_id',
										['empty' => true, 'selected' => false, 'label' => false, 'div' => false]); ?>
									<div class="input-group-btn">
										<?= $this->Html->button('', [
											'class' => 'btn btn-primary',
											'data-toggle' => 'modal',
											'data-target' => '#city-add-modal',
											'icon' => 'plus',
										]); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?= $this->Form->input('comments', ['rows' => '5', 'label' => false]); ?>
				</div>
				<div class="modal-footer">
					<?= $this->Form->btnSubmit(); ?>
					<?= $this->Form->btnReset(); ?>
					<?= $this->Form->btnCancel(); ?>
					<?= $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
<?php
echo $this->element('modals/businessTypes/business-type-add', [
	'action' => [
		'admin' => false,
		'controller' => 'business_types',
		'action' => 'addForSelect',
	],
	'update' => '#BusinessBusinessTypeId',
]);
echo $this->element('modals/cities/city-add', [
	'action' => [
		'admin' => false,
		'controller' => 'cities',
		'action' => 'addForSelect',
	],
	'update' => '#BusinessCityId, #ContactCityId',
]);
echo $this->element('modals/taxoffices/taxoffice-add', [
	'action' => [
		'admin' => false,
		'controller' => 'taxoffices',
		'action' => 'addForSelect',
	],
	'update' => '#BusinessTaxofficeId',
]);
