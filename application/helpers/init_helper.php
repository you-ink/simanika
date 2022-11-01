<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if(!function_exists('get_views')) {
    function get_views($text)
    {
      return APPPATH.'views/'.$text.'.php';
    }
}

if (!function_exists('stylesheet')) {

    function stylesheet($css, $folder = NULL, $location = 'assets/') {
        $output = NULL;
        if (is_array($css)) {
            foreach ($css as $file) {
                $output .= link_tag($location . $folder . $file);
            }
        } else {
            $output .= link_tag($location . $folder . $css);
        }
        return $output;
    }

}

if (!function_exists('script')) {

    function script($js, $folder = NULL, $location = 'assets/') {
        $output = NULL;
        if (is_array($js)) {
            foreach ($js as $file) {

                $output .= '<script type="text/javascript" src="' . base_url() . $location . $folder . $file . '"></script>';
            }
        } else {
            $output .= '<script type="text/javascript" src="' . base_url() . $location . $folder . $js . '" defer></script>';
        }
        return $output;
    }

}

if(!function_exists('slugify')) {
    function slugify($text)
    {
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      $text = preg_replace('~[^-\w]+~', '', $text);

      $text = trim($text, '-');

      $text = preg_replace('~-+~', '-', $text);

      $text = strtolower($text);

      return $text;
    }
}