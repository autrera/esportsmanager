<?php

	require '../Lib/lessphp/lessc.inc.php';

	$less = new lessc('css/bootstrap.less');
	file_put_contents('css/default.css', $less->parse());

?>