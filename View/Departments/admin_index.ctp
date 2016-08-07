<?php $this->Html->addCrumb($this->Html->link(__('Businesses'), ['controller'=>'businesses', 'action' => 'index'], ['icon' => ['class' => 'fa fa-building-o fa-fw']]));?>
<?php $this->Html->addCrumb($this->Html->link(__('Departments'), ['action' => 'index']));?>
<div class="toolbar toolbar-default">
	<?php echo $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm', 'icon' => 'plus']);?>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('department');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php foreach ($departments as $department) :?>
			<tr>
				<td><?php echo h($department['Department']['id']);?></td>
				<td><?php echo h($department['Department']['department']);?></td>
				<td><?php echo h($department['Department']['modified']);?></td>
				<td>
					<div class="btn-group-nowrap">
						<?php echo $this->Element->btnLinkView($department['Department']['id']);?>
						<?php echo $this->Element->btnLinkEdit($department['Department']['id']);?>
						<?php echo $this->Element->btnLinkDelete($department['Department']['id']);?>						
					</div>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>