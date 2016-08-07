<?php $this->Html->addCrumb($this->Html->link(__('Opportunities'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-thumbs-o-up fa-fw']])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($opportunity['Opportunity']['id']); ?>
<nav class="toolbar toolbar-default" role="navigation">
	<?php echo $this->Element->btnLinkAdd('', __('Add'), ['class' => "btn btn-success btn-sm"]); ?>
	<?php echo $this->Element->btnLinkEdit($opportunity['Opportunity']['id'], __('Edit'),
		['class' => 'btn btn-success btn-sm']); ?>
</nav>
<div class="row">
	<div class="col-md-8 col-lg-9">
		<div class="well">
			<h5><?php echo __('Description'); ?></h5>
			<?php $this->Text->autoParagraph($opportunity['Opportunity']['description']); ?>
		</div>
		<div class="row">
			<div class="col-md-7">
				<?= $this->element('Businesses/related_single', $opportunity['Business']); ?>
			</div>
			<div class="col-md-5">
				<?= $this->element('Contacts/related_single', $opportunity['Contact']); ?>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-lg-3">
		<div class="well">
			<h5><?php echo __('Properties'); ?></h5>
			<dl class="dl-auto">
				<dt><?php echo __('Status'); ?></dt>
				<dd><?php echo $this->Html->link($opportunity['OpportunityStatus']['status'], [
						'controller' => 'opportunity_statuses',
						'action' => 'view',
						$opportunity['OpportunityStatus']['id'],
					]); ?>&nbsp;</dd>
				<dt><?php echo __('Campaign'); ?></dt>
				<dd><?php echo $this->Html->link($opportunity['Campaign']['campaign'], [
						'controller' => 'campaigns',
						'action' => 'view',
						$opportunity['Campaign']['id'],
					]); ?>&nbsp;</dd>
				<dt><?php echo __('Channel'); ?></dt>
				<dd><?php echo $this->Html->link($opportunity['Channel']['channel'],
						['controller' => 'channels', 'action' => 'view', $opportunity['Channel']['id']]); ?>&nbsp;</dd>
			</dl>
			<dl class="dl-auto">
				<dt><?php echo __('Created'); ?></dt>
				<dd>
					<time><?php echo h($opportunity['Opportunity']['created']); ?>&nbsp;</time>
				</dd>
				<dt><?php echo __('From'); ?></dt>
				<dd><?php echo $this->Html->link($opportunity['CreatedUser']['fullname'], [
						'controller' => 'users',
						'plugin' => false,
						'action' => 'view',
						$opportunity['CreatedUser']['id'],
					]); ?>&nbsp;</dd>
				<dt><?php echo __('Updated'); ?></dt>
				<dd>
					<time><?php echo h($opportunity['Opportunity']['updated']); ?>&nbsp;</time>
				</dd>
				<dt><?php echo __('From'); ?></dt>
				<dd><?php echo $this->Html->link($opportunity['UpdatedUser']['fullname'], [
						'controller' => 'users',
						'plugin' => false,
						'action' => 'view',
						$opportunity['UpdatedUser']['id'],
					]); ?>&nbsp;</dd>
			</dl>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-lg-9">
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active">
				<?php echo $this->Html->link(__('Communications'), [
					'controller' => 'opportunity_communications',
					'action' => 'related',
					$opportunity['Opportunity']['id'],
				], ['data-toggle' => 'tab', 'data-target' => '#opportunity-communications-tab-related']) ?>
			</li>
		</ul>
		<div class="tab-content active">
			<div id="opportunity-communications-tab-related" class="tab-pane active"></div>
		</div>
	</div>
</div>