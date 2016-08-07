<div class="table-responsive">
	<table class="table table-hover table-striped table-limited small">
		<tr>
			<th><?php echo __('Type');?></th>
			<th><?php echo __('User');?></th>
			<th><?php echo __('Start');?></th>
			<th><?php echo __('End');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($dayOffs as $dayOff) :?>
			<tr>
				<td><?php echo h($dayOff['DayOffType']['type']);?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($dayOff['User']['lastname'], ['controller' => 'users', 'action' => 'view', $dayOff['User']['id']]);?>
				</td>
				<td><time><?php echo h($dayOff['DayOff']['date_start']);?></time></td>
				<td><time><?php echo h($dayOff['DayOff']['date_end']);?></time></td>
				<td>
					<?php echo $this->Element->btnLinkView($dayOff['DayOff']['id']);?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
<?php
echo $this->element('pagination/paging');
echo $this->element('pagination/pagination');
