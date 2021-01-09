<?php

namespace DevCoder\Console\Command;

use DevCoder\Console\InputInterface;

interface CommandInterface
{
    public function getName(): string;

    public function getDescription(): string;

    public function execute(InputInterface $input);
}
