<?php
if (is_file($_SERVER['DOCUMENT_ROOT'] . $profilePic)){
	echo '<img src = "/files/view/profiles/' . $profileId . '/' . $size . '/picture">';
} else {
	echo '<img src = "/img/anonymous-user-gravatar.png">';
}
?>