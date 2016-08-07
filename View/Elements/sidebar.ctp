<?php
if ($this->Auth->isLoggedIn()) :
	$group = $this->Auth->group('name');
	?>
	<div class="collapse navbar-collapse" id="sidebar-collapse">
		<aside id="sidebar" class="sidebar sidebar-left sidebar-inverse">
			<?php echo $this->element("sidebars/$group"); ?>
		</aside>
	</div>
	<?php
endif;
