<?php $this->Html->addCrumb($this->Html->link(__('Repairs'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-gavel fa-fw']])); ?>
<?php $this->Html->addCrumb(__('Create')); ?>
<?php echo $this->Form->create('Repair'); ?>
<?php echo $this->Form->input('id'); ?>
	<ul class="nav nav-tabs" role="tablist">
		<li class="active"><?php echo $this->Html->link(__('Repair'), '#repair',
				["data-toggle" => 'tab', 'role' => 'tab']); ?></li>
		<li><?php echo $this->Html->link(__('Details'), '#details', ["data-toggle" => 'tab', 'role' => 'tab']); ?></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="repair">
			<div class="row">
				<div class="col-lg-7">
					<div class="form-group">
						<?php echo $this->Form->label('business_id', __('Business')) ?>
						<div class="input-group">
							<?php echo $this->Form->chosen('business_id', [
								'data-toggle' => 'operate',
								'data-operate' => '#RepairContactId',
								'data-remote' => $this->Html->url([
									'admin' => false,
									'controller' => 'contacts',
									'action' => 'viewByBusinessIdForSelect',
								]),
								'div' => false,
								'label' => false,
							]); ?>
							<div class="input-group-btn">
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
				<div class="col-lg-5">
					<div class="form-group">
						<?php echo $this->Form->label('contact_id', __('Contact')) ?>
						<div class="input-group">
							<?php echo $this->Form->chosen('contact_id', ['div' => false, 'label' => false]); ?>
							<div class="input-group-btn">
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
			<?php echo $this->Form->input('description', ['rows' => '7', 'placeholder' => false]); ?>
		</div>
		<div class="tab-pane" id="details">
			<div class="row">
				<div class="col-md-5">
					<?php echo $this->Form->datepicker('date_received'); ?>
					<?php echo $this->Form->datepicker('date_repaired'); ?>
					<?php echo $this->Form->datepicker('date_sent'); ?>
				</div>
				<div class="col-md-4">
					<?php echo $this->Form->chosen('repaired_user_id',
						['selected' => $this->Session->read('Auth.User.id')]); ?>
				</div>
				<div class="col-md-3">
					<?php echo $this->Form->input('price'); ?>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->element('forms/buttons-bottom'); ?>
<?php echo $this->Form->end();
