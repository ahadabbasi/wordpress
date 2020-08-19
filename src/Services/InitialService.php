<?php

namespace Ahada\WordPress\Services;

abstract class InitialService 
{
    protected static abstract function  getServiceContainers();

    public static function registerServices()
    {
        if(is_array(static::getServiceContainers())) {
            foreach (static::getServiceContainers() as $class) {
                if (array_key_exists(\Ahada\WordPress\Services\RegisterService::class, class_parents($class))) {
                    $class = self::createInstance($class);
                    foreach ($class->getRegisters() as $service) {
                        $service = self::createInstance($service);
                        $service->register();
                    }
                }
            }
        }
    }

    protected static function createInstance($class)
    {
        return new $class;
    }
}
