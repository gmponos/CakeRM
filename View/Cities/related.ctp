<div class="table-responsive">
	<table class="table table-hover table-striped small">
		<tr>
			<th><?php echo __('Name');?></th>
			<th><?php echo __('Actions');?></th>
		</tr>
		<?php if (!empty($cities)) :?>
			<?php foreach ($cities as $city) :?>
				<tr>
					<td><?php echo $city['City']['name'];?></td>
					<td><?php echo $this->Element->btnLinkView($city['City']['id']);?></td>					
				</tr>
			<?php endforeach;?>
		<?php endif;?>
	</table>
</div>