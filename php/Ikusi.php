<!DOCTYPE html>
<html>
<head>
    <title>Proiektua Eider</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/Estiloak.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/BorratuAjax.js"></script>
</head>
<body>
    <div id="bannerimage"></div>
    <br><br>
</body>
</html>
<?php
    $konekt = mysqli_connect("localhost","id15386124_eider","%76Z>1fO97{-63]E","id15386124_sza"); 
    if (!$konekt) {
        die("Connection failed: " . mysqli_error());
    }
    //url-ko aux lortu
    $eposta = $_GET['aux'];
    
    //Datuak dataren arabera lortu, eposta auxiliarra denean
    $datuak = $konekt->query("SELECT * FROM agenda WHERE Eposta='$eposta' ORDER BY Data ASC");
    //Datuak dataren arabera lortu, izena auxiliarra denean
    $datuak2 = $konekt->query("SELECT * FROM agenda WHERE Izena='$eposta' ORDER BY Data ASC");
    
    //Auxiliarra eposta da, gauzak daude datu-basean
    if($datuak->num_rows>0){
        echo '<div class="taula" id="taula" name="taula">
            <table>
                <tr>
                    <th>Data</th>
                    <th>Zeregina</th>
                    <th><img src="https://image.flaticon.com/icons/png/512/61/61848.png" style="width: 20px; height: 20px;"/></th>
                </tr>';
    }
    //Auxiliarra izena da, gauzak daude datu-basean
    else if($datuak2->num_rows>0){
        echo '<div class="taula" id="taula" name="taula">
            <table>
                <tr>
                    <th>Data</th>
                    <th>Zeregina</th>
                    <th><img src="https://image.flaticon.com/icons/png/512/61/61848.png" style="width: 20px; height: 20px;"/></th>
                </tr>';
    }
    //Auxiliarra eposta izanda, datuak lortu
    while($row=$datuak->fetch_object()){
        $zenb = $row->ID;
        echo'<tr><td>'.$row->Data.'</td> <td>'.$row->Zeregina.'</td>';
        echo "<td><input type='button' class='zabor' id='$zenb' name='zabor' value='Ezabatu'/></td></tr>";
    }
    //Auxiliarra izena izanda, datuak lortu
    while($row=$datuak2->fetch_object()){
        $zenb = $row->ID;
        echo'<tr><td>'.$row->Data.'</td> <td>'.$row->Zeregina.'</td>';
        echo "<td><input type='button' class='zabor' id='$zenb' name='zabor' value='Ezabatu'/></td></tr>";
    }
    echo '</table>
    </div>';
    
    $konekt->close();
?>
<div class="enlazeak">
    <br><br>
    <a href="../php/Berria.php?aux=<?php echo $_GET['aux']?>">Beria agendatu</a>
    <br><br>
    <a href="../php/Proiektua.php" onclick="alert('Agur!');">Irten</a>
</div>