<?php $this->Html->addCrumb($this->Html->link(__('Day offs'), ['controller' => 'day_offs', 'action' => 'index'], ['icon' => ['class' => 'fa fa-sun-o fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Day off Types'), ['action' => 'index']));?>
<div class="toolbar toolbar-default">
	<?php echo $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm', 'icon' => 'plus']);?>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped table-limited small">
		<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($dayOffTypes as $dayOffType) :?>
			<tr>
				<td><?php echo h($dayOffType['DayOffType']['id']);?>&nbsp;</td>
				<td><?php echo h($dayOffType['DayOffType']['type']);?>&nbsp;</td>
				<td><?php echo h($dayOffType['DayOffType']['modified']);?></td>
				<td>
					<div class="btn-group-nowrap">
						<?php echo $this->Element->btnLinkView($dayOffType['DayOffType']['id']);?>
						<?php echo $this->Element->btnLinkEdit($dayOffType['DayOffType']['id']);?>
						<?php echo $this->Element->btnLinkDelete($dayOffType['DayOffType']['id']);?>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
