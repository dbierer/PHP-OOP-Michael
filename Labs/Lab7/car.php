<?php
class Car extends Automobile {
    // 4. Instatiate an object from one of your previous subclasses.
    public function electricCar() {
        return new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
    }

    public function accelerates() {
        return "The car is accelerating.\n";
    }
}
