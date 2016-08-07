<?php $this->Html->addCrumb($this->Html->link(__('States'), ['action' => 'index'], ['icon' => ['class' => 'fa fa-home fa-fw']]));?>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<th><?php echo __('Name');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($states as $state) :?>
			<tr>
				<td><?php echo h($state['State']['name'])?></td>
				<td>
					<?php echo $this->Element->btnLinkView($state['State']['id']);?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>