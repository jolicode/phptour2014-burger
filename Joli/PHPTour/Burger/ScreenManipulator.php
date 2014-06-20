<?php

namespace Joli\PHPTour\Burger;

use Symfony\Component\Console\Output\OutputInterface;

class ScreenManipulator
{
    protected $backgroundColor;
    protected $foregroundColor;
    protected $textAttributes;
    protected $output;

    const ATTRIBUTES_OFF = 0;
    const ATTRIBUTES_BOLD = 1;
    const ATTRIBUTES_UNDERSCORE = 4;
    const ATTRIBUTES_BLINK = 5;
    const ATTRIBUTES_REVERSE = 7;
    const ATTRIBUTES_CONCEALED = 8;

    const FOREGROUND_BLACK = 30;
    const FOREGROUND_RED = 31;
    const FOREGROUND_GREEN = 32;
    const FOREGROUND_YELLOW = 33;
    const FOREGROUND_BLUE = 34;
    const FOREGROUND_MAGENTA = 35;
    const FOREGROUND_CYAN = 36;
    const FOREGROUND_WHITE = 37;

    const BACKGROUND_BLACK = 40;
    const BACKGROUND_RED = 41;
    const BACKGROUND_GREEN = 42;
    const BACKGROUND_YELLOW = 43;
    const BACKGROUND_BLUE = 44;
    const BACKGROUND_MAGENTA = 45;
    const BACKGROUND_CYAN = 46;
    const BACKGROUND_WHITE = 47;

    public function __construct(OutputInterface $output) {
        $this->output = $output;
        $this->output->write("\033[;;J");
    }

    public function clearScreen() {
        $this->output->write("\033[2J");
    }

    public function getColumns() {
        exec('tput cols', $columns);
        return $columns[0];
    }

    public function getLines() {
        exec('tput lines', $lines);
        return $lines[0];
    }

    public function moveCursor($x, $y) {
        $this->output->write("\033[$y;$x"."H");
    }

    public function setBackgroundColor($color) {
        $this->backgroundColor = $color;
        $this->output->write("\033[;".$color."m");
    }

    public function setForegroundColor($color) {
        $this->foregroundColor = $color;
        $this->output->write("\033[;".$color."m");
    }

    public function setTextAttributes($attribute) {
        $this->textAttributes = $attribute;
        $this->output->write("\033[;".$attribute."m");
    }

    public function write($text) {
        $this->output->write($text);
    }
}
