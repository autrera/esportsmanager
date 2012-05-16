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
}

?>