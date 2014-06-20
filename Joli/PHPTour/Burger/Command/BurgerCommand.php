<?php

namespace Joli\PHPTour\Burger\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Joli\PHPTour\Burger\Animation\Sequence;
use Joli\PHPTour\Burger\ScreenManipulator;
use Joli\PHPTour\Burger\Ascii\Loader;

class BurgerCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('burger')
            ->setDescription('Gimme a burger')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manipulator = new ScreenManipulator($output);
        $loader = new Loader(__DIR__.'/../Resources/ascii');

        $animation = new Sequence($manipulator, $loader);
        $animation->initScreen();

        $animation->run();
    }
}
