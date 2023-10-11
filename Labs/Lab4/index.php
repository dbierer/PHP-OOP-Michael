<?php

spl_autoload_register(function ($class) {
    include_once $class . '.php';
});

$toyotaCamry = new Car("Toyota", 2023, "Blue", "Camry");
echo "Car Info: {$toyotaCamry}\n"; 

$teslaModel3 = new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
echo "Electric Car Info: {$teslaModel3}\n";

$teslaModel3->color = "Blue"; 
echo "Tesla Color Update: {$teslaModel3->color}\n"; 

$teslaModel3->startEngine(); 
$teslaModel3->accelerates(); 
$teslaModel3->checkBattery(); 
$teslaModel3->charge(); 

?>
