<?php $this->Html->addCrumb($this->Html->link(__('Users'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-user fa-fw']])); ?>
<?php $this->Html->addCrumb(__('View')); ?>
<?php $this->Html->addCrumb($user['User']['id']); ?>
<div class="row">
	<div class="col-sm-3">
		<div class="list-group">
			<?php echo $this->Element->listItemLinkReturn(); ?>
		</div>
	</div>
	<div class="col-sm-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<dl class="dl-horizontal">
					<dt><?php echo __('Username'); ?></dt>
					<dd>
						<?php echo h($user['User']['username']); ?>
					</dd>
					<dt><?php echo __('Firstname'); ?></dt>
					<dd>
						<?php echo h($user['User']['firstname']); ?>
						&nbsp;
					</dd>
					<dt><?php echo __('Lastname'); ?></dt>
					<dd>
						<?php echo h($user['User']['lastname']); ?>
						&nbsp;
					</dd>
					<dt><?php echo __('Email'); ?></dt>
					<dd>
						<?php echo $this->Text->autoLinkEmails($user['User']['email']); ?>
						&nbsp;
					</dd>
					<dt><?php echo __('Phone'); ?></dt>
					<dd>
						<?php echo h($user['User']['phone']); ?>
						&nbsp;
					</dd>
					<dt><?php echo __('Cellphone'); ?></dt>
					<dd>
						<?php echo h($user['User']['cellphone']); ?>
						&nbsp;
					</dd>
					<dt><?php echo __('Comments'); ?></dt>
					<dd>
						<?php echo h($user['User']['comments']); ?>
						&nbsp;
					</dd>
				</dl>
			</div>
		</div>
	</div>
</div>