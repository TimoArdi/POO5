<?php

require_once 'Vehicle.php';
require_once 'LightableInterface.php';
class Car extends Vehicle implements LightableInterface
{
const ALLOWED_ENERGIES =[
    'fuel',
    'electric',
];
    /**
     * @var boolean
     */
    private $hasParkBrake = false ;

    /**
     * @return
     */
    public function isHasParkBrake(): string
    {
        $msg = '';
        if($this->hasParkBrake === false){
            $msg = 'Il n\'a pas de frein à main';
        }else {
            $msg = 'Le frein à main est levé';
        }
        return $msg;
    }

    /**
     * @param bool $hasParkBrake
     */
    public function setParkBrake(bool $hasParkBrake): void
    {
        $this->hasParkBrake = $hasParkBrake;
    }
    /**
     * @var string
     */
    private $energy;

    /**
     * @var int
     */
    private $energyLevel;

    public function __construct(string $color, int $nbSeats, string $energy)
    {
        parent::__construct($color, $nbSeats);
        $this->setEnergy($energy);
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): Car
    {
        if (in_array($energy, self::ALLOWED_ENERGIES)) {
            $this->energy = $energy;
        }
        return $this;
    }

    public function getEnergyLevel(): int
    {
        return $this->energyLevel;
    }

    public function setEnergyLevel(int $energyLevel): void
    {
        $this->energyLevel = $energyLevel;
    }
    public function start(){
        $this-> currentSpeed = 0;
        if($this->hasParkBrake === true){
            throw new Exception('TU AS LE FREIN A MAIN');
        }
        return 'start the engine';
    }

    public function switchOn(): bool
    {
        return true;
    }
    public function switchOff(): bool
    {
        return false;
    }
}

