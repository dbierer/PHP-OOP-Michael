<?php
spl_autoload_register(function ($class) {
    include_once $class . '.php';
});

$car = new carTraits("Toyota", 2023, "Blue", "Camry");

$electricCar = $car->electricCar();

$car->startEngine();
$electricCarInfo = $electricCar->startEngine();

// Output trait methods
$method1Output = $car->method1();
$method2Output = $car->method2();

echo $electricCarInfo;
echo $method1Output;
echo $method2Output;
