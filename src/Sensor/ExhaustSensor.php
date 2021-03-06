<?php

namespace Coff\Hellfire\Sensor;

use Coff\DataSource\DataSource;

class ExhaustSensor extends Sensor
{
    const
        RANGE_COLD = 0,
        RANGE_LOW = 1,
        RANGE_NORMAL = 2,
        RANGE_HIGH = 3,
        RANGE_CRITICAL  = 4;

    protected $range;

    public function __construct(DataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function init()
    {
        $this->dataSource->init();
    }

    public function update() {
        $this->dataSource->update();
        $this->value = $currentTemp = $this->dataSource->getValue();

        switch (true) {
            case ($currentTemp <= 70):
                $this->range = self::RANGE_COLD;
                break;
            case ($currentTemp <= 120):
                $this->range = self::RANGE_LOW;
                break;
            case ($currentTemp <= 180):
                $this->range = self::RANGE_NORMAL;
                break;
            case ($currentTemp <= 250):
                $this->range = self::RANGE_HIGH;
                break;
            case ($currentTemp > 250):
                $this->range = self::RANGE_CRITICAL;
                break;
        }
    }

    public function getRange() {
        return $this->range;
    }
}
