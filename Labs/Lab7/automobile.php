<?php
// Step 3: Add a constructor with type hint for VehicleInterface
class Automobile implements VehicleInterface {
    // Properties
    public $make;
    protected $year;
    protected $color;
    private $model;

    // Constructor with type hint for VehicleInterface
    public function __construct(VehicleInterface $vehicle, $make, $year, $color, $model) {
        $this->vehicle = $vehicle;
        $this->make = $make;
        $this->year = $year;
        $this->color = $color;
        $this->model = $model;
    }

    public function startEngine() {
        return "Starting the {$this->year} {$this->make} {$this->model}'s engine.\n";
    }

    public function accelerate() {
        return "The vehicle is accelerating.\n";
    }

    public function brake() {
        return "The vehicle is braking.\n";
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    public function __toString() {
        return "{$this->year} {$this->make} {$this->model}";
    }
}
