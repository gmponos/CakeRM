<?php $this->Html->addCrumb($this->Html->link(__('Day offs'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-sun-o fa-fw']]));?>
<?php $this->Html->addCrumb(__('Edit'));?>
<?php $this->Html->addCrumb($this->request->data('DayOff.id'));?>
<div class="row">
	<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
		<div class="panel panel-default">
			<?php echo $this->Html->panelHeader(__('Edit Day Off'));?>
			<div class="panel-body">
				<?php echo $this->Form->create('DayOff');?>
				<?php echo $this->Form->input('id');?>
				<div class="row">
					<div class="col-sm-12">
						<?php echo $this->Form->chosen('user_id', ['selected' => $this->Session->read('Auth.User.id'), 'empty' => false]);?>
						<?php echo $this->Form->chosen('day_off_type_id', ['empty' => false]);?>
						<?php echo $this->Form->datepicker('date_start');?>
						<?php echo $this->Form->datepicker('date_end');?>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<?php echo $this->Form->btnSubmit();?>
				<?php echo $this->Form->btnReset();?>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>