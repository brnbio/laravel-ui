<?php

declare(strict_types=1);

namespace Brnbio\LaravelUi;

use Brnbio\LaravelUi\Console\Commands\UiCommand;
use Illuminate\Support\ServiceProvider;

/**
 * Class UiServiceProvider
 * @package Brnbio\LaravelUi
 */
class UiServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->_registerCommands();
    }

    /**
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * @return $this
     */
    private function _registerCommands(): self
    {
        $this->commands(UiCommand::class);

        return $this;
    }
}
