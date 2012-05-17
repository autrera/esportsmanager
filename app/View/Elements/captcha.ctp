<?php

    require_once ROOT . DS . APP_DIR . DS . 'Lib' . DS . 'recaptchalib.php';
    $publickey = "6Lc-kNESAAAAANHFTWIpAYmrC82FdpId0C8rQB-w"; 
    // you got this from the signup page
    echo recaptcha_get_html($publickey);

?>