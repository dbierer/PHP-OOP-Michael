<?php

//1. Create a transaction script
//2. Execute two SQL statements
//3. Handle any exceptions 

try {
    $pdo = new PDO('mysql:host=localhost;dbname=phpcourse', 'vagrant', 'vagrant', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Begin a transaction
    $pdo->beginTransaction();

    // Execute the first SQL statement
    $stmt1 = $pdo->prepare("INSERT INTO customers (first_name, last_name, email) VALUES (?, ?, ?)");
    $first_name = "Michael";
    $last_name = "Chang";
    $email = "mchang@holt.com";
    $stmt1->bindParam(1, $first_name, PDO::PARAM_STR);
    $stmt1->bindParam(2, $last_name, PDO::PARAM_STR);
    $stmt1->bindParam(3, $email, PDO::PARAM_STR);
    $stmt1->execute();

    // Execute the second SQL statement
    $stmt2 = $pdo->prepare("INSERT INTO orders (customer_id, total_amount) VALUES (?, ?)");
    $customer_id = $pdo->lastInsertId();
    $total_amount = 100.00;
    $stmt2->bindParam(1, $customer_id, PDO::PARAM_INT);
    $stmt2->bindParam(2, $total_amount, PDO::PARAM_STR);
    $stmt2->execute();

    // Commit the transaction if both statements executed successfully
    $pdo->commit();

} catch (PDOException $e) {
    // Rollback the transaction if an exception occurred
    $pdo->rollBack();
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
