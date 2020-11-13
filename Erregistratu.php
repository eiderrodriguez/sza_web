<!DOCTYPE html>
<html>
<head>
    <title>Proiektua Eider</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Estiloak.css">
    <style>
        input[type="submit"]{
            width: 100px;
            font-size: 15px;
        }
    </style>
    <script type="text/javascript" language="javascript" src="Balioztatu_erreg.js"></script>
</head>
<body>
    <div id="bannerimage"></div>
    <br><br>
    <div class="formularioa">
        <form id="erabilF" name="erabilF" method="post" action="">
            <p>Eposta: <input type="email" id="eposta" name="eposta" placeholder="@ehu.es, @ehu.eus" size="40" required/></p>
            <p>Pasahitza: <input type="password" id="pass" name="pass" minlength="6" size="30" required></p>
            <p>Pasahitza errepikatu: <input type="password" id="pass2" name="pass2" minlength="6" size="30" required></p>
            <br>
            <input type="submit" id="erreg" name="erreg" onclick="return erregistratu();" value="Erregistratu"/>
        </form>
    </div>
    <div class="enlazeak">
        <br><br>
        <a href="Proiektua.php">Atzera</a>
    </div>
</body>
</html>
<?php
    $link = mysqli_connect("localhost","id15386124_eider","%76Z>1fO97{-63]E","id15386124_sza"); 
    if (!$link) {
        die("Connection failed: " . mysqli_error());
    }
    if(isset($_POST['erreg'])){
        function test_input($data){
            return trim($data); 
        }

        $eposta = test_input($_POST['eposta']);
        $pasahitza = test_input($_POST['pass']);
        $pasahitza2 = test_input($_POST['pass2']);
        
        
        $sql = "INSERT INTO erabiltzaileak (Eposta, Pasahitza) VALUES ('$eposta', '$pasahitza')";
            
        $xml = simplexml_load_file("Erabiltzaileak.xml");
        if (!isset($xml)){
            echo "<script type='text/javascript'>alert('Xml fitxategia ez da kargatu.');</script>";
        }else{
            $id = $xml['azkenid'];
            $erabiltzailea = $xml->addChild('erabiltzailea');
            $epost = $erabiltzailea->addChild('eposta', $eposta);
            $pass = $erabiltzailea->addChild('pasahitza', $pasahitza);
            $id = (int)$id+1;
            $erabiltzailea->addAttribute('id', "$id");
            
            $xml['azkenid']=$id;
                
            $xml->asXML("Erabiltzaileak.xml");
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