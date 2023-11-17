<?php

/** class for running methods of Builder class in the correct order  */
class Operator
{
    public function make(Builder $builder): NewHouse
    {
        $builder->makeArchitecturalProject();
        $builder->makeFoundation();
        $builder->materialSelection();
        $builder->buildWalls();
        $builder->pipeRouting();
        $builder->colourSelection();
        $builder->doorSelection();
        $builder->windowSelection();
        return $builder->getHouse();
    }
}

/** Builder interface defines methods of HouseBuilder class  */
interface Builder
{
    public function makeArchitecturalProject();
    public function makeFoundation();
    public function materialSelection();
    public function buildWalls();
    public function pipeRouting();
    public function colourSelection();
    public function doorSelection();
    public function windowSelection();
    public function getHouse(): NewHouse;
}

/** class HouseBuilder implements methods for creating parts of a house */
class HouseBuilder implements Builder
{
    private NewHouse $house;

    public function make()
    {
        $this->house = new NewHouse();
    }

    public function makeArchitecturalProject()
    {
        $this->house->setPart(new ArchitecturalProject());
    }

    public function makeFoundation()
    {
        $this->house->setPart(new Foundation());
    }
    
    public function materialSelection()
    {
        $this->house->setPart(new Material());
    }

    public function buildWalls()
    {
        $this->house->setPart(new Walls());
    }

    public function pipeRouting()
    {
        $this->house->setPart(new Pipes());
    }

    public function colourSelection()
    {
        $this->house->setPart(new Colour());
    }

    public function doorSelection()
    {
        $this->house->setPart(new Doors());
    }

    public function windowSelection()
    {
        $this->house->setPart(new Windows());
    }

    public function getHouse(): NewHouse
    {
        return $this->house;
    }
}

/** base class for house parts */
class HouseParts
{
    protected string $part;

    public function __toString()
    {
        return $this->part;
    }

    public function nextArrow()
    {
        return ' -> ';
    }
}

/** child class for architectural project part of a house */
class ArchitecturalProject extends HouseParts
{
    public function __construct()
    {
        $this->part = 'Project is completed' . $this->nextArrow();
    }
}

/** child class for foundation part of a house */
class Foundation extends HouseParts
{
    public function __construct()
    {
        $this->part = 'Foundation is completed' . $this->nextArrow();
    }
}

/** child class for material part of a house */
class Material extends HouseParts
{
    public function __construct()
    {
        $this->part = 'Material is chosen: ' . $this->whatMaterial() . $this->nextArrow();
    }

    /** random selection of house material type */
    private function whatMaterial()
    {
        $arrayOfMaterials = ['brick', 'ceramic blocks', 'aerated concrete', 'Wooden timber'];
        return $arrayOfMaterials[array_rand($arrayOfMaterials)];
    }
}

/** child class for wall part of a house */
class Walls extends HouseParts
{
    public function __construct()
    {
        $this->part = 'Walls is completed' . $this->nextArrow();
    }
}

/** child class for pipe part of a house */
class Pipes extends HouseParts
{
    public function __construct()
    {
        $this->part = 'Pipes is completed' . $this->nextArrow();
    }
}

/** child class for colour part of a house */
class Colour extends HouseParts
{
    public function __construct()
    {
        $this->part = 'Colour is chosen: ' . $this->whatColour() . $this->nextArrow();
    }

    /** random selection of house colour type */
    private function whatColour()
    {
        $arrayOfColours = ['black', 'white', 'blue', 'rad', 'green', 'yellow', 'purple', 'orange'];
        return $arrayOfColours[array_rand($arrayOfColours)];
    }
}

/** child class for door part of a house */
class Doors extends HouseParts
{
    public function __construct()
    {
        $this->part = 'Doors are chosen: ' . $this->whatDoor() . $this->nextArrow();
    }

    /** random selection of house door type */
    private function whatDoor()
    {
        $arrayOfDoors = ['wooden', 'plastic', 'metal'];
        return $arrayOfDoors[array_rand($arrayOfDoors)];
    }
}

/** child class for window part of a house */
class Windows extends HouseParts
{
    public function __construct()
    {
        $this->part = 'Windows are chosen: ' . $this->whatWindow();
    }

    /** random selection of house window type */
    private function whatWindow()
    {
        $arrayOfWindows = ['wooden', 'metal-plastic', 'aluminum', 'combined'];
        return $arrayOfWindows[array_rand($arrayOfWindows)];
    }
}

/** class creates a string with all parts of a house */
class NewHouse
{
    private string $part = '';

    public function setPart($part)
    {
        $this->part .= $part;
    }
}

$operator = new Operator();

$builder1 = new HouseBuilder();
$builder2 = new HouseBuilder();
$builder3 = new HouseBuilder();

$builder1->make();
$builder2->make();
$builder3->make();

$newHouse1 = $operator->make($builder1);
$newHouse2 = $operator->make($builder2);
$newHouse3 = $operator->make($builder3);

var_dump($newHouse1);
var_dump($newHouse2);
var_dump($newHouse3);