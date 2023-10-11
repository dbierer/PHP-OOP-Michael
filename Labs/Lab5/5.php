<?php

// 1. Turn a superclass into an abstract class
// 2. In the abstract superclass, define an inheritable abstract method declaration that will instantiate an object of another class, and returns it.
// 3. Extend the abstract superclass with a concrete subclass implementing the inherited abstract method
// 4. Instantiate a subclass instance
// 5. Call the method and retrieve the object it builds

// Step 1:
abstract class Automobile {
    public $make;
    protected $year;
    protected $color;
    private $model;

    // Step 2:
    abstract protected function electricCar();

    public function startEngine() {
        echo "Starting the {$this->year} {$this->make} {$this->model}'s engine.\n";
    }

    public function __construct($make, $year, $color, $model) {
        $this->make = $make;
        $this->year = $year;
        $this->color = $color;
        $this->model = $model;
    }
}

class Car extends Automobile {
    // Step 3:
    public function electricCar() {
        return new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
    }

    public function accelerates() {
        echo "The car is accelerating.\n";
    }
}

class Van extends Automobile {
    // Step 3:
    public function electricCar() {
        return new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
    }

    public function breaks() {
        echo "The van is breaking.\n";
    }
}

class ElectricCar extends Car {
    public $battery;

    public function __construct($make, $year, $color, $model, $battery) {
        parent::__construct($make, $year, $color, $model);
        $this->battery = $battery;
    }

    public function checkBattery() {
        echo "The electric car has a battery % of {$this->battery}%.\n";
    }

    public function charge() {
        echo "Charging the electric car.\n";
    }
}

// Step 4:
$car = new Car("Toyota", 2023, "Blue", "Camry");

$electricCar = $car->electricCar();

$car->startEngine();
$electricCar->startEngine();

?>
