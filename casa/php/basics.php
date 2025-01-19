<?php
//string 
$x = "Harry"; 
echo $x; 
?>
<?php
//array
$names = array("Harry","Rohan","Shubham");
var_dump($names);
?>
<?php 
class Harry{ 
} 
?>
<?php 
class Bike { 
public $color; 
public $model; 
public function __construct($color, $model) { 
$this->color = $color; 
$this->model = $model; 
} 
public function message() { 
return "My bike is a " . $this->color . " " . $this->model . "!"; 
} 
} 
$myBike = new Bike("red", "Honda"); 
echo $myBike -> message(); 
?>
<?php 
$x = 0; 
// True because $x is set 
if (isset($x)) { 
echo "Variable 'x' is set"; 
} 
?>
<?php
$cms = array("Harry", "Lovish", "Rohan");
echo "Who needs chocolate? Is it" . $cms[0] . ", " .
$cms[1] . " or " . $cms[2] . "?";
?>