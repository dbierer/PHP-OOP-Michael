<?php
include_once 'Trait1.php';
include_once 'Trait2.php';

class carTraits extends Automobile {
    use Trait1, Trait2 {
        Trait1::commonMethod insteadof Trait2;
        Trait2::method2 insteadof Trait1;
    }

    public function electricCar() {
        return new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
    }

    public function accelerates() {
        return "The car is accelerating.\n";
    }
}
