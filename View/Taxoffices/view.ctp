<?php $this->Html->addCrumb($this->Html->link(__('Businesses'), ['controller' => 'businesses', 'action' => 'index'], ['icon' => ['class' => 'fa fa-building-o fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Tax Offices'), ['action' => 'index']));?>
<?php $this->Html->addCrumb(__('View'));?>
<?php $this->Html->addCrumb($taxoffice['Taxoffice']['id']);?>
<div class="row">
	<div class="col-sm-3 col-md-2">
		<div class="list-group">
			<?php echo $this->Element->listItemLinkAdd();?>
		</div>
	</div>
	<div class="col-sm-9 col-md-10">
		<div class="panel panel-default">
			<div class="panel-body">
				<dl class="dl-horizontal">
					<dt><?php echo __('Taxoffice');?></dt>
					<dd>
						<?php echo h($taxoffice['Taxoffice']['name']);?>
					</dd>
				</dl>
			</div>
		</div>
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active"><?php echo $this->Html->link(__('Businesses'), ['controller' => 'businesses', 'action' => 'related', 'taxoffice_id' => $taxoffice['Taxoffice']['id']], ["data-toggle" => "tab", 'data-target' => '#tab-business-related'])?></li>
		</ul>
		<div class="tab-content">
			<div id="tab-business-related" class="tab-pane active"></div>
		</div>
	</div>
</div>

