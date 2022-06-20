<?php

include'includes/database.php';

?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
<title>Overzicht van studenten die te laat waren</title>
 
</head>
<body style="background-color: #2B3E50;">
    
    <main style="width: 900px; margin: 20px auto;">
    <div class="container">

        <table class="table my-2">
            <h4 style="color: white;" class="table my-3">Overzicht studenten die te laat waren</h4>
            <table class="table table-striped">
            <tr>
                <th nowrap style="color: white;">Naam student</th>
                <th style="color: white;">Klas</th>
                <th nowrap style="color: white;">Minuten te laat</th>
                <th style="color: white;">Reden te laat</th>
    	    </tr>

            <?php
                $sql = "SELECT * FROM `studenten`";
                $studenten = getData($sql, 'fetchAll');
                foreach($studenten as $student){

                    echo "<tr>";
                    echo "<td style=\"color: white;\">{$student['student_naam']}</td>";
                    echo "<td style=\"color: white;\"> {$student['klas']} </td>";
                    echo "<td style=\"color: white;\"> {$student['minuten_te_laat']}</td>";
                    echo "<td style=\"color: white;\"> {$student['reden_te_laat']}</td>";    
                    echo "<td><a class='btn btn-success' onClick=return confirm(\"Weet je zeker dat je het wilt verwijderen?\"); href='delete.php?id={$student['id']}'>Verwijder</a></td>";
                    echo "<td><a class='btn btn-success' href='update.php?id={$student['id']}'>Update</a></td>";
                    echo "</tr>";
                    
                }
            ?>  

            
        </table>
        <br>
        <a href="nieuw.php" class="btn btn-success" id="Knop1">Te laat!</a> 
        
        <?php

        $sql = "SELECT MAX(minuten_te_laat) AS hoogst ,AVG(minuten_te_laat) AS gemiddeld ,SUM(minuten_te_laat) AS opsomming FROM `studenten`";
        $minuten = getData($sql, 'fetch');   
        
        ?>

        <br><br><br>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="color: white;" rowspan="4">Overzicht Studenten</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="color: white;">Hoogste aantal minuten te laat</td>
                            <td style="color: white;"><?php echo $minuten['hoogst'] ?></td>
                        </tr>
                        <tr>
                            <td style="color: white;">Gemiddeld aantal minuten</td>
                            <td style="color: white;"><?php echo $minuten['gemiddeld']?></td>
                        </tr>
                        <tr>
                            <td style="color: white;">Totaal aantal minuten</td>
                            <td style="color: white;"><?php echo $minuten['opsomming']?></td>
                        </tr>
                    </tbody>
                </table>
        <br><br><br> 

        </main>
    </body>
</html>