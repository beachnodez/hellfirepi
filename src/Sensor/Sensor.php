<?php

namespace Hellfire\Sensor;


abstract class Sensor implements SensorInterface
{
    protected $value;
    protected $measureUnit;
    protected $measureSuffix;
    protected $description;

    public function getValue() {
        return $this->value;
    }

    public function getMeasureUnit()
    {
        return $this->measureUnit;
    }

    public function getMeasureSuffix()
    {
        return $this->measureSuffix;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
}