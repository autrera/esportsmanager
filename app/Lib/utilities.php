<?php

class utilities
{

    public static function formatDate($date, $format = 'd/m/Y'){
        return date($format, strtotime($date));
    }
    
    public static function tokenTruncate($string, $your_desired_width) {
        $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
        $parts_count = count($parts);
        $length = 0;
        $last_part = 0;
        for (; $last_part < $parts_count; ++$last_part) {
            $length += strlen($parts[$last_part]);
            if ($length > $your_desired_width) { break; }
        }
        return implode(array_slice($parts, 0, $last_part));
    }

    public static function getUrl(){
        $values = explode('//', $_SERVER['HTTP_REFERER']);
        $protocol = $values[0];
        return $protocol. '//' . $_SERVER['HTTP_HOST'] . 
            $_SERVER['REQUEST_URI'];
    }

    public static function validateCaptcha(){
        if (   isset($_POST["recaptcha_challenge_field"])
            && isset($_POST["recaptcha_response_field"])
        ){
            require_once 
                ROOT . DS . APP_DIR . DS . 'Lib' . DS . 'recaptchalib.php';
            $privatekey = "6Lc-kNESAAAAALHj2G98OYu4BNam61g-nsQWPiqj";
            $resp = recaptcha_check_answer (
                $privatekey,
                $_SERVER["REMOTE_ADDR"],
                $_POST["recaptcha_challenge_field"],
                $_POST["recaptcha_response_field"]
            );
            return $resp;
        }
    }
}

?>