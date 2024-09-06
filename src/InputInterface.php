<?php

namespace DevCoder\Console;

interface InputInterface
{
    public function getCommandName(): ?string;
    public function getOptions(): array;
    public function getArguments(): array;
}
