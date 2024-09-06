<?php

namespace DevCoder\Console\Argument;

final class CommandArgument
{
    private string $name;
    private bool $isRequired;
    private $defaultValue;
    private ?string $description;

    public function __construct(string $name, bool $isRequired = false, $defaultValue = null, ?string $description = null)
    {
        $this->name = $name;
        $this->isRequired = $isRequired;
        $this->defaultValue = $defaultValue;
        $this->description = $description;
    }

    public function validate($value): void
    {
        if ($this->isRequired && (empty($value))) {
            throw new \InvalidArgumentException("L'argument requis '{$this->name}' n'a pas été fourni.");
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isRequired(): bool
    {
        return $this->isRequired;
    }

    /**
     * @return mixed|null
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

}