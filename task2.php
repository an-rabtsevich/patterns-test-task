<?php

/** defines methods of  Robot class*/
interface HypotheticalRobotPrototype
{
    public function __construct($size, $levelOfIntelligence, $powerConsumption, $batteryCapacity, $batteryOperatingTime);
    public function setSize($size);
    public function getSize();
    public function setLevelOfIntelligence($levelOfIntelligence);
    public function getLevelOfIntelligence();
    public function setPowerConsumption($powerConsumption);
    public function getPowerConsumption();
    public function setBatteryCapacity($batteryCapacity);
    public function getBatteryCapacity();
    public function setBatteryOperatingTime($batteryOperatingTime);
    public function getBatteryOperatingTime();
}

/** creates a robot  */
class Robot implements HypotheticalRobotPrototype
{
    private $size;
    private $levelOfIntelligence;
    private $powerConsumption;
    private $batteryCapacity;
    private $batteryOperatingTime;

    public function __construct($size, $levelOfIntelligence, $powerConsumption, $batteryCapacity, $batteryOperatingTime)
    {
        $this->size = $size;
        $this->levelOfIntelligence = $levelOfIntelligence;
        $this->powerConsumption = $powerConsumption;
        $this->batteryCapacity = $batteryCapacity;
        $this->batteryOperatingTime = $batteryOperatingTime;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setLevelOfIntelligence($levelOfIntelligence)
    {
        $this->levelOfIntelligence = $levelOfIntelligence;
    }

    public function getLevelOfIntelligence()
    {
        return $this->levelOfIntelligence;
    }

    public function setPowerConsumption($powerConsumption)
    {
        $this->powerConsumption = $powerConsumption;
    }

    public function getPowerConsumption()
    {
        return $this->powerConsumption;
    }

    public function setBatteryCapacity($batteryCapacity)
    {
        $this->batteryCapacity = $batteryCapacity;
    }

    public function getBatteryCapacity()
    {
        return $this->batteryCapacity;
    }

    public function setBatteryOperatingTime($batteryOperatingTime)
    {
        $this->batteryOperatingTime = $batteryOperatingTime;
    }

    public function getBatteryOperatingTime()
    {
        return $this->batteryOperatingTime;
    }
}

$robot = new Robot('1.5 m', 'High', '1200 KWh', '4800 mAh', '5 days');

$robot2 = clone $robot;
$robot3 = clone $robot;
$robot4 = clone $robot;

$robot2->setSize('1.1 m');
$robot3->setLevelOfIntelligence('Low');
$robot4->setBatteryOperatingTime('3 days');

echo "Robot: \n";
var_dump($robot->getSize());
var_dump($robot->getLevelOfIntelligence());
var_dump($robot->getBatteryOperatingTime());

echo "Robot 2: \n";
var_dump($robot2->getSize());
echo "Robot 3: \n";
var_dump($robot3->getLevelOfIntelligence());
echo "Robot 4: \n";
var_dump($robot4->getBatteryOperatingTime());

?>