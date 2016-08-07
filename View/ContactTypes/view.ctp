<?php $this->Html->addCrumb($this->Html->link(__('Contacts'), ['controller' => 'contact_types', 'action' => 'index'],
	['icon' => ['class' => 'fa fa-book fa-fw']])); ?>
<?php $this->Html->addCrumb($this->Html->link(__('Contacts Types'), ['action' => 'index'])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($contactType['ContactType']['id']); ?>
<div class="toolbar toolbar-default">
	<?php echo $this->Element->btnToolbarReturn(); ?>
	<?php echo $this->Element->btnToolbarAdd(); ?>
</div>
<div class="row">
	<div class="col-sm-9 col-md-10">
		<?php echo $this->Html->lead($contactType['ContactType']['type']); ?>
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active"><?php echo $this->Html->link(__('Contacts'), [
					'controller' => 'contacts',
					'action' => 'related',
					'contact_type_id' => $contactType['ContactType']['id'],
				], ["data-toggle" => "tab", 'data-target' => '#tab-contacts-related']) ?></li>
		</ul>
		<div class="tab-content">
			<div id="tab-contacts-related" class="tab-pane active"></div>
		</div>
	</div>
</div>