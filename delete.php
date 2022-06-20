<?php
include'includes/database.php';

$verwijder_id = $_GET['id'];
$sql = "DELETE  FROM `studenten` WHERE id = $verwijder_id";
$student = getData($sql, 'FETCH');
header("location:index.php")

?>