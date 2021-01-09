<?php

namespace DevCoder\Console;

class Input implements InputInterface
{
    /**
     * @var string|null
     */
    private $cmdName;

    private $options = [];

    public function __construct(array $argv = null)
    {
        $argv = $argv ?? $_SERVER['argv'] ?? [];
        array_shift($argv);
        $this->cmdName = $argv[0] ?? null;

        foreach ($argv as $key => $value) {
            if ($key === 0) {
                continue;
            }
            
            $it = explode("=", $argv[$key]);
            $this->options[$it[0]] = array_key_exists(1, $it) ? $it[1] : true;
        }
    }

    public function getCommandeName(): ?string
    {
        return $this->cmdName;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
