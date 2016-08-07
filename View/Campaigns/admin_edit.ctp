<div class="panel panel-default">
	<?php echo $this->Html->panelHeader(__('Admin Edit Campaign'));?>
	<div class="panel-body">
		<?php echo $this->Form->create('Campaign');?>
		<?php echo $this->Form->input('id');?>
		<?php echo $this->Form->input('campaign');?>
	</div>
	<div class="panel-footer">
		<?php echo $this->Form->btnSubmit();?>
		<?php echo $this->Form->btnReset();?>
		<?php echo $this->Form->end();?>
	</div>
</div>
