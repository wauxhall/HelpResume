<?php

namespace App\Registry;

use App\Contracts\DataCollectorInterface;

class DataCollectorsRegistry
{
    protected $collectors = [];

    public function register(string $name, DataCollectorInterface $instance): self
    {
        $this->collectors[$name] = $instance;
        return $this;
    }

    public function get(string $name)
    {
        $collectorInstance = null;

        if (array_key_exists($name, $this->collectors)) {
            $collectorInstance = $this->collectors[$name];
        } else {
            throw new \Exception("Invalid data collector type '" . $name . "'");
        }

        return $collectorInstance;
    }
}
