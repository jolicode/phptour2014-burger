<?php
namespace Joli\PHPTour\Burger\Animation;

use Joli\PHPTour\Burger\ScreenManipulator;
use Joli\PHPTour\Burger\Ascii\Loader;

class Sequence
{
    protected $manipulator;
    protected $loader;

    public function __construct(ScreenManipulator $manipulator, Loader $loader) {
        $this->manipulator = $manipulator;
        $this->loader = $loader;
    }

    public function initScreen() {
        $this->manipulator->clearScreen();
    }

    public function run() {
        while (1) {
            if (rand(0, 2) < 1) {
                $ascii = $this->loader->load('jolicode');
                $moving = new Moving($this->manipulator, $ascii);
                $moving->run();
            } else {
                $ascii = $this->loader->load('logos');
                $fullscreen = new Fullscreen($this->manipulator, $ascii);
                $fullscreen->run();
            }
        }
    }
}

