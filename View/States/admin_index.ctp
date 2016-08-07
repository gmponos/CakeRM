<?php $this->Html->addCrumb($this->Html->link(__('States'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-home fa-fw']]));?>
<div class="table-responsive">
	<table class="table table-hover table-striped small" id="tasks">
		<thead>
			<tr>
				<th><?php echo __('Id');?></th>
				<th><?php echo __('Name');?></th>
				<th><?php echo __('Modified');?></th>
				<th><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($states as $state) :?>
			<tr>
				<td><?php echo h($state['State']['id'])?></td>
				<td><?php echo h($state['State']['name'])?></td>
				<td><?php echo h($state['State']['modified'])?></td>
				<td>
					<div class="btn-group-nowrap">
						<?php echo $this->Element->btnLinkView($state['State']['id']);?>
						<?php echo $this->Element->btnLinkEdit($state['State']['id']);?>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
</div>