<!DOCTYPE html>
<html>
<head>
    <title>Proiektua Eider</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Estiloak.css">
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
    $eposta = $_GET['aux'];
    $datuak = $konekt->query("SELECT * FROM agenda WHERE Eposta='$eposta'");
    $datuak2 = $konekt->query("SELECT * FROM agenda WHERE Izena='$eposta'");
    
    if($datuak->num_rows>0){
        echo '<div class="taula">
            <table>
                <tr>
                    <th>Data</th>
                    <th>Zeregina</th>
                </tr>';
    }
    else if($datuak2->num_rows>0){
        echo '<div class="taula">
            <table>
                <tr>
                    <th>Data</th>
                    <th>Zeregina</th>
                </tr>';
    }
    while($row=$datuak->fetch_object()){
        echo'<tr><td>'.$row->Data.'</td> <td>'.$row->Zeregina.'</td></tr>';
    }
    while($row=$datuak2->fetch_object()){
        echo'<tr><td>'.$row->Data.'</td> <td>'.$row->Zeregina.'</td></tr>';
    }
    echo '</table>
    </div>';
    
    $konekt->close();
?>
<div class="enlazeak">
    <br><br>
    <a href="Berria.php?aux=<?php echo $_GET['aux']?>">Beria agendatu</a>
    <br><br>
    <a href="Proiektua.php">Irten</a>
</div>