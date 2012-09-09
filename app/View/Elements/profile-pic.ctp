<?php
    if (is_file($_SERVER['DOCUMENT_ROOT'] . $profilePic)){
    	$picImage = '/files/view/profiles/' . $profileId . '/' . $size . '/picture';
    } else {
    	$picImage = '/img/anonymous-user-gravatar.png';
    }
?>
<img
    class="lazy resrc"
    src="http://app-us.resrc.it/<?php echo FULL_BASE_URL; ?>/img/grey.jpg"
    data-original="http://app-us.resrc.it/<?php echo FULL_BASE_URL.$picImage; ?>"
    alt="">
