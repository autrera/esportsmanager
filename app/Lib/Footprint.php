<?php

class Footprint
{
    public static function script($file, $attrs = array())
    {
        $attrs['src']  = self::fileFootPrint($file);
        $attrs['type'] = 'text/javascript';
        return self::file('script', $attrs);
    }

    public static function css($file, $attrs = array())
    {
        $attrs['href'] = self::fileFootPrint($file);
        $attrs['rel']  = 'stylesheet';
        $attrs['type'] = 'text/css';
        return self::file('stylesheet', $attrs);
    }

    protected static function file($type, $attrs = array())
    {
        $attr_string = '';
        foreach ($attrs as $key => $attr) {
            $attr_string .= $key.'="'.$attr.'" ';
        }
        switch ($type) {
            case 'script':
                $html = '<script '.$attr_string.'></script>';
                break;

            case 'stylesheet':
                $html = '<link '.$attr_string.'>';
                break;

            default:
                # code...
                break;
        }
        return $html;
    }

    protected static function fileFootPrint($file)
    {
        $parts = explode('.', $file);
        $file = $parts[0].'.'.filemtime(ROOT.DS.APP_DIR.DS.WEBROOT_DIR.$file).'.'.$parts[1];
        return $file;
    }
}
