<?php $this->Html->addCrumb($this->Html->link(__('Business'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-tasks fa-fw']]));?>
<?php $this->Html->addCrumb(__('Edit'));?>
<?php $this->Html->addCrumb($this->request->data('Business.id'));?>
<?php echo $this->Form->create('Business');?>
<?php echo $this->Form->input('id')?>
<ul class="nav nav-pills" role="tablist">
	<li class="active"><?php echo $this->Html->link(__('General'), '#business-general', ["data-toggle" => 'tab', 'role' => 'tab']);?></li>
	<li><?php echo $this->Html->link(__('Communication'), '#communication', ["data-toggle" => 'tab', 'role' => 'tab']);?></li>
	<li><?php echo $this->Html->link(__('Logistics'), '#logistics', ["data-toggle" => 'tab', 'role' => 'tab']);?></li>
	<li><?php echo $this->Html->link(__('Misc.'), '#misc', ["data-toggle" => 'tab', 'role' => 'tab']);?></li>
</ul>
<div class="tab-content">
	<div class="tab-pane active" id="business-general">
		<div class="row">
			<div class="col-md-8">
				<?php echo $this->Form->input('business', ['type' => 'text'])?>
				<?php echo $this->Form->input('firm', ['type' => 'text'])?>
				<div class="form-group">
					<?php echo $this->Form->label('Contact', __('Contact'), 'control-label')?>
					<div class="input-group">
						<?php echo $this->Form->chosen('Contact', ['empty' => true, 'div' => false, 'label' => false]);?>
						<div class="input-group-btn">
							<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#contact-add-modal', 'icon' => 'plus']);?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="logistics">
		<div class="row">
			<div class="col-md-8 col-lg-6">
				<div class="form-group">
					<?php echo $this->Form->label('business_type_id', __('Business Type'), 'control-label')?>
					<div class="input-group">
						<?php echo $this->Form->chosen('business_type_id', ['empty' => true, 'label' => false, 'div' => false]);?>
						<div class="input-group-btn">
							<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#business-type-add-modal', 'icon' => 'plus']);?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<?php echo $this->Form->label('taxoffice_id', __('Taxoffice'), 'control-label')?>
					<div class="input-group">
						<?php echo $this->Form->chosen('taxoffice_id', ['empty' => true, 'label' => false, 'div' => false]);?>
						<div class="input-group-btn">
							<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#taxoffice-add-modal', 'icon' => 'plus']);?>
						</div>
					</div>
				</div>
				<?php echo $this->Form->input('afm');?>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="communication">
		<div class="row">
			<div class="col-md-6">
				<?php echo $this->Form->chosen('state_id', ['empty' => true, 'data-toggle' => 'operate', 'data-operate' => '#BusinessCityId', 'data-remote' => $this->Html->url(['controller' => 'cities', 'action' => 'viewByStateIdForSelect'])]);?>
				<div class="form-group">
					<?php echo $this->Form->label('city_id', __('City'), 'control-label')?>
					<div class="input-group">
						<?php echo $this->Form->chosen('city_id', ['empty' => true, 'label' => false, 'div' => false]);?>
						<div class="input-group-btn">
							<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#city-add-modal', 'icon' => 'plus']);?>
						</div>
					</div>
				</div>
				<?php echo $this->Form->input('address');?>
				<?php echo $this->Form->input('tk', []);?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('phone_one', ['placeholder' => __('Phone')])?>
				<?php echo $this->Form->input('phone_two', ['placeholder' => __('Phone')])?>
				<?php echo $this->Form->input('fax')?>
				<?php echo $this->Form->input('email');?>
				<?php echo $this->Form->input('website', ['placeholder' => 'www.example.com']);?>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="misc">
		<?php echo $this->Form->input('comments', ['rows' => '7', 'placeholder' => '']);?>
	</div>
</div>
<?php echo $this->element('forms/buttons-bottom');?>
<?php echo $this->Form->end();?>
<div id="contact-add-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><?php echo __('Add Contact');?></h4>
			</div>
			<div class="modal-body">
				<?php echo $this->Form->create('Contact', ['url' => ['admin' => false, 'action' => 'addForSelect'], 'class' => 'modal-form-add', 'data-target' => 'select#TaskContactId, select#ContactContact', 'data-hide' => '#contact-add-modal'])?>
				<div class="row">
					<div class="col-sm-6">
						<?php echo $this->Form->input('lastname');?>
					</div>
					<div class="col-sm-6">
						<?php echo $this->Form->input('firstname');?>
					</div>
					<div class="col-sm-6">
						<?php echo $this->Form->chosen('department_id');?>
					</div>
					<div class="col-sm-6">
						<?php echo $this->Form->chosen('contact_type_id');?>
					</div>
					<div class="col-sm-4">
						<?php echo $this->Form->input('phone')?>
						<?php echo $this->Form->input('cellphone')?>
					</div>
					<div class="col-sm-8">
						<?php echo $this->Form->input('email')?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?php echo $this->Form->chosen('state_id', ['empty' => true, 'data-toggle' => 'operate', 'data-operate' => '#ContactCityId', 'data-remote' => $this->Html->url(['controller' => 'cities', 'action' => 'viewByStateIdForSelect'])]);?>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<?php echo $this->Form->label('city_id', __('City'))?>
							<div class="input-group">
								<?php echo $this->Form->chosen('city_id', ['empty' => true, 'label' => false, 'div' => false]);?>
								<div class="input-group-btn">
									<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#city-add-modal', 'icon' => 'plus']);?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php echo $this->Form->input('comments', ['rows' => '5'])?>
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->btnSubmit();?>
				<?php echo $this->Form->btnReset();?>
				<?php echo $this->Form->btnCancel();?>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>
<?php
echo $this->element('modals/businessTypes/business-type-add', ['action' =>
	['admin' => false, 'controller' => 'business_types', 'action' => 'addForSelect'],
	'update' => '#BusinessBusinessTypeId'
		]
);
echo $this->element('modals/cities/city-add', ['action' =>
	['admin' => false, 'controller' => 'cities', 'action' => 'addForSelect'],
	'update' => '#BusinessCityId, #ContactCityId'
		]
);
echo $this->element('modals/taxoffices/taxoffice-add', ['action' =>
	['admin' => false, 'controller' => 'taxoffices', 'action' => 'addForSelect'],
	'update' => '#BusinessTaxofficeId'
		]
);
