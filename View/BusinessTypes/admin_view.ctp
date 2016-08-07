<?php $this->Html->addCrumb($this->Html->link(__('Businesses'), ['controller'=>'businesses', 'action' => 'index'], ['icon' => ['class' => 'fa fa-building-o fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Business Types'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('View'));?>
<?php $this->Html->addCrumb($businessType['BusinessType']['id']);?>
<div class="row">
	<div class="col-sm-3 col-md-2">
		<div class="list-group">
			<?php echo $this->Element->listItemLinkAdd();?>
			<?php echo $this->Element->listItemLinkEdit($businessType['BusinessType']['id']);?>
		</div>
	</div>
	<div class="col-sm-9 col-md-10">
		<?php echo $this->Html->lead($businessType['BusinessType']['type']);?>		
		<dl class="dl-horizontal">
			<dt><?php echo __('Modified');?></dt>
			<dd>
				<?php echo h($businessType['BusinessType']['modified']);?>
			</dd>
		</dl>
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active"><?php echo $this->Html->link(__('Businesses'), ['controller' => 'businesses', 'action' => 'related', 'business_type_id' => $businessType['BusinessType']['id']], ['data-toggle' => 'tab', 'data-target' => '#tab-businesses-related'])?></li>
		</ul>
		<div class="tab-content">
			<div id="tab-businesses-related" class="tab-pane active"></div>
		</div>
	</div>
</div>
