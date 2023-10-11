<?php

//1. Using the code from the previous exercises, add four magic methods, one of which is the magic constructor.
//2. The magic constructor should accept paramteres and set those parameters into the object of instatntiation
//3. Create an index.php file
//4. Load, or autoload, the created classes
//5. Instantiate object instances, and exercise the magic methods implements


class Automobile {
    public $make;
    protected $year;
    protected $color;
    private $model; 

    public function startEngine() {
        echo "Starting the {$this->year} {$this->make} {$this->model}'s engine.\n";
    }

    //Constructor
    public function __construct($make, $year, $color, $model) {
        $this->make = $make;
        $this->year = $year;
        $this->color = $color;
        $this->model = $model;
    }

    //Getter
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    //Setter
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    // __toString
    public function __toString() {
        return "{$this->year} {$this->make} {$this->model}";
    }
}

class Car extends Automobile {
    public function electricCar() {
        return new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
    }
    public function accelerates() {
        echo "The car is accelerating.\n";
    }
}

class Van extends Automobile {
    public function electricCar() {
        return new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
    }
    public function breaks() {
        echo "The van is breaking.\n";
    }
}

class ElectricCar extends Car {
    public $battery;

    // Magic Constructor
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

?>
