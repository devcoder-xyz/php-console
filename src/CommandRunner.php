<?php


namespace DevCoder\Console;


use DevCoder\Console\Command\CommandInterface;
use DevCoder\Console\Command\HelpCommand;

class CommandRunner
{
    /**
     * @var CommandInterface[]
     */
    private array $commands = [];

    /**
     * @var CommandInterface
     */
    private CommandInterface $defaultCommand;

    /**
     * Application constructor.
     * @param CommandInterface[] $commands
     */
    public function __construct(array $commands)
    {
        $this->defaultCommand = $help = new HelpCommand();
        $this->commands = array_merge($commands, [$this->defaultCommand]);
        $this->defaultCommand ->setCommands($this->commands);
    }

    public function run(InputInterface $input) : void
    {

        try  {

            if ($input->getCommandName() === null) {
                $this->defaultCommand->execute($input);
                return;
            }

            $command = null;
            foreach ($this->commands as $currentCommand) {
                if ($currentCommand->getName() === $input->getCommandName()) {
                    $command = $currentCommand;
                    break;
                }
            }

            if ($command === null) {
                throw new \InvalidArgumentException(sprintf('Command "%s" is not defined.', $input->getCommandName()));
            }

            $command->execute($input);

        }catch (\Throwable $e) {
            (new Output())->error($e->getMessage());
        }

    }
}
