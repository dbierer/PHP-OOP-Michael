<?php
spl_autoload_register(function ($class) {
    include_once $class . '.php';
});

function displayOutput($output) {
    echo $output;
}

$toyotaCamry = new Car("Toyota", 2023, "Blue", "Camry");
displayOutput("Car Info: " . $toyotaCamry);

$teslaModel3 = new ElectricCar("Tesla", 2023, "Red", "Model 3", 75);
displayOutput("Electric Car Info: " . $teslaModel3);

$teslaModel3->color = "Blue";
displayOutput("Tesla Color Update: " . $teslaModel3->color);

displayOutput($teslaModel3->startEngine());
displayOutput($teslaModel3->accelerates());
displayOutput($teslaModel3->checkBattery());
displayOutput($teslaModel3->charge());
