<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error . "<br>");
  }
  echo "DB Connected successfully" . "<br>";


  $sql = "SELECT * FROM `test`.`foods`";
  // $sql = "SELECT * FROM `foods`";

  $result = $conn->query($sql);

  if ($result) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo " - Name: " . $row["name"] . " | Calories:  " . $row["calories"] . "<br>";
    }
  } else {
    echo "0 results";
  }


  ?>

  <?php
  class Food
  {
    public $calories;

    function __construct($calories)
    {
      $this->calories = $calories;
    }

    function getCalories()
    {
      return $this->calories;
    }
    public function getInfo()
    {
      return "This food has " . $this->calories . " calories.";
    }
  }

  interface Meat
  {
    public function getSaltiness();
  }

  class Steak extends Food implements Meat
  {
    public $saltiness;

    function __construct($calories = 0, $saltiness = 0)
    {
      $this->calories = $calories;
      $this->saltiness = $saltiness;
      echo self::createMessage();
    }

    function createMessage()
    {
      return "Your steak was created! It has " . $this->calories . " calories and " . $this->saltiness . " saltiness.";
    }
    function getSaltiness()
    {
      return $this->saltiness;
    }

    function getInfo()
    {
      return "This meat is " . $this->saltiness . " salty. " . parent::getInfo();
    }
  }


  class Fruit extends Food
  {
    public $name;
    private $color;

    function __construct($name, $color, $calories)
    {
      $this->name = $name;
      $this->color = $color;
      parent::__construct($calories);
    }
    function get_name()
    {
      return $this->name;
    }
    function get_color()
    {
      return $this->color;
    }
    function set_color($color)
    {
      $this->color = $color;
    }
    function getInfo()
    {
      return " This fruit named " . $this->name . " is " . $this->color . ". " . parent::getInfo();
    }

    public function getCost()
    {
      return 0.5;
    }
  }

  // requires php 8.0 or higher?
  // $robySteak = new Steak(saltiness: 5, calories: 100);

  $rubarbSteak = new Steak();
  echo $rubarbSteak->getInfo();
  echo "<br>";
  echo "<br>";

  $chuckSteak = new Steak(1000);
  echo $chuckSteak->getInfo();
  echo "<br>";
  echo "<br>";

  $primeRib = new Steak(1000, 10);
  echo $primeRib->getInfo();
  echo "<br>";
  echo "<br>";

  $food = new Food(100);
  echo $food->getCalories();
  echo "<br>";
  echo "<br>";

  $apple = new Fruit("Apple", "red", 300);
  echo $apple->get_name();
  echo "<br>";
  echo $apple->get_color();
  echo "<br>";
  echo $apple->getCalories();
  echo "<br>";
  echo $apple->getInfo();
  echo "<br>";



  try {
    echo $apple->name;
  } catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
  echo "<br>";
  try {
    echo $apple->color;
  } catch (Error $e) {
    echo "Error: " . $e->getMessage();
  }
  echo "<br>";

  echo "<br>";
  echo "<br>";
  echo "<br>";
  ?>

  <?php
  $ageObject = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
  $ageArray = array(35, 375, 43);
  $ageMixed = array("Peter" => 35, "Ben" => 37, "Joe" => 43, 44, 45, 46);


  $multiTop = array(array(1, 2, 3), array(4, 5, 6), array(7, 8, 9));

  echo $multiTop[0][0];
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";

  $multiTopAssociative = array(array("a" => 1, "b" => 2, "c" => 3), array("d" => 4, "e" => 5, "f" => 6), array("g" => 7, "h" => 8, "i" => 9));

  echo $multiTopAssociative[0]["a"];
  echo "<br>";
  echo "<br>";
  echo $multiTopAssociative[1]["d"];
  echo "<br>";
  echo "<br>";

  echo "AgeMixed";
  echo count($ageMixed);

  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";

  for ($i = 0; $i < count($ageMixed); $i++) {
    echo $i;
    echo "<br>";
    echo $ageMixed[$i];
    echo "<br>";
  }
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";

  echo json_encode($ageObject);
  echo "<br>";
  echo json_encode($ageArray);
  echo "<br>";
  echo json_encode($ageMixed);
  echo "<br>";

  echo $age["Peter"];

  $ageObjectString = '{"Peter":35,"Ben":37,"Joe":43}';
  $ageArrayString = '[35,375,43]';
  $ageMixedString = '{"Peter":35,"Ben":37,"Joe":43,44,45,46}';



  $newAgeObject =  json_decode($ageObjectString);
  echo "<br>";
  echo $newAgeObject->Peter;
  echo "<br>";
  echo $ageArray[1];
  echo "<br>";
  echo $newAgeObject->Joe;
  echo "<br>";

  echo var_dump($newAgeObject);

  echo "<br>";
  ?>

  <?php
  function exclaim($str)
  {
    return $str . "! ";
  }

  function ask($str)
  {
    return $str . "? ";
  }

  function printFormatted($str, $format)
  {
    // Calling the $format callback function
    echo $format($str);
  }

  // Pass "exclaim" and "ask" as callback functions to printFormatted()
  printFormatted("Hello world", "exclaim");
  printFormatted("Hello world", "ask");

  echo "<br>";
  echo "<br>";
  echo "<br>";
  ?>

  <?php
  $strings = ["apple", "orange", "banana", "coconut"];
  $lengths = array_map(function ($item) {
    return strlen($item);
  }, $strings);
  print_r($lengths);
  echo "<br>";
  echo "<br>";
  echo "<br>";
  ?>

  <!-- <table>
    <tr>
      <th>Variable</th>
      <th>Value</th>
    </tr>

    <?php
    $rockPaperScissorsKeyValueArray = array("rock" => "rockValue", "paper" => "paperValue", "scissors" => "scissorsValue");
    foreach ($rockPaperScissorsKeyValueArray as $id => $filter) {
      echo '<tr>
      <td>' . $filter . '</td>
      <td>' . filter_id($filter) . '</td>
      </tr>';
    }
    ?>
  </table> -->

  <?php
  // Set session variables
  $_SESSION["favcolor"] = "green";
  $_SESSION["favanimal"] = "cat";
  echo "Session variables are set.";
  ?>

  <?php
  // Echo session variables that were set on previous page
  echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
  echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
  ?>


  <?php
  if (!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
  } else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
  }
  ?>

  <?php
  include './upload.php';
  ?>

  <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
  </form>


  <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
  </form>



  <?php
  echo readfile("./webdictionary.txt");
  $myFileOpenRead = fopen("./webdictionary.txt", "r") or die("Unable to open file!");

  echo $myFileOpenRead . "<br>";

  echo "<br>";
  echo "<br>";

  // $myfile = fopen("./webdictionary.txt", "w") or die("Unable to open file!");
  $myfile = fopen("./webdictionary.txt", "a") or die("Unable to open file!");
  $txt = "John Doe\n";
  fwrite($myfile, $txt);
  $txt = "Jane Doe\n";
  fwrite($myfile, $txt);
  fclose($myfile);

  fclose($myFileOpenRead);

  ?>


  <?php
  include './header.php';
  ?>
  <h1>Index</h1>

  <p>&copy; 2010-<?php echo date("Y"); ?></p>
  <?php

  echo "Today is " . date("Y/m/d") . "<br>";
  echo "Today is " . date("Y.m.d") . "<br>";
  echo "Today is " . date("Y-m-d") . "<br>";
  echo "Today is " . date("l");
  echo "<br>";
  echo "The time is " . date("h:i:sa");
  echo "<br>";
  echo "The time is " . date("h:i:sa");
  echo "<br>";
  echo "The time is " . date("h:i:sa");
  echo "<br>";


  ?>

  <form action="./welcome_post.php" method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    Website: <input type="text" name="website"><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
    <input type="submit">
  </form>
  <form action="./welcome._get.php" method="get">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    <input type="submit">
  </form>


  <a href="test_get.php?subject=PHP&web=W3schools.com">Test $GET</a>
  <!-- <?php

        echo "Study ";
        echo $_GET['subject'];
        echo $_GET['web'];
        ?>
 -->

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

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['fname'];
    if (empty($name)) {
      echo "Name is empty";
    } else {
      echo $name;
    }
  }
  ?>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name: <input type="text" name="fname" value="<?php echo htmlspecialchars($name) ?>" placeholder="Full Name">
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