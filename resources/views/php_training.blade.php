<?php

//functions start
function test1() {
  echo "my guy".'<br>';
}
class Book {
  function construct() {
    $this->onoma = null;
    $this->periexomena = null;
    $this->selides = 0;
  }
  function setOnoma($x) {
    $this->onoma = $x;
  }
  function getOnoma() {
    echo $this->onoma."<br>";
  }
  function setPeriexomena(array $x) {
    $this->periexomena = $x;
  }
  function viewPeriexomena() {
    for($i=0;$i<count($this->periexomena);$i++) {
        echo $this->periexomena[$i]."<br>";
    }
  }
  function setSelides(int $x) {
    $this->selides = $x;
  }
  function countSelides() {
    echo $this->selides."<br>";
  }
}
//functions end

$color = 'green';
//it is
echo "My favourite color is ".$color.".";
echo '<br>';
$noumero = 15;
echo "I want ".$noumero." beers.";
test1();
$book1 = new Book();
$book1->construct();
$name = "Much needed Help";
$book1->setOnoma($name);
echo "To onoma tou vivliou einai: ";
$book1->getOnoma();
$per1 = array("nai","oxi");
$book1->setPeriexomena($per1);
echo "Ta periexomena tou einai: ";
$book1->viewPeriexomena();
$pages = 325;
$book1->setSelides($pages);
echo "O ari8mos twn selidwn tou einai: ";
$book1->countSelides();

?>
