<?php $this->Html->addCrumb($this->Html->link(__('Contacts'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-book fa-fw']]));?>
<?php $this->Html->addCrumb(__('Edit'));?>
<?php $this->Html->addCrumb($this->request->data('Contact.id'));?>
<?php echo $this->Form->create('Contact')?>
<?php echo $this->Form->input('id');?>
<div class="row">
	<div class="col-md-9">
		<ul class="nav nav-tabs" role="tablist">
			<li class="active"><?php echo $this->Html->link(__('Contact'), '#contact', ["data-toggle" => 'tab', 'role' => 'tab']);?></li>
			<li><?php echo $this->Html->link(__('Communication'), '#communication', ["data-toggle" => 'tab', 'role' => 'tab']);?></li>
			<li><?php echo $this->Html->link(__('Details'), '#details', ["data-toggle" => 'tab', 'role' => 'tab']);?></li>
			<li><?php echo $this->Html->link(__('Misc.'), '#misc', ["data-toggle" => 'tab', 'role' => 'tab']);?></li>
		</ul>
		<div class="tab-content box">
			<div class="tab-pane active" id="contact">
				<div class="row">
					<div class="col-sm-6">
						<?php echo $this->Form->input('lastname');?>
					</div>
					<div class="col-sm-6">
						<?php echo $this->Form->input('firstname');?>
					</div>
				</div>
				<div class="form-group">
					<?php echo $this->Form->label('Business', __('Business'))?>
					<div class="input-group">
						<?php echo $this->Form->chosen('Business', ['div' => false, 'label' => false, 'empty' => false]);?>
						<div class="input-group-btn">
							<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#business-add-modal', 'icon' => 'plus']);?>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="communication">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<?php echo $this->Form->input('phone')?>
						<?php echo $this->Form->input('cellphone')?>
						<?php echo $this->Form->input('email')?>
					</div>
					<div class="col-sm-8 col-md-7">
						<?php echo $this->Form->chosen('state_id', ['data-toggle' => 'operate', 'data-operate' => '#ContactCityId', 'data-remote' => $this->Html->url(['controller' => 'cities', 'action' => 'viewByStateIdForSelect'])]);?>
						<div class="form-group">
							<?php echo $this->Form->label('city_id', __('City'))?>
							<div class="input-group">
								<?php echo $this->Form->chosen('city_id', ['label' => false, 'div' => false]);?>
								<div class="input-group-btn">
									<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#city-add-modal', 'icon' => 'plus']);?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="details">
				<div class="row">
					<div class="col-sm-6">
						<?php echo $this->Form->chosen('department_id');?>
						<?php echo $this->Form->chosen('contact_type_id');?>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="misc">
				<?php echo $this->Form->input('comments', ['rows' => '7', 'placeholder' => false]);?>
			</div>
		</div>
	</div>
	<div class="col-md-3 tabs-next">
		<?php echo $this->element('forms/buttons-bottom');?>
	</div>
</div>
<?php echo $this->Form->end()?>


<div id="business-add-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<?php echo $this->Html->modalHeader(__('Create New Business'))?></h4>
			<div class="modal-body">
				<?php echo $this->Form->create('Business', ['url' => ['admin' => false, 'action' => 'add_for_select'], 'class' => 'modal-form-add', 'data-target' => 'select#BusinessBusiness', 'data-hide' => '#business-add-modal']);?>
				<?php echo $this->Form->input('business', ['type' => 'text', 'placeholder' => __('Business')])?>
				<?php echo $this->Form->input('firm')?>
				<ul class="nav nav-tabs">
					<li class="active"><?php echo $this->Html->link(__('Communication'), '#business-communication', ['data-toggle' => 'tab']);?></li>
					<li><?php echo $this->Html->link(__('Logistics'), '#business-logistics', ['data-toggle' => 'tab']);?></li>
					<li><?php echo $this->Html->link(__('Address'), '#business-address', ['data-toggle' => 'tab']);?></li>
					<li><?php echo $this->Html->link(__('Comment'), '#business-comment', ['data-toggle' => 'tab']);?></li>
				</ul>
				<div class="tab-content">
					<div id="business-communication" class="tab-pane active">
						<div class="row">
							<div class="col-sm-4">
								<?php echo $this->Form->input('phone_one', ['placeholder' => __('Phone')])?>
								<?php echo $this->Form->input('phone_two', ['placeholder' => __('Phone')])?>
								<?php echo $this->Form->input('fax')?>
							</div>
							<div class="col-sm-8">
								<?php echo $this->Form->input('email');?>
								<?php echo $this->Form->input('website', ['placeholder' => 'www.example.com']);?>
							</div>
						</div>
					</div>
					<div id="business-logistics" class="tab-pane">
						<div class="form-group">
							<?php echo $this->Form->label('business_type_id')?>
							<div class="input-group">
								<?php echo $this->Form->chosen('business_type_id', ['selected' => false, 'label' => false, 'div' => false]);?>
								<div class="input-group-btn">
									<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#business-type-add-modal', 'icon' => 'plus']);?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<?php echo $this->Form->input('afm');?>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<?php echo $this->Form->label('taxoffice_id')?>
									<div class="input-group">
										<?php echo $this->Form->input('taxoffice_id', ['empty' => true, 'selected' => false, 'class' => 'form-control form-control-chosen', 'label' => false, 'div' => false]);?>
										<div class="input-group-btn">
											<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#taxoffice-add-modal', 'icon' => 'plus']);?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="business-address" class="tab-pane">
						<div class="row">
							<div class="col-sm-6">
								<?php echo $this->Form->chosen('state_id', ['selected' => false, 'data-toggle' => 'operate', 'data-operate' => '#BusinessCityId', 'data-remote' => $this->Html->url(['controller' => 'cities', 'action' => 'viewByStateIdForSelect'])]);?>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<?php echo $this->Form->label('city_id')?>
									<div class="input-group">
										<?php echo $this->Form->chosen('city_id', ['selected' => false, 'label' => false, 'div' => false]);?>
										<div class="input-group-btn">
											<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#city-add-modal', 'icon' => 'plus']);?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-9">
								<?php echo $this->Form->input('address');?>
							</div>
							<div class="col-sm-3">
								<?php echo $this->Form->input('tk', ['placeholder' => __('Postal Code')]);?>
							</div>
						</div>
					</div>
					<div id="business-comment" class="tab-pane">
						<?php echo $this->Form->input('comments', ['rows' => '5']);?>
					</div>
				</div>
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
echo $this->element('modals/businessTypes/business-type-add', [
	'action' => 'addForSelect',
	'target' => '#BusinessBusinessTypeId'
		]
);
echo $this->element('modals/cities/city-add', [
	'action' => 'addForSelect',
	'target' => '#BusinessCityId, #ContactCityId'
		]
);
echo $this->element('modals/taxoffices/taxoffice-add', [
	'action' => 'addForSelect',
	'target' => '#BusinessTaxofficeId'
		]
);
