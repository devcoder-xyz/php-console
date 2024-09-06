<?php

namespace DevCoder\Console;

class Output implements OutputInterface
{
    const FOREGROUND_COLORS = [
        'black' => '0;30',
        'dark_gray' => '1;30',
        'green' => '0;32',
        'light_green' => '1;32',
        'red' => '0;31',
        'light_red' => '1;31',
        'yellow' => '0;33',
        'light_yellow' => '1;33',
        'blue' => '0;34',
        'dark_blue' => '0;34',
        'light_blue' => '1;34',
        'purple' => '0;35',
        'light_purple' => '1;35',
        'cyan' => '0;36',
        'light_cyan' => '1;36',
        'light_gray' => '0;37',
        'white' => '1;37',
    ];

    const BG_COLORS = [
        'black' => '40',
        'red' => '41',
        'green' => '42',
        'yellow' => '43',
        'blue' => '44',
        'magenta' => '45',
        'cyan' => '46',
        'light_gray' => '47',
    ];

    /**
     * {@inheritdoc}
     */
    public function write(string $message, ?string $color = null, ?string $background = null): void
    {
        $formattedMessage = '';

        if ($color) {
            $formattedMessage .= "\033[" . static::FOREGROUND_COLORS[$color] . 'm';
        }
        if ($background) {
            $formattedMessage .= "\033[" . static::BG_COLORS[$background] . 'm';
        }

        $formattedMessage .= $message . "\033[0m";

        fwrite(STDOUT, $formattedMessage);
    }

    public function writeln(string $message): void
    {
        $this->write($message);
        $this->write(\PHP_EOL);
    }


    /**
     * {@inheritdoc}
     */
    public function success(string $message): void
    {
        $this->write(sprintf('[OK] %s', $message), 'white', 'green');
        $this->write(\PHP_EOL);
    }

    /**
     * {@inheritdoc}
     */
    public function error(string $message): void
    {
        $this->write(sprintf('[ERROR] %s', $message), 'white', 'red');
        $this->write(\PHP_EOL);
    }

    /**
     * {@inheritdoc}
     */
    public function warning(string $message): void
    {
        $this->write(sprintf('[WARNING] %s', $message), 'white', 'yellow');
        $this->write(\PHP_EOL);
    }
}
