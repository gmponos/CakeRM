<?php $this->Html->addCrumb($this->Html->link(__('Opportunities'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-thumbs-o-up fa-fw']])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($opportunity['Opportunity']['id']); ?>
<nav class="toolbar toolbar-default" role="navigation">
	<?php echo $this->Element->btnToolbarAdd(); ?>
	<?php echo $this->Element->btnToolbarEdit($opportunity['Opportunity']['id']); ?>
	<?php echo $this->Element->btnLinkDelete($opportunity['Opportunity']['id'], __('Delete'),
		['class' => 'btn btn-danger btn-sm']); ?>
</nav>
<h3><?= __('Overview') ?></h3>
<hr>
<div class="row">
	<div class="col-md-6 col-lg-8">
		<div class="panel panel-default">
			<div class="panel-body">
				<?= $this->Text->autoParagraph($opportunity['Opportunity']['description']); ?>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-4">
		<ul class="list-unstyled text-muted">
			<li>
				<i class="fa fa-calendar fa-fw"></i>
				<?php $updated = $this->Time->nice($opportunity['Opportunity']['date_updated'], null, '%d %b %Y'); ?>
				<?= __('Updated by %s on %s', $opportunity['UpdatedUser']['fullname'], $updated); ?>
			</li>
		</ul>
		<ul class="list-unstyled text-muted">
			<li>
				<i class="fa fa-thumbs-o-up fa-fw"></i>
				<?= __('Responsible User'); ?>
				<?= $opportunity['ResponsibleUser']['fullname']; ?>
			</li>
			<li>
				<i class="fa fa-tags fa-fw"></i>
				<?= $this->Html->label($opportunity['Channel']['channel'], 'info'); ?>
				<?= $this->Html->label($opportunity['OpportunityStatus']['status'], 'info'); ?>
				<?php
				if (!empty($opportunity['OpportunityCampaign']['campaign'])) :
					echo ($this->Html->label($opportunity['OpportunityCampaign']['campaign'], 'danger'));
				endif;
				?>
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-lg-8">
		<div class="row">
			<div class="col-md-7">
				<?= $this->element('Businesses/related_single', ['business' => $opportunity['Business']]); ?>
			</div>
			<div class="col-md-5">
				<?= $this->element('Contacts/related_single', ['contact' => $opportunity['Contact']]); ?>
			</div>
		</div>
		<ul class="nav nav-tabs nav-tabs-remote">
			<li class="active">
				<?php echo $this->Html->link(__('Communications'), [
					'controller' => 'opportunity_communications',
					'action' => 'related',
					$opportunity['Opportunity']['id'],
				], [
					'data-toggle' => 'tab',
					'data-target' => '#opportunity-communications-tab-related',
				]) ?>
			</li>
		</ul>
		<div class="tab-content active">
			<div id="opportunity-communications-tab-related" class="tab-pane active"></div>
		</div>
	</div>
</div>
