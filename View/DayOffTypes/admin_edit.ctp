<?php $this->Html->addCrumb($this->Html->link(__('Day Offs'), ['controller' => 'day_offs', 'action' => 'index'], ['icon' => 'sun-o']));?>
<?php $this->Html->addCrumb($this->Html->link(__('Day Off Types'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('Edit'));?>
<?php $this->Html->addCrumb($this->request->data('DayOffType.id'));?>

<div class="row">
	<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
		<div class="panel panel-default">
			<?php echo $this->Html->panelHeader(__('Edit Day Off Type'));?>
			<div class="panel-body">
				<?php echo $this->Form->create('DayOffType');?>
				<?php echo $this->Form->input('id')?>
				<?php echo $this->Form->input('type')?>
			</div>
			<div class="panel-footer">
				<?php echo $this->Form->btnSubmit();?>
				<?php echo $this->Form->btnReset();?>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>