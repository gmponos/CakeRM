<?php $this->Html->addCrumb($this->Html->link(__('Contacts'), ['controller' => 'contacts', 'action' => 'index'],
	['icon' => 'book'])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Contacts Types'), ['action' => 'index'])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($contactType['ContactType']['id']); ?>
<div class="toolbar toolbar-default">
	<?php echo $this->Element->btnToolbarReturn(); ?>
	<?php echo $this->Element->btnToolbarAdd(); ?>
	<?php echo $this->Element->btnToolbarEdit($contactType['ContactType']['id']); ?>
</div>
<div class="row">
	<div class="col-sm-9 col-md-10">
		<dl class="dl-table">
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($contactType['ContactType']['id']); ?>
			</dd>
			<dt><?php echo __('Type'); ?></dt>
			<dd>
				<?php echo h($contactType['ContactType']['type']); ?>
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($contactType['ContactType']['modified']); ?>
			</dd>
		</dl>
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active"><?php echo $this->Html->link(__('Contacts'), [
					'controller' => 'contacts',
					'action' => 'related',
					'contact_type_id' => $contactType['ContactType']['id'],
				], ["data-toggle" => "tab", 'data-target' => '#tab-contacts-related']) ?>
			</li>
		</ul>
		<div class="tab-content">
			<div id="tab-contacts-related" class="tab-pane active">
			</div>
		</div>
	</div>
</div>