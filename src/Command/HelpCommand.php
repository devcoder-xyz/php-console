<?php


namespace DevCoder\Console\Command;


use DevCoder\Console\InputInterface;
use DevCoder\Console\Output;

class HelpCommand implements CommandInterface
{
    /**
     * @var CommandInterface[]
     */
    private array $commands;

    public function getName(): string
    {
        return 'help';
    }

    public function getDescription(): string
    {
        return 'Displays a list of available commands and their descriptions.';
    }

    public function execute(InputInterface $input): void
    {
        $output = new Output();
        $output->write('List of Available Commands:', 'blue');
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

    public function getOptions(): array
    {
        return [];
    }

    public function getArguments(): array
    {
        return [];
    }
}