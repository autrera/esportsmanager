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
        return self::file('link', $attrs);
    }

    public static function icon($file, $attrs = array())
    {
        $attrs['href'] = self::fileFootPrint($file);
        $attrs['rel']  = 'shortcut icon';
        $attrs['type'] = 'image/x-icon';
        return self::file('link', $attrs);
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

            case 'link':
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
        $extension = array_pop($parts);
        $file = implode('.', $parts).'.'.filemtime(ROOT.DS.APP_DIR.DS.WEBROOT_DIR.$file).'.'.$extension;
        return $file;
    }
}
