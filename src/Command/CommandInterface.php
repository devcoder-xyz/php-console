<?php

namespace DevCoder\Console\Command;

use DevCoder\Console\Argument\CommandArgument;
use DevCoder\Console\InputInterface;
use DevCoder\Console\Option\CommandOption;

interface CommandInterface
{
    /**
     * Returns the name of the command.
     *
     * @return string The name of the command.
     */
    public function getName(): string;

    /**
     * Returns the description of the command.
     *
     * @return string The description of the command.
     */
    public function getDescription(): string;

    /**
     * Returns the list of available options for the command.
     *
     * @return array<CommandOption> An array of CommandOption.
     */
    public function getOptions(): array;

    /**
     * Returns the list of required arguments for the command.
     *
     * @return array<CommandArgument> An array of CommandArgument.
     */
    public function getArguments(): array;

    /**
     * Executes the command with the provided inputs.
     *
     * @param InputInterface $input The inputs for the command.
     * @return void
     * @throws \InvalidArgumentException If arguments or options are invalid.
     * @throws \RuntimeException If an error occurs during execution.
     */
    public function execute(InputInterface $input): void;
}
