<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <h1>Index</h1>


  <?php

  $name = 'Eric Niemo';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_REQUEST['fname'];
    if (empty($name)) {
      echo "Name is empty";
    } else {
      echo $name;
    }
  }

  ?>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name: <input type="text" name="fname" value="$name" placeholder="here eric">
    <input type="submit">
  </form>


  <?php

  echo "<br>";
  echo "<br>";
  echo "AFTER";

  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";

  echo "PHP_SELF";
  echo $_SERVER['PHP_SELF'];
  echo "<br>";
  echo "<br>";

  echo "SERVER_NAME";
  echo $_SERVER['SERVER_NAME'];
  echo "<br>";
  echo "<br>";

  echo "HTTP_HOST";
  echo $_SERVER['HTTP_HOST'];
  echo "<br>";
  echo "<br>";

  echo "HTTP_REFERER";
  // echo $_SERVER['HTTP_REFERER'];
  echo "<br>";
  echo "<br>";

  echo "HTTP_USER_AGENT";
  echo $_SERVER['HTTP_USER_AGENT'];
  echo "<br>";
  echo "<br>";

  echo "SCRIPT_NAME";
  echo $_SERVER['SCRIPT_NAME'];
  echo "<br>";
  echo "<br>";

  echo "SERVER_ADDR";
  echo $_SERVER['SERVER_ADDR'];
  echo "<br>";
  echo "<br>";

  echo "SERVER_PORT";
  echo $_SERVER['SERVER_PORT'];
  echo "<br>";
  echo "<br>";

  echo "REMOTE_ADDR";
  echo $_SERVER['REMOTE_ADDR'];
  echo "<br>";
  echo "<br>";

  $x = 75;
  $y = 25;

  function addition()
  {
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
  }

  addition();
  echo $z;

  echo "<br>";
  echo "<br>";
  for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
      break;
    }
    echo "The number is: $x <br>";
  }
  echo "<br>";
  echo "<br>";
  for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
      continue;
    }
    echo "The number is: $x <br>";
  }
  echo "<br>";
  echo "<br>";

  $a = 50;
  $b = 30;

  if ($a > $b) {
    echo "A is greater than B";
  } else {
    echo "B is greater than A";
  }
  echo "<br>";
  echo "<br>";
  echo "<br>";


  echo "<link rel='stylesheet' href='main.css' type='text/css'>";

  echo "Hello World!" . "<br>";

  for ($i = 0; $i < 3; $i++) {
    echo 'Testing echo: ' . $i . "<br>";
  }

  $page_title = "My PHP Website";

  $content = "<h1>Welcome to my PHP website!</h1>";
  $content .= "<p>This website is powered by PHP.</p>";
  $content = $content . "<p>It's a great language.</p>";

  echo $page_title;
  echo $content;

  $carsArray = array('one' => "Volvo", "two" => "BMW", "three" => "Toyota", "Honda", "Mercedes", "Opel");
  $carsObject = (object) $carsArray;

  // $carsArray = array('one' => "Volvo", "two" => "BMW", "three" => "Toyota");

  ?>
  <?php
  echo "carsArray";
  var_dump($carsArray);
  echo "carsObject";
  var_dump($carsObject);
  echo "<br>";
  ?>

  <?php
  foreach ($carsArray as $car) {
    echo $car;
    echo "<br>";
  }

  echo "<br>";
  foreach ($carsArray as $key => $value) {
    echo "Key=" . $key . ", Value=" . $value;
    echo "<br>";
  }
  echo "<br>";



  $fruitArray = array('one' => "Apple", "two" => "Banana", "three" => "Orange", "four" => "Pineapple", "five" => "Mango", "six" => "Strawberry");
  $fruitObject = (object) $fruitArray;

  echo "Fruit Array VAR_DUMP";
  echo "<br>";
  var_dump($fruitArray);
  echo "<br>";


  echo "Fruit Object VAR_DUMP";
  echo "<br>";
  var_dump($fruitObject);
  echo "<br>";

  echo "<br>";
  echo "<br>";

  echo "Fruit ARRAY AS FRUIT";
  foreach ($fruitArray as $fruit) {
    echo "<br>";
    echo $fruit;
  }
  echo "<br>";

  echo "Fruit ARRAY AS KEY => VALUE";
  foreach ($fruitArray as $key => $value) {
    echo "<br>";
    echo "Key=" . $key . ", Value=" . $value;
  }
  echo "<br>";



  ?>

</body>

</html>


// phpinfo();