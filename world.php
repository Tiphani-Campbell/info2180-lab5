<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if($_SERVER['REQUEST_METHOD']=== 'GET'){
  $country = filter_var($_GET['country'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if(isset($country) or strlen($country) !== 0){
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<ul>";
    foreach($results as $row){
      echo "<li>" . $row['name'] . ' is ruled by ' . $row['head_of_state'] . "</li>";
    }
    echo "</ul>";

  }
}




