<div class="panel panel-default">
	<?php echo $this->Html->panelHeader(__('Edit Offer'));?>	
	<div class="panel-body">
		<?php echo $this->Form->create('Offer', ['type' => 'file']);?>
		<?php echo $this->Form->input('id');?>
		<div class="row">
			<div class="col-sm-7">
				<div class="form-group">
					<?php echo $this->Form->label('business_id', __('Business'))?>
					<div class="input-group">
						<?php echo $this->Form->input('business_id', ['empty' => true, 'class' => 'form-control form-control-chosen form-control-toggle', 'data-form-toggle' => '#TaskContactId', 'data-remote' => '/contacts/viewByBusinessIdForSelect', 'div' => false, 'label' => false]);?>
						<div class="input-group-btn">
							<?php echo $this->Html->link('', ['modal' => true, 'controller' => 'businesses', 'action' => 'edit'], ['class' => 'btn btn-primary btn-modal-update', 'data-update' => '#OfferBusinessId', 'icon' => 'phone']);?>
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
							<?php echo $this->Html->link('', ['modal' => true, 'controller' => 'businesses', 'action' => 'edit'], ['class' => 'btn btn-primary btn-modal-update', 'data-update' => '#OfferContactId', 'icon' => 'phone']);?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $this->Form->input('description', ['rows' => '5', 'placeholder' => __('Description')]);?>
		<div class="row">
			<div class="col-sm-6">
				<?php echo $this->Form->chosen('user_id', ['empty' => false]);?>
			</div>
			<div class="col-sm-6">
				<?php echo $this->Form->chosen('responsible_id');?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php echo $this->Form->chosen('status_id');?>
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
				<?php echo $this->Form->input('File.name', ['disabled' => true]);?>
			</div>
			<div class="col-sm-3">
				<?php echo $this->Form->file('File.name', ['type' => 'file', 'label' => 'Upload File']);?>
			</div>
		</div>
		<?php echo $this->Form->btnSubmit();?>
		<?php echo $this->Form->btnReset();?>
		<?php echo $this->Form->end();?>
	</div>
</div>