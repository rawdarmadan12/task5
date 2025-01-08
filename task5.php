<?php
echo "<br>search 1<br>";
// namespace MyApp;
// class app {
//     public static function sayHi() {
//         return "Hi from App!";
//     }
// }

// namespace Tools;
// class format{
//     public static function format($text) {
//         return "Formatted: " . $text;
//     }
// }
// use MyApp\app;
// echo app::sayHi() . "<br>";
// echo format::format("This is a simple message.") . "<br>";

echo "<br>search2<br>";

// the use of __set and __ get
class Person {
    private $properties = [];
    public function __set($name, $value) {
        $this->properties[$name] = $value;
    }
    public function __get($name) {
        return $this->properties[$name] ?? "the property is not exist";
    }
}
$person = new Person();
$person->name = "salma";
$person->age = 23;
echo $person->name ."<br>";
echo $person->age ."<br>";  
echo $person->address ."<br>"; 
echo "<br>search3<br>";

// the use of call
class calc {
    public function __call($name, $arguments) {
        if ($name === 'add') {
            return array_sum($arguments);
        }
        return "Method is not defined";
    }
}
$calc = new calc();
echo $calc->add(10, 20, 30) . "<br>"; 
echo $calc->subtract(50, 20) . "<br>";
echo "<br>task1<br>";

//**********task1 */


class Author {
    private string $name;
    private string $email;
    private string $gender; 

    public function __construct(string $name, string $email, string $gender) {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getGender(): string {
        return $this->gender;
    }
    public function __toString(): string {
        return "Author[name={$this->name}, email={$this->email}, gender={$this->gender}]";
    }
}
// echo"<br>*****************Auther&Book***************<br>";
// $a1 = new Author("shimoo", "shimoo.tarek@example.com", 'f');
// $a2 = new Author("Menna", "Menna.Mahmoud@example.com", 'f');

// echo "Name: " . $a1->getName()."<br>" ;
// echo "Email: " . $a1->getEmail() ."<br>";
// echo "Gender: " . $a1->getGender() ."<br>";
// echo"<br>";
// $a1->setEmail("new.email@example.com");
// echo "Updated Email: <br>" ;
// echo $a1 ,"<br" ;
// echo $a2  , "<br";

echo"***********************class Book*******************************";

class Book {
    private string $title;
    private array $authors; 
    private float $price;
    private int $quantity;

    
    public function __construct(string $title, array $authors, float $price, int $quantity) {
        $this->title = $title;
        $this->authors = $authors;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthors(): array {
        return $this->authors;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }
    public function getAuthorNames(): string {
        $names = array_map(fn($author) => $author->getName(), $this->authors);
        return implode(", ", $names);
    }

    public function __toString(): string {
        $authorDetails = implode(", ", array_map(fn($author) => $author->__toString(), $this->authors));
        return "Book[title={$this->title}, authors=[{$authorDetails}], price={$this->price}, quantity={$this->quantity}]";
    }
}


$a1 = new Author("shimoo", "tarek@example.com", 'f');
$a2 = new Author("Menna", "Mahmoud.smith@example.com", 'f');
$authors = [$a1, $a2];

echo "<br>";
$book = new Book(" PHP ", $authors, 49.99, 150);

echo "Book Title: " . $book->getTitle(),"<br>" ;
echo "Authors: " . $book->getAuthorNames() ,"<br>";
echo "Price: " . $book->getPrice() ,"<br>";
echo "Quantity: " . $book->getQuantity() ,"<br>";

$book->setPrice(54.99);
$book->setQuantity(200);
echo "Updated Price: " . $book->getPrice(),"<br>" ;
echo "Updated Quantity: " . $book->getQuantity() ,"<br>";

echo $book ;









// cicle

echo "<br> ******************task 2********************** <br>";



trait Circle {

public $redius=1;
public $color="red";


public function __construct($radius , $color){

  $this ->redius =$radius ;
  $this ->color =$color ;

}
  public function getRadius(){
    return $this ->redius ;
  }
  public function getcolor(){
      return $this ->color ;
  }
  public function setRadius($radius){
        $this ->redius =$radius ;
  }
  public function setcolor($color){
          $this ->color =$color ;
 }

  public function calcArea($radius){
    return 3.14 * pow($radius , 2 );

  }
public function calcCircumference($radius){
  return 2 * 3.14 * $radius ;
  }
  public function toString(){
    return "Circle [radius=" . $this->getRadius() . ", color=" .
    $this->getcolor() . "]";


}
}

class cylinder{
  use Circle ;
    private $height = 1 ;

    public function __construct($redius , $color ,$height){
      $this ->redius=$redius;
      $this ->color=$color;
      $this ->height=$height ;

    }
    public function getRadius()
    {
      return $this->redius ;
    }
public function calcArea($radius)
{
  return"the area of circle is : ". 3.14 * pow($radius , 2 ) ."<br>";
}
public function getheight(){
  return $this ->height ;
}
public function setheight($height){
  $this ->height =$height ;
}
public function tooString()
{
  return "Cylinder [radius=" . $this->getRadius() . ", color=" .
  $this->getcolor() . ", height=" . $this->getheight() . "]
  ";
  }
  public function calcVolume(){
    return "the volume is :  " . 3.14 * pow($this->getRadius(), 2) * $this
    ->getheight();
    }

  }



$c2 = new cylinder(5 , "red" , 10 );
echo $c2->calcArea(5);
echo $c2->toString() . "<br>";
echo $c2->calcVolume() . "<br>";
//*****************task3************** */
abstract class Person {
    protected string $name;
    protected string $address;


    public function __construct(string $name, string $address) {
        $this->name = $name;
        $this->address = $address;
    }

    
    public function getName(): string {
        return $this->name;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function setAddress(string $address): void {
        $this->address = $address;
    }

    abstract public function __toString(): string;
}

class Student extends Person {
    private string $program;
    private int $year;
    private float $fee;

 
    public function __construct(string $name, string $address, string $program, int $year, float $fee) {
        parent::__construct($name, $address);
        $this->program = $program;
        $this->year = $year;
        $this->fee = $fee;
    }

    public function getProgram(): string {
        return $this->program;
    }

    public function setProgram(string $program): void {
        $this->program = $program;
    }

    public function getYear(): int {
        return $this->year;
    }

    public function setYear(int $year): void {
        $this->year = $year;
    }

    public function getFee(): float {
        return $this->fee;
    }

    public function setFee(float $fee): void {
        $this->fee = $fee;
    }
    public function __toString(): string {
        return "Student[Person[name={$this->name}, address={$this->address}], program={$this->program}, year={$this->year}, fee={$this->fee}]";
    }
}


class Staff extends Person {
    private string $school;
    private float $pay;

 
    public function __construct(string $name, string $address, string $school, float $pay) {
        parent::__construct($name, $address);
        $this->school = $school;
        $this->pay = $pay;
    }


    public function getSchool(): string {
        return $this->school;
    }

    public function setSchool(string $school): void {
        $this->school = $school;
    }

    public function getPay(): float {
        return $this->pay;
    }

    public function setPay(float $pay): void {
        $this->pay = $pay;
    }

   
    public function __toString(): string {
        return "Staff[Person[name={$this->name}, address={$this->address}], school={$this->school}, pay={$this->pay}]";
    }
}
echo"<br>***********************person**************************<br>";

$student = new Student("Menna Mahmoud", "123 Main St", "Computer Science", 2023, 15000.0);
echo $student ,"<br>";
echo"<br>***********************staff**************************<br>";
$staff = new Staff("shimoo tarek", "456 Elm St", "XYZ High School", 45000.0);
echo $staff ;
//********************task4******* */


echo "<br> **********************task 4****************** <br>"
interface Shape
{
    public function getcolor();
    public function setfilled($filled);
    public function isfilled();
    public function toString();
}

class Circle implements Shape
{
    private $radius = 1;
    private $color = "red";
    private $filled = false;

    public function __construct($radius, $color, $filled)
    {
        $this->radius = $radius;
        $this->color = $color;
        $this->filled = $filled;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function setcolor($color)
    {
        $this->color = $color;
    }

    public function getcolor()
    {
        return $this->color;
    }

    public function setfilled($filled)
    {
        $this->filled = $filled;
    }

    public function isfilled()
    {
        return $this->filled;
    }

    public function getArea()
    {
        return 3.14 * $this->radius * $this->radius;
    }

    public function getPerimeter()
    {
        return 2 * 3.14 * $this->radius;
    }

    public function toString()
    {
        return "Circle[Shape[color=" . $this->color . ", filled=" . ($this->filled ? "true" : "false") . "], radius=" . $this->radius . "]";
    }
}

class Rectangle implements Shape
{
    private $length = 1;
    private $width = 1;
    private $color = "red";
    private $filled = false;

    public function __construct($length, $width, $color, $filled)
    {
        $this->length = $length;
        $this->width = $width;
        $this->color = $color;
        $this->filled = $filled;
    }

    public function getlength()
    {
        return $this->length;
    }

    public function setlength($length)
    {
        $this->length = $length;
    }

    public function getwidth()
    {
        return $this->width;
    }

    public function setwidth($width)
    {
        $this->width = $width;
    }

    public function getcolor()
    {
        return $this->color;
    }

    public function setcolor($color)
    {
        $this->color = $color;
    }

    public function isfilled()
    {
        return $this->filled;
    }

    public function setfilled($filled)
    {
        $this->filled = $filled;
    }

    public function getArea()
    {
        return $this->length * $this->width;
    }

    public function getPerimeter()
    {
        return 2 * ($this->length + $this->width);
    }

    public function toString()
    {
        return "Rectangle[Shape[color=" . $this->color . ", filled=" . ($this->filled ? "true" : "false") . "], width=" . $this->width . ", length=" . $this->length . "]";
    }
}

class Square extends Rectangle
{
    public function __construct($side, $color, $filled)
    {
        parent::__construct($side, $side, $color, $filled);
    }

    public function getSide()
    {
        return $this->getwidth();
    }

    public function setSide($side)
    {
        $this->setwidth($side);
        $this->setlength($side);
    }

    public function toString()
    {
        return "Square[Rectangle[Shape[color=" . $this->getcolor() . ", filled=" . ($this->isfilled() ? "true" : "false") . "], side=" . $this->getSide() . "]]";
    }
}

// Test Circle
$circle = new Circle(5.0, "blue", true);
echo $circle->toString() . "<br>";
echo "Area: " . $circle->getArea() . "<br>";
echo "Perimeter: " . $circle->getPerimeter() . "<br>";



echo "<br> **********************rectungle****************** <br>";


// Test Rectangle
$rectangle = new Rectangle(4.0, 6.0, "green", false);
echo $rectangle->toString() . "<br>";
echo "Area: " . $rectangle->getArea() . "<br>";
echo "Perimeter: " . $rectangle->getPerimeter() . "<br>";

echo "<br> ********************** squre ****************** <br>";



// Test Square
$square = new Square(5.0, "yellow", true);
echo $square->toString() . "<br>";
echo "Area: " . $square->getArea() . "<br>";
echo "Perimeter: " . $square->getPerimeter() . "<br>";
?>






