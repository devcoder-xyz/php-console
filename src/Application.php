<?php


namespace DevCoder\Console;


use DevCoder\Console\Command\CommandInterface;
use DevCoder\Console\Command\HelpCommand;

class Application
{
    /**
     * @var CommandInterface[]
     */
    private $commands = [];

    /**
     * @var CommandInterface
     */
    private $defaultCommand;

    /**
     * Application constructor.
     * @param CommandInterface[]
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

            if ($input->getCommandeName() === null) {
                $this->defaultCommand->execute($input);
                return;
            }

            $command = null;
            foreach ($this->commands as $currentCommand) {
                if ($currentCommand->getName() === $input->getCommandeName()) {
                    $command = $currentCommand;
                    break;
                }
            }

            if ($command === null) {
                throw new \InvalidArgumentException(sprintf('Command "%s" is not defined.', $input->getCommandeName()));
            }

            $command->execute($input);

        }catch (\Throwable $e) {
            (new Output())->error($e->getMessage());
        }

    }
}
