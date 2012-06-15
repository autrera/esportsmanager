<?php
if (is_file($_SERVER['DOCUMENT_ROOT'] . $profilePic)){
	echo '<img src = "'. $profilePic . '">';
} else {
	echo '<img src = "/img/anonymous-user-gravatar.png">';
}
?>