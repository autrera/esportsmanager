<?php
?>
<div class = "user-social-links">
	<?php
		if ($facebook_id){
			echo $this->element('socialLink', array(
				'linkHref' => 'http://www.facebook.com/' . $facebook_id,
				'imgSrc' => '/img/social/facebook.png',
			));
		}
		if ($twitter_id){
			echo $this->element('socialLink', array(
				'linkHref' => 'http://www.twitter.com/' . $twitter_id,
				'imgSrc' => '/img/social/twitter.png',
			));
		}
		if ($gplus_id){
			echo $this->element('socialLink', array(
				'linkHref' => 'http://plus.google.com/' . $gplus_id,
				'imgSrc' => '/img/social/googleplus.png',
			));
		}
	?>
</div>