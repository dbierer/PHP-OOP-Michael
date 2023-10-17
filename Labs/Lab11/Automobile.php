<?php

//1. Create a stored procedure script.
//2. Add the SQL to the database
//3. Call the stored procedure with parameters

$pdo = new PDO('mysql:host=localhost;dbname=phpcourse','vagrant','vagrant', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$createProcedure = "CREATE PROCEDURE AddCustomer(firstName VARCHAR(255), lastName VARCHAR(255), email VARCHAR(255))
BEGIN
    INSERT INTO customers (first_name, last_name, email) VALUES (firstName, lastName, email);
END";

$pdo->exec($createProcedure);

try {
    $stmt = $pdo->prepare("CALL AddCustomer(?, ?, ?)");

    $first_name = "Michael";
    $last_name = "Chang";
    $email = "mchang@holt.com";

    $stmt->bindParam(1, $first_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $last_name, PDO::PARAM_STR);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);

    if($stmt->execute([$first_name, $last_name, $email])){
        echo "New user " .$first_name. " " .$last_name. " " .$email. "\n";
    }
} catch (PDOException $e) {
    echo "Vagrant Error: " . $e->getMessage() . "\n";
}

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

$car = new Car("Toyota", 2023, "Blue", "Camry");
$electricCar = $car->electricCar();

$carMessage = $car->startEngine();
$electricCarMessage = $electricCar->startEngine();
$accelerationMessage = $car->accelerates();

echo $carMessage;
echo $electricCarMessage;
echo $accelerationMessage;
