<?php $this->Html->addCrumb($this->Html->link(__('Day Offs'), ['action' => 'index'],
	['icon' => ['class' => 'fa fa-sun-o fa-fw']])); ?>
<div class="toolbar toolbar-default">
	<?php echo $this->Html->link(__('Add'), ['action' => 'add'],
		['class' => 'btn btn-success btn-sm', 'icon' => 'plus']); ?>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-limited small">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('day_off_type_id', __('Type')); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th><?php echo $this->Paginator->sort('start', __('Start')); ?></th>
						<th><?php echo $this->Paginator->sort('end', __('End')); ?></th>
						<th><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($dayOffs as $dayOff) : ?>
						<tr>
							<td><?php echo h($dayOff['DayOffType']['type']); ?>&nbsp;</td>
							<td>
								<?php echo $this->Html->link($dayOff['User']['lastname'], [
									'controller' => 'users',
									'action' => 'view',
									$dayOff['User']['id'],
								]); ?>
							</td>
							<td>
								<time><?php echo h($dayOff['DayOff']['date_start']); ?></time>
							</td>
							<td>
								<time><?php echo h($dayOff['DayOff']['date_end']); ?></time>
							</td>
							<td>
								<div class="btn-group-nowrap">
									<?php echo $this->Element->btnLinkView($dayOff['DayOff']['id']); ?>
									<?php echo $this->Element->btnLinkEdit($dayOff['DayOff']['id']); ?>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php
		echo $this->element('pagination/paging');
		echo $this->element('pagination/pagination');
		?>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<div id="calendar" class="calendar"
					 data-events="<?php echo $this->Html->url(['action' => 'calendar', 'admin' => false]); ?>"></div>
				<script>
					$(document).on('ready', function () {
						$('.calendar').each(function () {
							var events = $(this).attr('data-events');

							$(this).fullCalendar({
								events: {
									type: 'post',
									url: events,
									error: function () {
										alert('there was an error while fetching events!');
									}
								},
								header: {
									left: 'prev,next today',
									center: 'title',
									right: 'month, basicWeek, basicDay'
								}
							})

						})
					});

					$('.calendar-events').on('shown.bs.tab', function (e) {
						var calendar = $(this).attr('data-calendar');
						$(calendar).fullCalendar('render');
					});
				</script>
			</div>
		</div>
	</div>
</div>
