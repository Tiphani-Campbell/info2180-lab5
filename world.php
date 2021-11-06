<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if($_SERVER['REQUEST_METHOD']=== 'GET'){
  $country = filter_var($_GET['country'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if(isset($country) or strlen($country)!==0){
    if((isset($country) or strlen($country)!==0) and (!isset($_GET['context']) or strlen($_GET['context'])===0)){
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>";
    echo "<tr>";
    echo "<th>Country Name</th>";
    echo "<th>Continent</th>";
    echo "<th>Independence</th>";
    echo "<th>Head of State</th>";
    echo "<tr>";
    foreach($results as $row){
     $name = $row['name'];
     $continent = $row['continent'];
     $independence = $row['independence_year'];
     $hos = $row['head_of_state'];
     echo "<tr>";
     echo "<td>$name</td>";
     echo "<td>$continent</td>";
     echo "<td>$independence</td>";
     echo "<td>$hos</td>";
     echo "</tr>";
    }
    echo "</table>";

  }else{
    $stmt = $conn->query("SELECT c.name as city, c.district, c.population, cs.name as country FROM cities c join countries cs on c.country_code=cs.code WHERE cs.name='$country'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>District</th>";
    echo "<th>Population</th>";
    echo "</tr>";
    foreach($results as $row){
      $city = $row['city'];
      $district = $row['district'];
      $population = $row['population'];
      echo "<tr>";
      echo "<td>$city</td>";
      echo "<td>$district</td>";
      echo "<td>$population</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
}
}




