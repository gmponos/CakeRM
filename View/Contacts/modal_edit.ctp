<div class="modal-header">
	<h4 class="modal-title"><?php echo __('Contact Info');?></h4>
</div>
<div class="modal-body">
	<?php echo $this->Form->create('Contact', ['class' => 'modal-form-update', 'data-hide' => '#modal-remote']);?>
	<?php echo $this->Form->input('id');?>
	<div class="row">
		<div class="col-sm-6">
			<?php echo $this->Form->input('phone', ['placeholder' => __('Phone')])?>
		</div>
		<div class="col-sm-6">
			<?php echo $this->Form->input('cellphone', ['placeholder' => __('Phone')])?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php echo $this->Form->input('email', ['placeholder' => __('email@email.com')]);?>
		</div>
	</div>
	<?php echo $this->Form->btnSubmit();?>
	<?php echo $this->Form->btnCancel();?>
	<?php echo $this->Form->end();?>
</div>
