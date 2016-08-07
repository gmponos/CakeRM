<?php $this->Html->addCrumb($this->Html->link(
	__('Groups'),
	['action' => 'index'],
	['icon' => ['class' => 'fa fa-users fa-fw']]));
?>
<?php $this->Html->addCrumb(__('Create')); ?>
<?= $this->Form->create('Group'); ?>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-default">
				<?= $this->Html->panelHeader(__('Add Group')); ?>
				<div class="panel-body">
					<?= $this->Form->input('name'); ?>
					<?= $this->Form->input('comments', ['rows' => 5, 'placeholder' => false]); ?>
				</div>
				<div class="panel-footer">
					<?= $this->Form->btnSubmit(); ?>
					<?= $this->Form->btnReset(); ?>
				</div>
			</div>
		</div>
	</div>
<?= $this->Form->end();
