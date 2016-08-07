<div class="panel panel-default">
	<?php echo $this->Html->panelHeader(__('Create New Offer'));?>
	<div class="panel-body">
		<?php echo $this->Form->create('Offer', ['type' => 'file']);?>
		<div class="row">
			<div class="col-sm-7">
				<div class="form-group">
					<?php echo $this->Form->label('business_id', __('Business'))?>
					<div class="input-group">
						<?php echo $this->Form->input('business_id', ['empty' => true, 'class' => 'form-control form-control-chosen form-control-toggle', 'data-form-toggle' => '#OfferContactId', 'data-remote' => $this->Html->url(['admin' => false, 'controller' => 'contacts', 'action' => 'viewByBusinessIdForSelect']), 'div' => false, 'label' => false]);?>
						<div class="input-group-btn">
							<?php echo $this->Html->link('', ['modal' => true, 'controller' => 'businesses', 'action' => 'edit'], ['class' => 'btn btn-primary btn-modal-update', 'data-update' => '#TaskBusinessId', 'icon' => 'phone']);?>
							<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#business-add-modal', 'icon' => 'plus']);?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="form-group">
					<?php echo $this->Form->label('contact_id', __('Contact'))?>
					<div class="input-group">
						<?php echo $this->Form->input('contact_id', ['empty' => true, 'class' => 'form-control form-control-chosen form-control-remote', 'data-handle' => '#TaskBusinessId', 'data-remote' => '/tasks/viewBusinessByContactIdForSelect', 'data-allow-toggle' => 'true', 'div' => false, 'label' => false]);?>
						<div class="input-group-btn">
							<?php echo $this->Html->link('', ['modal' => true, 'controller' => 'contacts', 'action' => 'edit'], ['class' => 'btn btn-primary btn-modal-update', 'data-update' => '#TaskContactId', 'icon' => 'phone']);?>
							<?php echo $this->Html->button('', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#contact-add-modal', 'icon' => 'plus']);?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $this->Form->input('description', ['rows' => '5', 'placeholder' => __('Description')]);?>
		<div class="row">
			<div class="col-sm-6">
				<?php echo $this->Form->chosen('user_id', ['selected' => $this->Session->read('Auth.User.id'), 'empty' => false]);?>
			</div>
			<div class="col-sm-6">
				<?php echo $this->Form->input('responsible_id', ['selected' => $this->Session->read('Auth.User.id'), 'class' => 'form-control form-control-chosen']);?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php echo $this->Form->chosen('status_id', ['empty' => false]);?>
			</div>
			<div class="col-sm-6">
				<?php echo $this->Form->chosen('OfferType');?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<?php echo $this->Form->datepicker('accepted', ['placeholder' => '0000-00-00']);?>
			</div>
			<div class="col-sm-3">
				<?php echo $this->Form->datepicker('sented', ['placeholder' => '0000-00-00']);?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<?php echo $this->Form->file('file_tmp', ['type' => 'file', 'label' => 'Upload File', 'after'=>__('Please first compress the file to upload it.')]);?>
			</div>
		</div>
		<?php echo $this->Form->btnSubmit();?>
		<?php echo $this->Form->btnReset();?>
		<?php echo $this->Form->end();?>
	</div>
</div>