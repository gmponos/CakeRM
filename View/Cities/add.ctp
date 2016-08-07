<?php $this->Html->addCrumb(__('Cities'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-home fa-fw']]); ?>
<?php $this->Html->addCrumb(__('Create')); ?>
<?php echo $this->Form->create('City'); ?>
	<div class="row">
		<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
			<div class="panel panel-default">
				<?php echo $this->Html->panelHeader(__('Create City')); ?>
				<div class="panel-body">
					<?php
					echo $this->Form->chosen('state_id', ['empty' => false]);
					echo $this->Form->input('name');
					?>
				</div>
				<div class="panel-footer">
					<?php echo $this->Form->btnSubmit(); ?>
					<?php echo $this->Form->btnReset(); ?>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->Form->end();
