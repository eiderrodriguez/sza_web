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
    <div class="formularioa">
        <form id="erabil" name="erabil" method="post" action="">
            <p>Eposta: <input type="email" id="eposta" name="eposta" required/></p>
            <p>Pasahitza: <input type="password" id="pass" name="pass" required></p>
            <br>
            <input type="submit" id="sartu" name="sartu" value="Sartu"/>
        </form>
    </div>
    <div class="enlazeak">
        <br><br>
        <a href="Erregistratu.php">Erregistratu</a>
    </div>
</body>
</html>
<?php
    $konekt =  mysqli_connect("localhost","id15386124_eider","%76Z>1fO97{-63]E","id15386124_sza");
    if (!$konekt) {
        die("Connection failed: " . mysqli_error());
    }
    
    if(isset($_POST['sartu'])){
        $erab_eposta = $_POST['eposta'];
        $erab_pass = $_POST['pass'];
        
        $sql = "SELECT * FROM erabiltzaileak WHERE Eposta='$erab_eposta' AND Pasahitza='$erab_pass'";
        $result = $konekt->query($sql);

        if(!($result)){echo "Konexio errorea".$result->error;}
        else{
            $count = mysqli_num_rows($result);
            $konekt->close();
            
            if($count!=0) {
                echo '<script language="javascript">alert("Ongi etorri!");window.location.href="Menua.php?aux='.$erab_eposta.'"</script>';
    			die();
            }else {
                $message = "Erabiltzailea ez dago erregistratua edo pasahitza gaizki dago";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } 
        }     
    }
?>