<?php
class Van extends Automobile {
    public function electricCar() {
        return new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
    }

    public function breaks() {
        return "The van is breaking.\n";
    }
}
