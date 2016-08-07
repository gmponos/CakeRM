<?php $this->Html->addCrumb($this->Html->link(__('Opportunities'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-thumbs-o-up fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Status'), ['action' => 'index']));?>
<div class="toolbar toolbar-default">
	<?php echo $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm', 'icon' => 'plus']);?>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped table-limited small">
		<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($opportunityStatuses as $opportunityStatus) :?>
			<tr>
				<td><?php echo h($opportunityStatus['OpportunityStatus']['id']);?>&nbsp;</td>
				<td><?php echo h($opportunityStatus['OpportunityStatus']['status']);?>&nbsp;</td>
				<td><?php echo h($opportunityStatus['OpportunityStatus']['modified']);?>&nbsp;</td>
				<td>
					<?php echo $this->Element->btnLinkView($opportunityStatus['OpportunityStatus']['id']);?>
					<?php echo $this->Element->btnLinkEdit($opportunityStatus['OpportunityStatus']['id']);?>
					<?php echo $this->Element->btnLinkDelete($opportunityStatus['OpportunityStatus']['id']);?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
