<?php $this->Html->addCrumb($this->Html->icon('th', __('Dashboard'))); ?>
<div class="row">
	<div class="col-md-6">
		<ul class="nav nav-tabs">
			<li class="active"><?= $this->Html->link(__('Tasks'), '#tab-tasks-dashboard',
					['data-toggle' => 'tab']) ?></li>
			<li><?= $this->Html->link(__('Repairs'), '#tab-repairs-dashboard',
					['data-toggle' => 'tab']) ?></li>
		</ul>
		<div class="tab-content active">
			<div id="tab-tasks-dashboard" class="tab-pane active">
				<?= $this->Html->pageHeader(__('Quick functions'), 'h4') ?>
				<div class="btn-group">
					<?= $this->Html->link(__('<br> Tasks'), ['controller' => 'tasks', 'action' => 'add'],
						['class' => 'btn btn-success  btn-sm', 'icon' => 'plus']); ?>
					<?= $this->Html->link(__('<br> Report'),
						['controller' => 'tasks', 'action' => 'mailToday'], [
							'class' => 'btn btn-success  btn-sm',
							'icon' => ['class' => 'fa fa-envelope fa-fw']
						]); ?>
				</div>
			</div>
			<div id="tab-repairs-dashboard" class="tab-pane">
				<?= $this->Html->pageHeader(__('Quick functions'), 'h4') ?>
				<?= $this->Html->link(__('<br> Repair'), ['controller' => 'repairs', 'action' => 'add'],
					['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div id="calendar" class="calendar" data-events="<?= $this->Html->url([
			'controller' => 'events',
			'action' => 'feed',
			'admin' => false,
			'plugin' => 'calendar'
		]); ?>">
		</div>
		<script>
			$(document).on('ready', function () {
				$('.calendar').each(function () {
					var events = $(this).attr('data-events');

					$(this).fullCalendar({
						defaultView: 'agendaWeek',
						events: {
							url: events,
							error: function () {
								alert('There was an error while fetching events!');
							}
						},
						header: {
							left: 'prev, next today',
							center: 'title',
							right: 'month, agendaWeek'
						}
					});

				});
			});
		</script>
	</div>
</div>
