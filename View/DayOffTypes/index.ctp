<?php $this->Html->addCrumb($this->Html->link(__('Day offs'), ['controller' => 'day_offs', 'action' => 'index'], ['icon' => ['class' => 'fa fa-sun-o fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Day off Types'), ['action' => 'index']));?>
<div class="table-responsive">
	<table class="table table-hover table-striped table-limited small">
		<tr>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($dayOffTypes as $dayOffType) :?>
			<tr>
				<td><?php echo h($dayOffType['DayOffType']['type']);?></td>
				<td>
					<?php echo $this->Element->btnLinkView($dayOffType['DayOffType']['id']);?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
