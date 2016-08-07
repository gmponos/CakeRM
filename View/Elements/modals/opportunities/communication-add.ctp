<div id="opportunity-communication-add-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php echo $this->Html->modalHeader(__('Add Opportunity Communication'), 'h4')?>
			<div class="modal-body">
				<?php echo $this->Form->create('OpportunityCommunication', ['url' => ['admin' => false, 'action' => 'modal_addForRelated', $opportunity['Opportunity']['id']], 'class' => 'modal-form-add', 'data-target' => '#tab-opportunity-communications-related', 'data-hide' => '#opportunity-communication-add-modal']);?>
				<?php echo $this->Form->chosen('user_id', ['selected' => $this->Session->read('Auth.User.id'), 'empty' => false]);?>
				<?php echo $this->Form->input('description', ['rows' => '5', 'placeholder' => __('Description')]);?>
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->btnSubmit();?>
				<?php echo $this->Form->btnCancel();?>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>