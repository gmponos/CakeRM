<?php $this->Html->addCrumb($this->Html->link(
	__('Groups'),
	['action' => 'index'],
	['icon' => ['class' => 'icon icon-users icon-fw']]
)); ?>
<?php $this->Html->addCrumb(__('Edit')); ?>
<?php $this->Html->addCrumb($this->request->data('Group.id')); ?>

<?php echo $this->Form->create('Group'); ?>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="well">
				<legend><?php echo (__('Edit Group')); ?></legend>
				<?php echo $this->Form->input('id'); ?>
				<?php echo $this->Form->input('name'); ?>
				<?php echo $this->Form->input('comments', ['rows' => 5, 'placeholder' => false]); ?>
				<?php echo $this->Form->btnSubmit(); ?>
				<?php echo $this->Form->btnReset(); ?>
			</div>
		</div>
	</div>
<?php echo $this->Form->end();
