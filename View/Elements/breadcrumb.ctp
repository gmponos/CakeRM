<?php
$crumbs = $this->Html->getCrumbs('<span class="breadcrumb-split">»</span>');
if ($crumbs) :
	?>
	<div class="breadcrumb" role="navigation">
		<?php echo $crumbs; ?>
		<p class="pull-right date small hidden-xs"><?php echo date('l jS \of F Y'); ?></p>
	</div>
	<?php
else :
	echo "<h2>$title_for_layout</h2>";
endif;