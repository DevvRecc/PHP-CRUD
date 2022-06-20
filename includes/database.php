<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studenten_info";

try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $err) {
    echo "Connection failed: " . $err->getMessage();
}

function getData($sql, $method){
  global $conn;

  $statement = $conn->query($sql);

  if($method == 'fetchAll'){
      $result = $statement->fetchAll(PDO::FETCH_BOTH);
  }
  else {
      $result = $statement->fetch(PDO::FETCH_BOTH); 
  }

  return $result;
}

?>