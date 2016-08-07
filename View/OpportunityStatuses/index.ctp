<?php $this->Html->addCrumb($this->Html->link(__('Opportunities'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-thumbs-o-up fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Status'), ['action' => 'index']));?>
<div class="toolbar toolbar-default">
	<?php echo $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm', 'icon' => 'plus']);?>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($opportunityStatuses as $opportunityStatus) :?>
			<tr>
				<td><?php echo h($opportunityStatus['OpportunityStatus']['status']);?>&nbsp;</td>
				<td>
					<?php echo $this->Element->btnLinkView($opportunityStatus['OpportunityStatus']['id']);?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
<?php
echo $this->element('pagination/pagination');
