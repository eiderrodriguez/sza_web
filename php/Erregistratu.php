<!DOCTYPE html>
<html>
<head>
    <title>Proiektua Eider</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/Estiloak.css">
    <style>
        input[type="submit"]{
            width: 100px;
            font-size: 15px;
        }
    </style>
    <script type="text/javascript" language="javascript" src="../js/Balioztatu_erreg.js"></script>
</head>
<body>
    <div id="bannerimage"></div>
    <br><br>
    <div class="formularioa">
        <form id="erabilF" name="erabilF" method="post" action="">
            <p>Izena: <input type="text" id="izena" name="izena" size="40" minlength="4" required/></p>
            <p>Eposta: <input type="email" id="eposta" name="eposta" placeholder="@ehu.es, @ehu.eus" size="40" required/></p>
            <p>Pasahitza: <input type="password" id="pass" name="pass" minlength="6" size="30" required></p>
            <p>Pasahitza errepikatu: <input type="password" id="pass2" name="pass2" minlength="6" size="30" required></p>
            <br>
            <input type="submit" id="erreg" name="erreg" onclick="return erregistratu();" value="Erregistratu"/>
        </form>
    </div>
    <div class="enlazeak">
        <br><br>
        <a href="../php/Proiektua.php">Atzera</a>
        <br><br>
        <a href="../xml/Erabiltzaileak.xml">Erabiltzaileak</a>
    </div>
</body>
</html>
<?php
    //Datu-basearekin konektatu
    $link = mysqli_connect("localhost","id15386124_eider","%76Z>1fO97{-63]E","id15386124_sza"); 
    if (!$link) {
        die("Connection failed: " . mysqli_error());
    }
    if(isset($_POST['erreg'])){
        function test_input($data){
            return trim($data); 
        }

        $izena = test_input($_POST['izena']);
        $eposta = test_input($_POST['eposta']);
        $pasahitza = test_input($_POST['pass']);
        $pasahitza2 = test_input($_POST['pass2']);
        
        
        $sql = "INSERT INTO erabiltzaileak (Eposta, Pasahitza, Izena) VALUES ('$eposta', '$pasahitza', '$izena')";
        
        //XML fitxategia kargatu 
        $xml = simplexml_load_file("../xml/Erabiltzaileak.xml");
        if (!isset($xml)){
            echo "<script type='text/javascript'>alert('Xml fitxategia ez da kargatu.');</script>";
        }else{
            $id = $xml['azkenid'];
            $erabiltzailea = $xml->addChild('erabiltzailea');
            $iz = $erabiltzailea->addChild('izena', $izena);
            $id = (int)$id+1;
            $erabiltzailea->addAttribute('id', "$id");
            
            $xml['azkenid']=$id;
                
            $xml->asXML("../xml/Erabiltzaileak.xml");
            //Erabiltzaile berriaren izena eta id XML fitxategian sartu
        }
        if(mysqli_query($link, $sql)){
            echo "<script type='text/javascript'>alert('Erabiltzailea ondo erregistratu da!'); window.location.href='Proiektua.php';</script>";
            die();
        } else {
            if(mysqli_errno($link)==1062){
                echo "<script type='text/javascript'>alert('Erabiltzailea ez dago erabilgarri');</script>";
            }
            else{
                echo "<script type='text/javascript'>alert('Errore bat gertatu da.');</script>";
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        $link->close();
    }
?>  