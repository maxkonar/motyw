<?php

namespace App;

class Helpers{
    public static function print_svg(string $file, string $path = '/assets/svg/')
    {
      echo file_get_contents(get_stylesheet_directory() . $path . $file);
    }
}