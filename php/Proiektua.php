<!DOCTYPE html>
<html>
<head>
    <title>Proiektua Eider</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/Estiloak.css">
</head>
<body>
    <div id="bannerimage"></div>
    <br><br>
    <div class="formularioa">
        <form id="erabil" name="erabil" method="post" action="">
            <p>Eposta/Izena: <input type="text" id="eposta" name="eposta" required/></p>
            <p>Pasahitza: <input type="password" id="pass" name="pass" required></p>
            <br>
            <input type="submit" id="sartu" name="sartu" value="Sartu"/>
        </form>
    </div>
    <div class="enlazeak">
        <br><br>
        <a href="../php/Erregistratu.php">Erregistratu</a>
    </div>
</body>
</html>
<?php
    $konekt =  mysqli_connect("localhost","id15386124_eider","%76Z>1fO97{-63]E","id15386124_sza");
    if (!$konekt) {
        die("Connection failed: " . mysqli_error());
    }
    //Sartu botoian submit egiterakoan
    if(isset($_POST['sartu'])){
        $erab_eposta = $_POST['eposta'];
        $erab_pass = $_POST['pass'];
        
        //Epostarekin sartzea konprobatzea
        $sql = "SELECT * FROM erabiltzaileak WHERE Eposta='$erab_eposta' AND Pasahitza='$erab_pass'";
        //Izenarekin sartzea konprobatzea
        $sql2 = "SELECT * FROM erabiltzaileak WHERE Izena='$erab_eposta' AND Pasahitza='$erab_pass'";
        $result = $konekt->query($sql);
        $result2 = $konekt->query($sql2);
        
        if(!($result) && !($result2)){echo "Konexio errorea".$result->error;}
        else{
            $count = mysqli_num_rows($result);
            $count2 = mysqli_num_rows($result2);
            
            $konekt->close();
            
            //Epostarekin sartuz
            if($count!=0) {
                echo '<script language="javascript">alert("Ongi etorri!");window.location.href="../php/Menua.php?aux='.$erab_eposta.'"</script>';
    			die();
            }
            //Izenarekin sartuz
            else if($count2!=0) {
                echo '<script language="javascript">alert("Ongi etorri!");window.location.href="../php/Menua.php?aux='.$erab_eposta.'"</script>';
    			die();
            }
            else {
                $message = "Erabiltzailea ez dago erregistratua edo pasahitza gaizki dago";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } 
        }     
    }
?>