<?php

namespace Ahada\WordPress\Models;

use Ahada\WordPress\Contracts\iRegister;

abstract class Optional implements iRegister
{
    /**
     * @var array
     */
    protected $options;

    /**
     * Register all options
     * 
     * @return void
     */
    abstract function registerOptions();

    public function __construct()
    {
        $this->registerOptions();
    }
}
