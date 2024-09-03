<?php

class Car {
    private $color;
    private $model;
    public function setColor($color) {
        $this->color = $color;
        return $this;  // Returning the current object
    }
    public function setModel($model) {
        $this->model = $model;
        return $this;  // Returning the current object
    }
    public function display() {
        echo "Car model: $this->model, color: $this->color";
        return $this;  // Returning the current object, though not necessary here
    }
}
$car = new Car();
$car->setColor('Red')->setModel('Tesla')->display();  // Method chaining in action


?>