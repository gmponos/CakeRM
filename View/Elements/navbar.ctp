<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar-top">
    <?php if ($this->Auth->isLoggedIn()) : ?>
		<div class="container-fluid">
			<?php
			$group = $this->Auth->group('name');
			echo $this->element("navbars/$group");
			?>
		</div>
	<?php endif; ?>
</nav>