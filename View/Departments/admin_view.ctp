<?php $this->Html->addCrumb($this->Html->link(__('Businesses'), ['controller' => 'businesses', 'action' => 'index'], ['icon' => ['class' => 'fa fa-building-o fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Departments'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('View'));?>
<?php $this->Html->addCrumb($department['Department']['id']);?>
<div class="row">
	<div class="col-sm-3 col-md-2">
		<div class="list-group">
			<?php echo $this->Element->listItemLinkAdd();?>
			<?php echo $this->Element->listItemLinkEdit($department['Department']['id']);?>
		</div>
	</div>
	<div class="col-sm-9 col-md-10">
		<div class="panel panel-default">
			<div class="panel-body">
				<dl class="dl-horizontal">
					<dt><?php echo __('Id');?></dt>
					<dd>
						<?php echo h($department['Department']['id']);?>
					</dd>
					<dt><?php echo __('Department');?></dt>
					<dd>
						<?php echo h($department['Department']['department']);?>
					</dd>
					<dt><?php echo __('Modified');?></dt>
					<dd>
						<?php echo h($department['Department']['modified']);?>
					</dd>
				</dl>
			</div>
		</div>
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active"><?php echo $this->Html->link(__('Contacts'), ['controller' => 'contacts', 'action' => 'related', 'department_id' => $department['Department']['id']], ["data-toggle" => "tab", 'data-target' => '#tab-contacts-related'])?></li>
		</ul>
		<div class="tab-content">
			<div id="tab-contacts-related" class="tab-pane active"></div>
		</div>		
	</div>
</div>