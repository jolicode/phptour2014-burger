<?php

namespace Joli\PHPTour\Burger\Animation;

use Joli\PHPTour\Burger\ScreenManipulator;

abstract class AbstractAnimation
{
    protected $manipulator;
    protected $ascii;

    protected $height = null;
    protected $width = null;

    public function __construct(ScreenManipulator $manipulator, $ascii) {
        $this->manipulator = $manipulator;
        $this->ascii = $ascii;
    }

    public function getHeight() {
        if ($this->height === null) {
            $this->height = count($this->ascii);
        }

        return $this->height;
    }

    public function getWidth() {
        if ($this->width === null) {
            $width = 0;

            foreach ($this->ascii as $line) {
                $width = max($width, strlen($line));
            }

            $this->width = $width;
        }

        return $this->width;
    }

    public function showAscii($top, $left) {
        $i = 0;

        while ($i < count($this->ascii)) {
            $vertical = $top + $i;
            $this->manipulator->moveCursor($left, $vertical);
            $this->manipulator->write($this->ascii[$i]);
            $i++;
        }
    }

    abstract public function run();
}
