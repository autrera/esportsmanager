<?php
    App::uses('utilities', 'Lib');
    $url = utilities::getUrl();
?>
<div class = "share-box">
	<div class="fb-like" data-href="<?php echo $url; ?>" data-send="true" data-layout="box_count" data-width="450" data-show-faces="false"></div>
</div>