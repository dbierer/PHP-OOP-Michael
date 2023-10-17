<?php
class Automobile implements VehicleInterface {
    public $make;
    protected $year;
    protected $color;
    private $model;

    public function startEngine() {
        return "Starting the {$this->year} {$this->make} {$this->model}'s engine.\n";
    }

    public function __construct($make, $year, $color, $model) {
        $this->make = $make;
        $this->year = $year;
        $this->color = $color;
        $this->model = $model;
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
