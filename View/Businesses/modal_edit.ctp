<div class="modal-header">
    <h4 class="modal-title"><?php echo __('Business Info'); ?></h4>
</div>
<div class="modal-body">
	<?php echo $this->Form->create('Business', ['class' => 'modal-form-update', 'data-hide' => '#modal-remote']); ?>
	<?php echo $this->Form->input('id'); ?>
	<div class="row">
		<div class="col-sm-4">
			<?php echo $this->Form->input('phone_one', ['placeholder' => __('Phone')]) ?>
			<?php echo $this->Form->input('phone_two', ['placeholder' => __('Phone')]) ?>
			<?php echo $this->Form->input('fax', ['placeholder' => __('Fax')]) ?>
			<?php echo $this->Form->input('afm', ['placeholder' => __('Afm')]) ?>
		</div>
		<div class="col-sm-8">
			<?php echo $this->Form->input('email'); ?>
			<?php echo $this->Form->input('website', ['placeholder' => 'www.example.com']); ?>
		</div>
		<div class="col-sm-9">
			<?php echo $this->Form->input('address', ['placeholder' => __('Address')]); ?>
		</div>
		<div class="col-sm-3">
			<?php echo $this->Form->input('tk', ['placeholder' => __('TK'), 'label' => __('TK')]); ?>
		</div>
	</div>
	<?php echo $this->Form->btnSubmit(); ?>
	<?php echo $this->Form->btnCancel(); ?>
	<?php echo $this->Form->end(); ?>
</div>