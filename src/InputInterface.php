<?php

namespace DevCoder\Console;

interface InputInterface
{
    public function getCommandeName(): ?string;

    public function getOptions(): array;
}
