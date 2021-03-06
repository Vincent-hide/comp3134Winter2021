<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_host = 'localhost';
$db_username = 'suho';
$db_password = 'password';
$db_name = 'security_wk13';

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} else {
  echo 'Connected successfully' . "<br><br>";
}

$input = "";
?>

<form method="get" action="">
  <label for="myInput">Your input here: </label>
  <input id="myInput" type="text" name="myInput">
  <input type="submit">
</form>

<?php
if (isset($_GET["myInput"])) {
  $input = $_GET["myInput"];

  $stmt = $mysqli->prepare("SELECT * from Users WHERE firstname LIKE ? AND active LIKE 1;");
  $stmt->bind_param("s", $input);
  $stmt->execute();

  $result = $stmt->get_result();

  if ($result) {
    echo "Returned rows are: " . mysqli_num_rows($result). "<br><br>";
    
    echo "<table style='border: 1px solid black; border-collapse: collapse;'>
            <tr>
              <th style='border: 1px solid black; border-collapse: collapse;'>id</th>
              <th style='border: 1px solid black; border-collapse: collapse;'>username</th>
              <th style='border: 1px solid black; border-collapse: collapse;'>email</th>
              <th style='border: 1px solid black; border-collapse: collapse;'>first name</th>
              <th style='border: 1px solid black; border-collapse: collapse;'>last name</th>
              <th style='border: 1px solid black; border-collapse: collapse;'>active</th>
            </tr>
            ";

    while($row = mysqli_fetch_array($result)) {
      echo "
        <tr>
          <td style='border: 1px solid black; border-collapse: collapse;'>".$row["id"]."</td>
          <td style='border: 1px solid black; border-collapse: collapse;'>".$row["username"]."</td>
          <td style='border: 1px solid black; border-collapse: collapse;'>".$row["email"]."</td>
          <td style='border: 1px solid black; border-collapse: collapse;'>".$row["firstname"]."</td>
          <td style='border: 1px solid black; border-collapse: collapse;'>".$row["lastname"]."</td>
          <td style='border: 1px solid black; border-collapse: collapse;'>".$row["active"]."</td>
        </tr>";
    }
    echo "</table>";

  } else {
    echo mysqli_error($mysqli);
  }
}

mysqli_close($mysqli);

?>


