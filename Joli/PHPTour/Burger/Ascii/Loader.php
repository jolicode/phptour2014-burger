<?php

namespace Joli\PHPTour\Burger\Ascii;

class Loader
{
    protected $sourceDir;

    public function __construct($sourceDir) {
        $this->sourceDir = $sourceDir;
    }

    public function load($key) {
        $file = $this->getOneFile($key);
        return explode("\n", file_get_contents($file));
    }

    public function getOneFile($key) {
        $file = $this->sourceDir.'/'.$key;

        if (is_dir($file)) {
            $files = glob($file.'/*.*');
            $file = $files[array_rand($files)];
        }

        return $file;
    }
}
