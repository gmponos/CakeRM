<div class="projectActions form">
    <?php echo $this->Form->create('ProjectAction'); ?>
	<fieldset>
		<legend><?php echo __('Add Project Action'); ?></legend>
		<?php
		echo $this->Form->input('description');
		echo $this->Form->input('project_id');
		echo $this->Form->input('modified_user_id');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
