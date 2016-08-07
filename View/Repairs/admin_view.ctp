<?php $this->Html->addCrumb($this->Html->link(__('Repairs'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-gavel fa-fw']])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($repair['Repair']['id']); ?>
<div class="toolbar toolbar-default">
	<?php echo $this->Element->btnToolbarAdd(); ?>
	<?php echo $this->Element->btnToolbarReturn(); ?>
	<?php echo $this->Element->btnToolbarEdit($repair['Repair']['id']); ?>
	<?php echo $this->Element->btnToolbarMail($repair['Repair']['id']); ?>
</div>
<div class="row">
	<div class="col-sm-9 col-md-10">
		<div class="row">
			<div class="col-sm-9">
				<div class="well">
					<h5><?php echo __('Description'); ?></h5>
					<?php echo $this->Text->autoParagraph($repair['Repair']['description']); ?>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?= $this->element('Businesses/related_single', [
							'business' => $repair['Business'],
						]); ?>
					</div>
					<div class="col-sm-6">
						<?= $this->element('Contacts/related_single', [
							'contact' => $repair['Contact'],
						]); ?>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="well">
					<h5><?php echo __('Details'); ?></h5>
					<dl class="dl-auto">
						<dt><?php echo __('Received'); ?></dt>
						<dd>
							<time><?php echo h($repair['Repair']['date_received']); ?></time>
							&nbsp;</dd>
						<dt><?php echo __('Repaired From'); ?></dt>
						<dd><?php echo $this->Html->link($repair['RepairedUser']['fullname'], [
								'controller' => 'users',
								'plugin' => false,
								'action' => 'view',
								$repair['RepairedUser']['id'],
							]); ?>&nbsp;</dd>
						<dt><?php echo __('Repaired'); ?></dt>
						<dd>
							<time><?php echo h($repair['Repair']['date_repaired']); ?></time>
							&nbsp;</dd>
						<dt><?php echo __('Sent'); ?></dt>
						<dd>
							<time><?php echo h($repair['Repair']['date_sent']); ?></time>
							&nbsp;</dd>
						<dt><?php echo __('Created'); ?></dt>
						<dd>
							<time><?php echo h($repair['Repair']['date_created']); ?></time>
							&nbsp;</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</div>
