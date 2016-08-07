<?php $this->Html->addCrumb($this->Html->link(__('States'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-home fa-fw']]));?>
<?php $this->Html->addCrumb(__('View'));?>
<?php $this->Html->addCrumb($state['State']['id']);?>
<div class="row">
	<div class="col-md-3">
		<div class="list-group">
			<?php echo $this->Element->listItemLinkReturn();?>
		</div>
	</div>
	<div class="col-md-9">
		<p class="lead"><?php echo h($state['State']['name']);?></p>
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active"><?php echo $this->Html->link(__('Businesses'), ['controller' => 'businesses', 'action' => 'related', 'Business.state_id' => $state['State']['id']], ['data-toggle' => 'tab', 'data-target' => '#tab-businesses-related']);?></li>
			<li><?php echo $this->Html->link(__('Contacts'), ['controller' => 'contacts', 'action' => 'related', 'Contact.state_id' => $state['State']['id']], ['data-toggle' => 'tab', 'data-target' => '#tab-contacts-related']);?></li>
			<li><?php echo $this->Html->link(__('Cities'), ['controller' => 'cities', 'action' => 'related', 'City.state_id' => $state['State']['id']], ['data-toggle' => 'tab', 'data-target' => '#tab-cities-related']);?></li>
		</ul>
		<div class="tab-content">
			<div id="tab-businesses-related" class="tab-pane active"></div>
			<div id="tab-contacts-related" class="tab-pane"></div>
			<div id="tab-cities-related" class="tab-pane"></div>
		</div>
	</div>
</div>