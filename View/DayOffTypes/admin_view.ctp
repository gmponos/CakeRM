<?php $this->Html->addCrumb($this->Html->link(__('Day offs'), ['controller' => 'day_offs', 'action' => 'index'], ['icon' => ['class' => 'fa fa-sun-o fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Day off Types'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('View'));?>
<?php $this->Html->addCrumb($dayOffType['DayOff']['type']);?>

<div class="dayOffTypes view">
	<h2><?php echo __('Day Off Type');?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id');?></dt>
		<dd>
			<?php echo h($dayOffType['DayOffType']['id']);?>
		</dd>
		<dt><?php echo __('Type');?></dt>
		<dd>
			<?php echo h($dayOffType['DayOffType']['type']);?>
		</dd>
		<dt><?php echo __('Modified');?></dt>
		<dd>
			<?php echo h($dayOffType['DayOffType']['modified']);?>
		</dd>
	</dl>
</div>
<ul class="nav nav-tabs nav-tabs-remote">
	<li class="active"><?php echo $this->Html->link(__('Day offs'), ['controller' => 'contacts', 'action' => 'related', 'day_off_type_id' => $dayOffType['DayOffType']['id']], ["data-toggle" => "tab", 'data-target' => '#tab-day-off-related'])?></li>
</ul> 
<div class="tab-content">
	<div id="tab-day-offs-related" class="tab-pane active"></div>
</div>