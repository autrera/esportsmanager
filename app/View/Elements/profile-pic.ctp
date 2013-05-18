<?php
    if (is_file($_SERVER['DOCUMENT_ROOT'] . $profilePic)){
    	$picImage = $profilePic;
    } else {
    	$picImage = '/img/anonymous-user-gravatar.png';
    }
?>
<img
    class="lazy resrc"
    src="<?php echo FULL_BASE_URL; ?>/img/grey.jpg"
    data-original="<?php echo FULL_BASE_URL.$picImage; ?>"
    alt="">
