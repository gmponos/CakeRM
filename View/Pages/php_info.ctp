<?php

ob_start();
phpinfo();
$phpInfo = ob_get_contents();
ob_end_clean();

$phpInfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $phpInfo);
$phpInfo = str_replace(' width="600"', '', $phpInfo);
$phpInfo = str_replace(' cellpadding="3"', '', $phpInfo);
$phpInfo = str_replace(' border="0"', '', $phpInfo);
$phpInfo = str_replace('<table>', '<table class="table table-hover table-striped table-limited">',
	$phpInfo);
?>
<div class="row">
	<div class="container">
		<?php echo $phpInfo; ?>
	</div>
</div>