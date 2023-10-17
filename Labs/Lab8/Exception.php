<?php

// Step 1: Create a custom exception class with a constructor that accepts parameters.
class CustomException extends Exception {
    // Step 2: Call the parent Exception constructor.
    public function __construct($message, $code = 0, Exception $previous = null) {
        // Step 3: Add some new functionality in the custom exception constructor.
        $message = "Custom Exception: " . $message;
        parent::__construct($message, $code, $previous);
    }
}

//Testing output variables
$engineMessage = '';
$acceleratesMessage = '';
$breaksMessage = '';
$checkBatteryMessage = '';
$chargeMessage = '';
$caughtCustomExceptionMessage = '';
$caughtExceptionMessage = '';
$finallyMessage = '';

abstract class Automobile {
    public $make;
    protected $year;
    protected $color;
    private $model;

    abstract protected function electricCar();

    public function startEngine() {
        global $engineMessage;
        $engineMessage = "Starting the {$this->year} {$this->make} {$this->model}'s engine.\n";
    }

    public function __construct($make, $year, $color, $model) {
        $this->make = $make;
        $this->year = $year;
        $this->color = $color;
        $this->model = $model;
    }
}

class Car extends Automobile {
    public function electricCar() {
        $electricCar = new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
        return $electricCar;
    }

    public function accelerates() {
        global $acceleratesMessage;
        $acceleratesMessage = "The car is accelerating.\n";
    }
}

class Van extends Automobile {
    public function electricCar() {
        $electricCar = new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
        return $electricCar;
    }

    public function breaks() {
        global $breaksMessage;
        $breaksMessage = "The van is breaking.\n";
    }
}

class ElectricCar extends Car {
    public $battery;

    public function __construct($make, $year, $color, $model, $battery) {
        parent::__construct($make, $year, $color, $model);
        $this->battery = $battery;
    }

    public function checkBattery() {
        global $checkBatteryMessage;
        $checkBatteryMessage = "The electric car has a battery % of {$this->battery}%.\n";
    }

    public function charge() {
        global $chargeMessage;
        $chargeMessage = "Charging the electric car.\n";
    }
}

try {
    // Step 4: Add a try/catch/catch/finally block set.
    
    // Step 5: In the try portion, throw an instance of the Exception object and an instance of the custom exception class.
    throw new Exception("This is a regular Exception.");
    throw new CustomException("This is a custom Exception.");

} catch (CustomException $customException) {
    // Step 6: Handle both by logging in the associated catch blocks.
    global $caughtCustomExceptionMessage;
    $caughtCustomExceptionMessage = "Caught Custom Exception: " . $customException->getMessage() . "\n";
} catch (Exception $exception) {
    global $caughtExceptionMessage;
    $caughtExceptionMessage = "Caught Exception: " . $exception->getMessage() . "\n";
} finally {
    // Step 7: Echo something in the finally block.
    global $finallyMessage;
    $finallyMessage = "Finally block executed.\n";
}

$car = new Car("Toyota", 2023, "Blue", "Camry");

$electricCar = $car->electricCar();

$car->startEngine();
$electricCar->startEngine();

echo $engineMessage;
echo $acceleratesMessage;
echo $breaksMessage;
echo $checkBatteryMessage;
echo $chargeMessage;
echo $caughtCustomExceptionMessage;
echo $caughtExceptionMessage;
echo $finallyMessage;
