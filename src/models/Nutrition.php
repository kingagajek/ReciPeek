<?php

class Nutrition
{
    private $calories;
    private $fat;
    private $saturatedFat;
    private $carbohydrates;
    private $sugars;
    private $fiber;
    private $protein;
    private $salt;

    public function __construct($calories, $fat, $saturatedFat, $carbohydrates, $sugars, $fiber, $protein, $salt)
    {
        $this->calories = $calories;
        $this->fat = $fat;
        $this->saturatedFat = $saturatedFat;
        $this->carbohydrates = $carbohydrates;
        $this->sugars = $sugars;
        $this->fiber = $fiber;
        $this->protein = $protein;
        $this->salt = $salt;
    }

    public function getCalories() { return $this->calories; }
    public function getFat() { return $this->fat; }
    public function getSaturatedFat() { return $this->saturatedFat; }
    public function getCarbohydrates() { return $this->carbohydrates; }
    public function getSugars() { return $this->sugars; }
    public function getFiber() { return $this->fiber; }
    public function getProtein() { return $this->protein; }
    public function getSalt() { return $this->salt; }
}
