<?php $this->Html->addCrumb($this->Html->link(__('Opportunities'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-thumbs-o-up fa-fw']])); ?>
<?= $this->Html->pageHeader($opportunityStatus['OpportunityStatus']['status'], 'h4'); ?>
<div class="row">
	<div class="col-lg-6">
		<dl class="dl-table">
			<dt><?php echo __('Status'); ?></dt>
			<dd>
				<?php echo h($opportunityStatus['OpportunityStatus']['status']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
</div>