<?php

namespace DevCoder\Console;

interface OutputInterface
{
    public function write(string $message, ?string $color = null, ?string $background = null): void;

    public function success(string $message): void;

    public function error(string $message): void;

    public function warning(string $message): void;
}
