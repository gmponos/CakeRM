<?php echo $this->Form->create('OpportunityStatus');?>
<div class="panel panel-default">
	<?php echo $this->Html->panelHeader(__('Add Opportunity Status'));?>
	<div class="panel-body">
		<?php echo $this->Form->input('status');?>
	</div>
	<div class="panel-footer">
		<?php echo $this->Form->btnSubmit();?>
		<?php echo $this->Form->btnReset();?>
	</div>
</div>
<?php echo $this->Form->end();