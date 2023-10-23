<?php

// 1. Create a prepared statement script.
// 2. Add a try/catch constrcut
// 3. Add a new customer record binding the customer parameters

abstract class Automobile {
    public $make;
    protected $year;
    protected $color;
    private $model;

    abstract protected function electricCar();

    public function startEngine() {
        return "Starting the {$this->year} {$this->make} {$this->model}'s engine.\n";
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
        return new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
    }

    public function accelerates() {
        return "The car is accelerating.\n";
    }
}

class Van extends Automobile {

    public function electricCar() {
        return new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
    }

    public function breaks() {
        return "The van is breaking.\n";
    }
}

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

try {

    // Prepared statement script
    $pdo = new PDO('mysql:host=localhost;dbname=phpcourse','vagrant','vagrant', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $stmt = $pdo->prepare("INSERT INTO customers (first_name, last_name, email) VALUES (?, ?, ?)");

    // Add customer data
    $first_name = "Michael";
    $last_name = "Chang";
    $email = "mchang@holt.com";

    // Bind parameters
    $stmt->bindParam(1, $first_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $last_name, PDO::PARAM_STR);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);

    $stmt->execute();

    if($stmt->execute([$first_name, $last_name, $email])){
        echo "New user " .$first_name. " " .$last_name. " " .$email. "\n";
    }

} catch (PDOException $e) {
    echo "Vagrant Error: " . $e->getMessage() . "\n";
}

$car = new Car("Toyota", 2023, "Blue", "Camry");
$electricCar = $car->electricCar();

$carMessage = $car->startEngine();
$electricCarMessage = $electricCar->startEngine();
$accelerationMessage = $car->accelerates();

echo $carMessage;
echo $electricCarMessage;
echo $accelerationMessage;
