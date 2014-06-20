<?php

namespace Joli\PHPTour\Burger\Animation;

use Joli\PHPTour\Burger\ScreenManipulator;

class Moving extends AbstractAnimation
{
    public function run() {
        $this->manipulator->setBackgroundColor(ScreenManipulator::BACKGROUND_BLACK);
        $this->manipulator->setForegroundColor(ScreenManipulator::FOREGROUND_YELLOW);
        $width = $this->getWidth();
        $height = $this->getHeight();

        $columns = $this->manipulator->getColumns() - $width;
        $lines = $this->manipulator->getLines() - $height;

        $column = rand(0, $columns);
        $line = rand(0, $lines);

        $changes = 0;
        $xProgress = 1;
        $yProgress = 1;

        while ($changes < 4) {
            $this->manipulator->clearScreen();
            $this->showAscii($line, $column);

            usleep(50000);

            if ($line >= $lines) {
                $yProgress = -1;
                $changes++;
            } else if ($line <= 0) {
                $yProgress = 1;
                $changes++;
            }

            if ($column >= $columns) {
                $xProgress = -1;
            } else if ($column <= 0) {
                $xProgress = 1;
            }

            $column += $xProgress;
            $line += $yProgress;
        }
    }
}
