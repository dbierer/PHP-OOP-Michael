<?php
class ElectricCar extends Car {
    public $battery;

    public function __construct($make, $year, $color, $model, $battery) {
        parent::__construct($make, $year, $color, $model);
        $this->battery = $battery;
    }

    public function checkBattery() {
        return "The electric car has a battery % of {$this->battery}%.\n";
    }

    public function charge() {
        return "Charging the electric car.\n";
    }
}
