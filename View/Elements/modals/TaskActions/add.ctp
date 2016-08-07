<?php
/**
 * This is the modal that appears when you want to add a TaskAction
 * When the element is loaded it must have two params set.
 *
 * @param string|array $action The url to submit the form. This might be different in some cases because we may need to render differrent views
 * @param string $update The element to update when the form is submited
 */
?>
<div id="TaskActionAddModal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php echo $this->Html->modalHeader(__('Task Action'), 'h4')?>
			<div class="modal-body">
				<?php echo $this->Form->create('TaskAction', ['url' => $action, 'data-toggle' => 'modal-form', 'data-update' => $update, 'data-hide' => '#TaskActionAddModal']);?>
				<?php echo $this->Form->input('description', ['type' => 'text', 'rows' => '7', 'placeholder' => false]);?>
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->btnSubmit();?>
				<?php echo $this->Form->btnCancel();?>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>