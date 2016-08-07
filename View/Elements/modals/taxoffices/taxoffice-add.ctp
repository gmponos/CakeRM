<div id="taxoffice-add-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<?php echo $this->Html->modalHeader(__('Add Taxoffice'), 'h4');?>
			<div class="modal-body">
				<?php echo $this->Form->create('Taxoffice', ['url' => $action, 'data-toggle' => 'modal-form', 'data-update' => $update, 'data-hide' => '#taxoffice-add-modal']);?>
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