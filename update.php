<?php

include'includes/database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `studenten` WHERE id = $id";
$student = getData($sql, 'fetch');


if (isset($_POST['submit'])) {
    $naam = $_POST['student_naam'];
    $klas = $_POST['klas'];
    $minuten = $_POST['minuten_te_laat'];
    $reden = $_POST['reden_te_laat'];
    $sql = "UPDATE `studenten` SET student_naam ='$naam', klas = '$klas', minuten_te_laat = '$minuten', reden_te_laat = '$reden' WHERE id = $id";
    $result = getData($sql, 'POST');
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Update</title>
</head>
<body style="background-color: #2B3E50; overflow: hidden;">

    <div class="container my-5">
        <form method="POST">
            <div class="mb-3">
            <form method="POST">

                <div style="color: white; width: 300px;" class="mb-3">
                    <label class="form-label">Naam van de student:</label>
                    <input type="text" name="student_naam" class="form-control" value="<?php echo $student['student_naam'];?>" autocomplete="off">
                </div>

                <div style="color: white; width: 300px;" class="mb-3">
                    <label class="form-label">Klas:</label>
                    <input type="text" name="klas" class="form-control" value="<?php echo $student['klas'];?>" autocomplete="off">
                </div>

                <div style="color: white; width: 300px;" class="mb-3">
                    <label class="form-label">Aantal minuten te laat:</label>
                    <input type="number" name="minuten_te_laat" min="0" class="form-control" value="<?php echo $student['minuten_te_laat'];?>" autocomplete="off">
                </div>

                <div style="color: white; position: relative; top: 8px; width: 600px;" class="form-group">
                    <label style="color: white;" for="reden">Reden:</label>
                    <textarea class="form-control" name="reden_te_laat" id="reden_te_laat" cols="30" rows="10" autocomplete="on"><?php echo $student['klas'];?></textarea>
                </div>

            <a href="index.php">
                <button type="submit" style="position: relative; top: 15px;" class="btn btn-primary" name="submit">Opslaan</button>
            </a>
        </form>
        <img src="images/logo.png" style="width: 500px; position: relative; left: 700px; bottom: 305px;">
    </div>

</body>

</html>

