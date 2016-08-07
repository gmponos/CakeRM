<?php echo $this->Html->modalHeader(__('Add Opportunity Communication'));?>
<div class="modal-body">
	<?php echo $this->Form->create('OpportunityCommunication', ['class' => 'modal-form-add', 'data-target' => '#tab-opportunity-communications-related', 'data-hide' => '#modal-remote']);?>
	<?php echo $this->Form->chosen('user_id', ['selected' => $this->Session->read('Auth.User.id'), 'empty' => false]);?>
	<?php echo $this->Form->input('description', ['rows' => '5']);?>
	<?php echo $this->Form->btnSubmit();?>
	<?php echo $this->Form->btnCancel();?>
	<?php echo $this->Form->end();?>
</div>