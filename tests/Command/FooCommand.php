<?php

namespace Test\DevCoder\Console\Command;

use DevCoder\Console\Argument\CommandArgument;
use DevCoder\Console\Command\CommandInterface;
use DevCoder\Console\InputInterface;
use DevCoder\Console\Option\CommandOption;

class FooCommand implements CommandInterface
{
    public function getName(): string
    {
        return 'foo';
    }

    public function getDescription(): string
    {
        return 'Performs the foo operation with optional parameters.';
    }

    public function getOptions(): array
    {
        return [
            new CommandOption('verbose', 'v', 'Enable verbose output', true),
            new CommandOption('output', 'o', 'Specify output file', false)
        ];
    }

    public function getArguments(): array
    {
        return [
            new CommandArgument('input', 'The input file for the foo operation', true)
        ];
    }

    public function execute(InputInterface $input): void
    {
        // Foo command execution logic
    }
}