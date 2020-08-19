<?php

namespace Ahada\WordPress\Services;

abstract class RegisterService
{
    /**
     * save all register
     * 
     * @var array
     */
    protected $registers;

    /**
     * Set iRegister class implemented into $registers variable
     * 
     * @return void
     */
    abstract function setRegister();

    /**
     * Create new instance from RegisterService
     * 
     * @return void
     */
    public function __construct()
    {
        $this->setRegister();
    }

    /**
     * Return only class implemented by iRegister interface
     * 
     * @return array
     */
    public function getRegisters()
    {
        $passed = array();
        foreach ($this->registers as $class) {
            if(array_key_exists(\Ahada\WordPress\Contracts\iRegister::class, class_implements($class))) {
                $passed[] = $class;
            }
        }
        return $passed;
    }
}
