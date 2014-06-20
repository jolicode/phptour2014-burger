<?php

namespace Joli\PHPTour\Burger\Animation;

use Joli\PHPTour\Burger\ScreenManipulator;

class Fullscreen extends AbstractAnimation
{
    public function run() {
        $this->manipulator->setBackgroundColor(ScreenManipulator::BACKGROUND_BLACK);
        $this->manipulator->setForegroundColor(ScreenManipulator::FOREGROUND_BLUE);

        $width = $this->getWidth();
        $height = $this->getHeight();

        $left = floor(($this->manipulator->getColumns() - $width) / 2);
        $top = floor(($this->manipulator->getLines() - $height) / 2);

        $this->manipulator->clearScreen();
        $this->showAscii($top, $left);

        usleep(2000000);
    }
}
