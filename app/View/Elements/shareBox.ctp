<?php
    App::uses('utilities', 'Lib');
    $url = utilities::getUrl();
?>
<div class = "share-box">
	<span>
		<div class="fb-like" data-href="<?php echo $url; ?>" data-send="false" data-layout="button_count" data-width="80" data-show-faces="false"></div>
	</span>

	<span>
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url; ?>" data-via="teamquetzal">
			Tweet
		</a>
		<script>
			!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
		</script>
	</span>

	<span>
		<!-- Place this tag where you want the +1 button to render -->
		<g:plusone href="<?php echo $url; ?>"></g:plusone>

		<!-- Place this render call where appropriate -->
		<script type="text/javascript">
		  (function() {
		    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		    po.src = 'https://apis.google.com/js/plusone.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>
	</span>
</div>