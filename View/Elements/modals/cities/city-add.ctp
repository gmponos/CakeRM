<div id="city-add-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<?php echo $this->Html->modalHeader(__('Add City'));?>
			<div class="modal-body">
				<?php echo $this->Form->create('City', ['url' => $action, 'data-toggle' => 'modal-form', 'data-update' => $update, 'data-hide' => '#city-add-modal']);?>
				<?php echo $this->Form->chosen('state_id', ['empty' => false]);?>
				<?php echo $this->Form->input('name', ['type' => 'text']);?>
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->btnSubmit();?>
				<?php echo $this->Form->btnCancel();?>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>