<?php $this->Html->addCrumb($this->Html->link(__('Cities'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-home fa-fw']]));?>
<?php $this->Html->addCrumb(__('View'));?>
<?php $this->Html->addCrumb($city['City']['id']);?>
<div class="row">
	<div class="col-sm-3 col-md-2">
		<div class="list-group">
			<?php echo $this->Element->listItemLinkAdd();?>
			<?php echo $this->Element->listItemLinkEdit($city['City']['id']);?>
		</div>
	</div>
	<div class="col-sm-9 col-md-10">
		<div class="panel panel-default">
			<div class="panel-body">
				<dl>
					<dt><?php echo __('Id');?></dt>
					<dd>
						<?php echo h($city['City']['id']);?>
						&nbsp;
					</dd>
					<dt><?php echo __('State');?></dt>
					<dd>
						<?php echo $this->Html->link($city['State']['name'], ['controller' => 'states', 'action' => 'view', $city['State']['id']]);?>
						&nbsp;
					</dd>
					<dt><?php echo __('City');?></dt>
					<dd>
						<?php echo h($city['City']['name']);?>
						&nbsp;
					</dd>
					<dt><?php echo __('Modified');?></dt>
					<dd>
						<?php echo h($city['City']['modified']);?>
						&nbsp;
					</dd>
				</dl>
				<ul class="nav nav-tabs nav-tabs-remote">
					<li class="active"><?php echo $this->Html->link(__('Businesses'), ['controller' => 'businesses', 'action' => 'related', 'city_id' => $city['City']['id']], ["data-toggle" => "tab", 'data-target' => '#tab-business-related'])?></li>
					<li><?php echo $this->Html->link(__('Contacts'), ['controller' => 'contacts', 'action' => 'related', 'city_id' => $city['City']['id']], ["data-toggle" => "tab", 'data-target' => '#tab-contacts-related'])?></li>
				</ul>
				<div class="tab-content">
					<div id="tab-business-related" class="tab-pane active"></div>
					<div id="tab-contacts-related" class="tab-pane"></div>
				</div>
			</div>
		</div>
	</div>
</div>
