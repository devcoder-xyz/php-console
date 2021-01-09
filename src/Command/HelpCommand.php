<?php


namespace DevCoder\Console\Command;


use DevCoder\Console\InputInterface;
use DevCoder\Console\Output;

class HelpCommand implements CommandInterface
{
    /**
     * @var CommandInterface[]
     */
    private $commands;

    public function getName(): string
    {
        return 'help';
    }

    public function getDescription(): string
    {
        return 'Lists commands';
    }

    public function execute(InputInterface $input)
    {
        $output = new Output();
        $output->write('Available commands:', 'blue');
        $output->write(\PHP_EOL);
        foreach ($this->commands as $command) {
            $output->write(sprintf('  %s : ', $command->getName()), 'green');
            $output->write(sprintf('  %s  ', $command->getDescription()), 'white');
            $output->write(\PHP_EOL);
        }
    }

    /**
     * @param CommandInterface[] $commands
     */
    public function setCommands(array $commands)
    {
        $this->commands = $commands;
    }
}