<?php $this->Html->addCrumb($this->Html->link(__('Day offs'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-sun-o fa-fw']])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($dayOff['DayOff']['id']); ?>
<div class="row">
	<div class="col-sm-3 col-md-2">
		<div class="list-group">
			<?php echo $this->Element->listItemLinkReturn(); ?>
			<?php echo $this->Element->listItemLinkAdd(); ?>
			<?php echo $this->Element->listItemLinkEdit($dayOff['DayOff']['id']); ?>
		</div>
	</div>
	<div class="col-sm-9 col-md-10">
		<?php echo $this->Html->pageHeader(__('Day Off'), 'h4'); ?>
		<div class="panel panel-default">
			<div class="panel-body">
				<dl class="dl-table">
					<dt><?php echo __('User'); ?></dt>
					<dd>
						<?php echo $this->Html->link($dayOff['User']['fullname'], [
							'controller' => 'users',
							'action' => 'view',
							$dayOff['User']['id'],
						]); ?>
					</dd>
					<dt><?php echo __('Start'); ?></dt>
					<dd>
						<time><?php echo h($dayOff['DayOff']['date_start']); ?></time>
						&nbsp;
					</dd>
					<dt><?php echo __('End'); ?></dt>
					<dd>
						<time>
							<?php echo h($dayOff['DayOff']['date_end']); ?>
							<time>&nbsp;
					</dd>
				</dl>
			</div>
		</div>
	</div>
</div>

